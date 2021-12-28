<?php

namespace App\Http\Controllers\Api;

use App\Models\Team;
use App\Models\League;
use App\Http\Requests\TeamRequest;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Retorna todos os times, com seus jogadores, de uma determinada liga.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {

    }

    /**
     * Retorna um time com seus jogadores de uma determinada liga.
     *
     * @param  Team $team
     * @return Team
     */
    public function show(Team $team)
    {

    }

    /**
     * Cria um time.
     *
     * @param  TeamRequest  $request
     * @return Team
     */
    public function store(TeamRequest $request)
    {

    }

    /**
     * Atualiza um time.
     *
     * @param  TeamRequest  $request
     * @param  League       $league
     * @param  Team         $team
     * @return Team
     */
    public function update(TeamRequest $request, League $league, Team $team)
    {

    }

    /**
     * Exclui um time. Os jogadores associados ao time ficaram disponíveis.
     *
     * @param  Team $team
     * @return Team
     */
    public function destroy(Team $team)
    {

    }
}
