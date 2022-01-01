<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Team;
use App\Models\League;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
