<?php

namespace App\Http\Controllers\Api;

use App\Models\Player;
use App\Helpers\Helper;
use App\Models\Contract;
use App\Models\Attribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;

class PlayerController extends Controller
{
    /**
     * Retorna todos os jogadores, com seus atributos, contratos, times e nacionalidade.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Player::with("attribute", "contract", "team", "country")
                     ->orderByRaw("ISNULL(team_id), team_id ASC")
                     ->orderBy("name")
                     ->orderBy("lastname")
                     ->orderBy("nickname")
                     ->orderBy("force")
                     ->get();
    }

    /**
     * Retorna um jogador, com seus atributos, contrato, time e nacionalidade.
     *
     * @param  Player   $player
     * @return Player
     */
    public function show(Player $player)
    {
        return $player->load("attribute", "contract", "team", "country");
    }

    /**
     * Cria um jogador com contrato, caso tenha time e atributos.
     *
     * @param  PlayerRequest    $request
     * @return Player
     */
    public function store(PlayerRequest $request)
    {
        $val_data = $request->validated();

        $val_data["mentor"]     = isset($val_data["mentor"]) && $val_data["mentor"] ?? 0;
        $val_data["country_id"] = isset($val_data["country_id"]) ? $val_data["country_id"] : 30;
        $val_data["birthday"]   = Helper::convertDate($val_data["birthday"]);

        $player   = Player::create($val_data);

        $force    = Helper::randomForce($val_data["force"]);
        $value    = Helper::randomSalary($force, $val_data["mentor"]);

        Attribute::create([
            "player_id"      => $player->id,
            "role"           => $val_data["role"],
            "secondary_role" => $val_data["secondary_role"],
            "force"          => $force,
            "salary"         => $value["salary"],
            "pass"           => $value["pass"],
        ]);

        if (isset($val_data["team_id"]))
        {
            $contract_info = Helper::randomContract();

            Contract::create([
                "team_id"   => $val_data["team_id"],
                "player_id" => $player->id,
                "start"     => $contract_info["start"],
                "end"       => $contract_info["end"],
                "duration"  => $contract_info["duration"]
            ]);
        }

        return $player->load("attribute", "contract", "team", "country");
    }

    /**
     * Atualiza um jogador, seu contrato e atributos.
     *
     * @param  PlayerRequest    $request
     * @param  Player           $player
     * @return Player
     */
    public function update(PlayerRequest $request, Player $player)
    {
        $val_data = $request->validated();

        if ($val_data["team_id"] == 0)
        {
            $val_data["team_id"] = null;

            if ($player->contract) $player->contract->delete();
        }
        elseif ($val_data["team_id"] != $player->team_id)
        {
            if ($player->contract) $player->contract->delete();

            $contract_info = Helper::randomContract();

            Contract::create([
                "team_id"   => $val_data["team_id"],
                "player_id" => $player->id,
                "start"     => $contract_info["start"],
                "end"       => $contract_info["end"],
                "duration"  => $contract_info["duration"]
            ]);
        }

        $val_data["birthday"] = Helper::convertDate($val_data["birthday"]);

        $player->fill($val_data);
        $player->save();

        $player->attribute->fill($val_data);
        $player->attribute->save();

        return $player->load("attribute", "contract", "team", "country");
    }

    /**
     * Exclui um jogador, seu contrato, caso não tenha, e seus atributos.
     *
     * @param  Player   $player
     * @return Player
     */
    public function destroy(Player $player)
    {
        if ($player->contract) $player->contract->delete();

        $player->attribute->delete();
        $player->delete();

        return $player;
    }
}
