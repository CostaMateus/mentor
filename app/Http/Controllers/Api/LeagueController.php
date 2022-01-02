<?php

namespace App\Http\Controllers\Api;

use App\Models\League;
use App\Models\Division;
use App\Http\Controllers\Controller;
use App\Http\Requests\LeagueRequest;
use Illuminate\Support\Facades\File;

class LeagueController extends Controller
{
    /**
     * Retorna todas as ligas, com suas divisões e times.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return League::with("divisions", "teams")->orderBy("name")->get();
    }

    /**
     * Retorna uma liga com suas divisões e times.
     *
     * @param  League   $league
     * @return League
     */
    public function show(League $league)
    {
        return $league->load("divisions", "teams");
    }

    /**
     * Cria uma liga e suas divisões.
     *
     * @param  LeagueRequest    $request
     * @return League
     */
    public function store(LeagueRequest $request)
    {
        $val_data = $request->validated();

        if (isset($request->image))
        {
            $image_name = strtolower($val_data["initials"]) . "." . $request->image->extension();

            $request->image->move(public_path("images/game/leagues"), $image_name);
            $val_data["image"] = $image_name;
        }

        $val_data["special"]        = (isset($val_data["special"]))     ? 1 : 0;
        $val_data["nrdivisions"]    = (isset($val_data["nrdivisions"])) ? $val_data["nrdivisions"] : 1;
        $val_data["nrparticipants"] = ($val_data["nrdivisions"] + 1) * 10;

        $league = League::create($val_data);

        $data   = [];
        $time   = date("Y-m-d H:i:s");

        for ($i = 1; $i <= $league->nrdivisions; $i++)
        {
            $data[] = [
                "league_id"      => $league->id,
                "name"           => $league->initials . " " . $i . "ª Divisão",
                "initials"       => $i . "ª D",
                "nrparticipants" => 10,
                "created_at"     => $time,
                "updated_at"     => $time,
            ];
        }

        Division::insert($data);

        return $league->load("divisions", "teams");
    }

    /**
     * Atualiza uma liga e suas divisões, caso não tenha times associados a ela.
     *
     * @param  LeagueRequest    $request
     * @param  League           $league
     * @return League
     */
    public function update(LeagueRequest $request, League $league)
    {
        $val_data = $request->validated();

        $league->load("divisions", "teams");

        if ($league->teams->count() == 0)
        {
            $val_data["special"]        = (isset($val_data["special"]))     ? 1 : 0;
            $val_data["nrdivisions"]    = (isset($val_data["nrdivisions"])) ? $val_data["nrdivisions"] : 1;
            $val_data["nrparticipants"] = ($val_data["nrdivisions"] + 1) * 10;

            // Atualiza logo da liga
            if (isset($request->image))
            {
                File::delete(public_path("images/game/leagues/") . $league->image);

                $image_name = strtolower($val_data["initials"]) . "." . $request->image->extension();

                $request->image->move(public_path("images/game/leagues"), $image_name);

                $val_data["image"] = $image_name;
            }

            // Atualiza quantidade de divisões da liga, o nome e sigla da divisão
            if ($val_data["nrdivisions"] > $league->nrdivisions)
            {
                $data = [];
                $time = date("Y-m-d H:i:s");

                foreach ($league->divisions as $key => $division)
                {
                    // Atualiza o nome das divisões, com a sigla atual da liga
                    $i = $key + 1;
                    $division->name = $val_data["initials"] . " " . $i . "ª Divisão";
                    $division->save();
                }

                for ($i = $league->nrdivisions + 1; $i <= $val_data["nrdivisions"]; $i++)
                {
                    $data[] = [
                        "league_id"      => $league->id,
                        "name"           => $val_data["initials"] . " " . $i . "ª Divisão",
                        "initials"       => $i . "ª D",
                        "nrparticipants" => 10,
                        "created_at"     => $time,
                        "updated_at"     => $time,
                    ];
                }

                Division::insert($data);
            }
            else if ($val_data["nrdivisions"] <= $league->nrdivisions)
            {
                foreach ($league->divisions as $key => $division)
                {
                    if (($key + 1) <= $val_data["nrdivisions"])
                    {
                        // Atualiza o nome das divisões, com a sigla atual da liga
                        $i = $key + 1;
                        $division->name = $val_data["initials"] . " " . $i . "ª Divisão";
                        $division->save();

                        continue;
                    }

                    $division->delete();
                }
            }

            $league->fill($val_data);
            $league->save();
        }
        else
        {
            return response()->json([
                "message" => "Unable to update this league",
                "errors"  => [
                    "update" => [
                        "Essa liga não pode ser atualizada, pois há times associados a ela."
                    ]
                ]
            ], 422);
        }

        return $league;
    }

    /**
     * Exclui uma liga e suas divisões, caso não tenha times associados a ela.
     *
     * @param  League   $league
     * @return League
     */
    public function destroy(League $league)
    {
        if ($league->teams->count() == 0)
        {
            if ($league->image != "default.png")
            {
                File::delete(public_path("images/game/leagues/") . $league->image);
            }

            $league->divisions()->delete();
            $league->delete();

            return $league;
        }
        else
        {
            return response()->json([
                "message" => "Unable to delete this league",
                "errors"  => [
                    "destroy" => [
                        "Essa liga não pode ser excluída, pois há times associados a ela."
                    ]
                ]
            ], 422);
        }
    }
}
