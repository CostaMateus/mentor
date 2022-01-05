<?php

namespace App\Http\Controllers\Web\Admin;

use DateTime;
use App\Models\Team;
use App\Models\League;
use App\Models\Player;
use App\Helpers\Helper;
use App\Models\Country;
use App\Models\Division;
use App\Models\Attribute;
use App\Helpers\RandomNames;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Show the list of leagues.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $leagues   = League::all();
        $countries = Country::all();
        $teams     = Team::all();
        $players   = Player::all();
        $divisions = Division::all();

        $data      = Player::with("attribute", "contract", "team", "country")
                           ->orderByRaw("ISNULL(team_id), team_id ASC")
                           ->orderBy("name")
                           ->orderBy("lastname")
                           ->orderBy("nickname")
                           ->get();

        return view("adm.players", compact("data", "countries", "leagues", "teams", "players", "divisions"));
    }
}
