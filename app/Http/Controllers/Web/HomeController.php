<?php

namespace App\Http\Controllers\Web;

use Faker\Factory;
use App\Models\Team;
use App\Models\Trust;
use App\Models\League;
use App\Models\Player;
use App\Models\Country;
use App\Models\Finance;
use App\Models\Matchup;
use App\Helpers\Fixture;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Helpers\StartNewGame;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $player   = Player::where("user_id", Auth::user()->id)->first();

        if (is_null($player)) return redirect("/novo");

        $player->load("attribute");

        $team     = Team::find($player->team_id)->load("players", "finance");
        session([
            "p_league_id"   => $team->league_id,
            "p_division_id" => $team->division_id,
            "p_team_id"     => $team->id
        ]);

        // $matchups = Matchup::where("division_id", $team->division_id)->get();
        // $matchups = Division::with("matchups")->get();
        $matchups = Matchup::get();

        // $teams    = Team::where("division_id", $team->division_id)->get();
        $teams    = Team::orderBy("league_id")->orderBy(DB::raw("ISNULL(division_id), division_id"), "ASC")->orderBy("name")->get();

        $rankings = $this->calcRankings($teams, $matchups);

        $advMatch = $this->getAdvMatch($matchups, $rankings[$team->division_id]);

        $trust    = Trust::where("player_id", $player->id)->first();

        $count    = $team->players->filter(function ($p) {
            $p->load("attribute");
            return $p->mentor != 1;
        })->count();

        $team->position = collect($rankings[$team->division_id])->where("team_id", $team->id)->first()["position"];

        return view("home", [
            "leagues"   => League::where("special", 0)->orderBy("name")->get(),
            "divisions" => Division::orderBy("league_id")->orderBy(DB::raw("ISNULL(divisions.id), divisions.id"), "ASC")->orderBy("name")->get(),
            "teams"     => $teams,

            "player"    => $player,
            "team"      => $team,

            "rankings"  => $rankings,
            "matchups"  => $matchups,
            "nextMatch" => $advMatch,

            "total_ply" => $count,
            "trust"     => $trust,

            "finances"  => $this->getFinances($team->id),
        ]);
    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function newGame()
    {
        return view("new-game", [
            "leagues"   => League::where("special", 0)->orderBy("name")->get(),
            "divisions" => Division::orderBy("league_id")->orderBy(DB::raw("ISNULL(divisions.id), divisions.id"), "ASC")->orderBy("name")->get(),
            "teams"     => Team::orderBy("league_id")->orderBy(DB::raw("ISNULL(division_id), division_id"), "ASC")->orderBy("name")->get(),
            "countries" => Country::orderBy("name", "ASC")->get()
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function setConfigs(Request $request)
    {
        $data = $request->all();

        if (!isset($data["u"]) && !isset($data["i"])) return redirect("/");

        $player = Player::where("user_id", Auth::user()->id)->with("attribute", "contract", "team", "country")->get();

        if (is_null($player)) return redirect("/novo");

        StartNewGame::seedFinancesForAllTeams();
        StartNewGame::seedMatchsForAllTeams();
        StartNewGame::seedTrustForAllMentors();

        return redirect("/");
    }

    public function loadingGame(Request $request)
    {
        $leagues = League::with("divisions")->get();

        foreach ($leagues as &$league)
        {
            foreach ($league->divisions as &$division)
            {
                $d = $division->load("matchups");

                foreach ($d->matchups as &$matchup)
                {
                    $matchup->load("teamBlue", "teamRed");
                }
            }
        }

        return view("matchups", compact("leagues"));
    }

    public function game(Request $request)
    {
        dd($request->all());
    }





    protected function getAdvMatch($matchups, $rankings)
    {
        foreach ($matchups as $m)
        {
            if ($m->winner_team_id == null && ($m->blue_team_id == session("p_team_id") || $m->red_team_id == session("p_team_id")))
            {
                $adv = ( session("p_team_id") == $m->blue_team_id ) ? $m->red_team_id : $m->blue_team_id;

                foreach ($rankings as $auxT)
                {
                    if ($adv == $auxT["team_id"]) $p = $auxT["position"];
                }

                return [
                    "adv"      => Team::find($adv),
                    "matchup"  => $m,
                    "position" => $p,
                ];
            }
        }

        return null;
    }

    protected function calcRankings($teams, $matchups)
    {
        $i   = 0;
        $aux = array();
        foreach ($teams as $t)
        {
            if ($t->division_id != null)
            {
                $victories = 0;
                $defeats   = 0;
                foreach ($matchups as $m)
                {
                    if ($t->division_id == $m->division_id && $m->winner_team_id != null)
                    {
                        if ($m->blue_team_id == $t->id || $m->red_team_id == $t->id)
                        {
                            if ($m->winner_team_id == $t->id)
                                $victories++;
                            else
                                $defeats++;
                        }
                    }
                }

                $aux[$t->division_id][] = [
                    "team_id"   => $t->id,
                    "victories" => $victories,
                    "defeats"   => $defeats
                ];
            }
        }

        foreach ($aux as &$value)
        {
            usort($value, function($a, $b) {
                return $b["victories"] <=> $a["victories"];
            });
        }

        foreach ($aux as &$value)
        {
            $i = 1;
            foreach ($value as $key => $t)
            {
                $value[$key]["position"] = $i++;
            }
        }

        return $aux;
    }

    protected function getFinances($team_id = 0)
    {
        $details = Finance::where("team_id", $team_id)->get();

        $income = 0;
        $expens = 0;
        foreach ($details as $f)
        {
            if ($f->type)
                $income += $f->value;
            else
                $expens += $f->value;
        }

        $total = $income - $expens;

        return (object) [
            "details"  => $details,
            "income"   => $income,
            "expenses" => $expens,
            "total"    => $total
        ];
    }

}
