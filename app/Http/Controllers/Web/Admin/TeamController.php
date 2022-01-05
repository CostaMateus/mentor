<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Team;
use App\Models\League;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Show the list of teams.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $leagues = League::with("divisions")->orderBy("name")->get();

        $data    = Team::with("league", "division", "players", "trophies")
                       ->orderByRaw("ISNULL(division_id), division_id ASC")
                       ->orderBy("league_id")->orderBy("division_id")
                       ->orderBy("name")->orderBy("initials")
                       ->get();

        return view("adm.teams", compact("data", "leagues"));
    }

}
