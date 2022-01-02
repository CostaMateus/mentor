<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\League;
use App\Http\Controllers\Controller;

class LeagueController extends Controller
{
    /**
     * Show the list of leagues.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = League::with("divisions", "teams")->orderBy("name")->get();

        return view("adm.leagues", compact("data"));
    }

}
