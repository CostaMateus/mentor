<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Trust;
use App\Models\League;
use App\Models\Player;
use App\Models\Finance;
use App\Models\Matchup;
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

        $player->load('attribute');

        $team     = Team::find($player->team_id)->load('players', 'finance');

        $matchups = Matchup::where('division_id', $team->division_id)->get();

        $teams    = Team::where('division_id', $team->division_id)->get();

        $trust    = Trust::where('player_id', $player->id)->first();

        $finances = Finance::where('team_id', $team->id)->get();

        $count    = 0;
        foreach ($team->players as $p) {
            if (!$p->mentor)
            {
                $p->load('attribute');
                $count++;
            }
        }

        $income = 0;
        $expens = 0;
        foreach ($finances as $f) {
            if ($f->type)
            {
                $income += $f->value;
            }
            else
            {
                $expens += $f->value;
            }
        }
        $total = $income - $expens;

        return view('home', [
            'player'   => $player,
            'team'     => $team,
            'teams'    => $teams,
            'matchups' => $matchups,
            'total_p'  => $count,
            'trust'    => $trust,
            'finances' => $finances,
            'income'   => $income,
            'expenses' => $expens,
            'total'    => $total,
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
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
