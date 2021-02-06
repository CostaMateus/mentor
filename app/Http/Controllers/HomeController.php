<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\League;
use App\Models\Player;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $player = Player::where('user_id', Auth::user()->id)->first();

        if (is_null($player))
        {
            return redirect('/novo');
        }

        return view('home');
    }

    public function newGame()
    {
        return view('new-game', [
            'leagues'   => League::where('special', 0)->orderBy('name')->get(),
            'divisions' => Division::orderBy('league_id')->orderBy(DB::raw('ISNULL(divisions.id), divisions.id'), 'ASC')->orderBy('name')->get(),
            'teams'     => Team::orderBy('league_id')->orderBy(DB::raw('ISNULL(division_id), division_id'), 'ASC')->orderBy('name')->get(),
            'countries' => DB::table('countries')->select('name', 'code')->orderBy('name', 'ASC')->get()
        ]);
    }
}
