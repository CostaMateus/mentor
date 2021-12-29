<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use App\Http\Requests\TeamRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Retorna todos os times, com seus jogadores, de uma determinada liga.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Team::with("league", "division", "players", "trophies")
                   ->orderByRaw("ISNULL(division_id), division_id ASC")
                   ->orderBy("name")
                   ->get();
    }

    /**
     * Retorna um time com seus jogadores de uma determinada liga.
     *
     * @param  Team     $team
     * @return Team
     */
    public function show(Team $team)
    {
        return $team->load("league", "division", "players", "trophies");
    }

    /**
     * Cria um time.
     *
     * @param  TeamRequest  $request
     * @return Team
     */
    public function store(TeamRequest $request)
    {
        $val_data = $request->validated();

        if (isset($request->image))
        {
            $image_name = strtolower($val_data["initials"]) . "." . $request->image->extension();

            $request->image->move(public_path("images/game/leagues/teams"), $image_name);
            $val_data["image"] = $image_name;
        }

        $val_data["initials"] = strtoupper($val_data["initials"]);

        $team = Team::create($val_data);

        // criar dados financeiros

        return $team;
    }

    /**
     * Atualiza um time.
     *
     * @param  TeamRequest  $request
     * @param  Team         $team
     * @return Team
     */
    public function update(TeamRequest $request, Team $team)
    {

    }

    /**
     * Exclui um time. Os jogadores associados ao time ficaram disponíveis.
     *
     * @param  Team     $team
     * @return Team
     */
    public function destroy(Team $team)
    {
        foreach ($team->players as $player)
        {
            $player->team_id = null;
            $player->save();
        }

        if ($team->image != "default.png")
        {
            File::delete(public_path("images/game/leagues/teams/") . $team->image);
        }

        $team->delete();

        return $team;
    }
}
