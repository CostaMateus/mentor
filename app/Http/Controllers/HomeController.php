<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Team;
use App\Models\Trust;
use App\Models\League;
use App\Models\Player;
use App\Models\Finance;
use App\Models\Matchup;
use App\Helpers\Fixture;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

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
        $player   = Player::where('user_id', Auth::user()->id)->first();

        if (is_null($player)) return redirect('/novo');

        $player->load('attribute');

        $team     = Team::find($player->team_id)->load('players', 'finance');
        session([
            'p_league_id'   => $team->league_id,
            'p_division_id' => $team->division_id,
            'p_team_id'     => $team->id
        ]);


        $matchups = Matchup::where('division_id', $team->division_id)->get();

        // $teams    = Team::where('division_id', $team->division_id)->get();
        $teams    = Team::orderBy('league_id')->orderBy(DB::raw('ISNULL(division_id), division_id'), 'ASC')->orderBy('name')->get();

        $rankings = $this->calcRankings($teams, $matchups);

        $advMatch = $this->getAdvMatch($matchups, $rankings[$team->division_id]);

        $trust    = Trust::where('player_id', $player->id)->first();

        $count    = $team->players->filter(function ($p) {
            $p->load('attribute');
            return $p->mentor != 1;
        })->count();

        $team->position = collect($rankings[$team->division_id])->where('team_id', $team->id)->first()['position'];

        return view('home', [
            'leagues'   => League::where('special', 0)->orderBy('name')->get(),
            'divisions' => Division::orderBy('league_id')->orderBy(DB::raw('ISNULL(divisions.id), divisions.id'), 'ASC')->orderBy('name')->get(),
            'teams'     => $teams,

            'player'    => $player,
            'team'      => $team,

            'rankings'  => $rankings,
            'matchups'  => $matchups,
            'nextMatch' => $advMatch,

            'total_ply' => $count,
            'trust'     => $trust,

            'finances'  => $this->getFinances($team->id),
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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function setConfigs(Request $request)
    {
        $req = $request->all();

        if (!isset($req['u']) && !isset($re['i'])) return redirect('/');

        $player = Player::where('user_id', Auth::user()->id)->first();

        if (is_null($player)) return redirect('/novo');

        $this->seedFinancesForAllTeams();
        $this->seedMatchsForAllTeams();
        $this->seedTrustForAllMentors();

        return redirect('/');
    }



    protected function seedMatchsForAllTeams()
    {
        Matchup::truncate();

        $teams = Team::select('id', 'division_id')
                     ->whereNotNull('division_id')
                     ->orderBy('league_id')
                     ->orderBy('division_id')
                     ->orderBy('name')
                     ->get();

        $teams_division = [];

        foreach ($teams as $t)
        {
            $teams_division[$t->division_id][] = $t->id;
        }

        foreach ($teams_division as $division_id => $teams_id)
        {
            $data        = [];
            $dateCreate  = date('Y-m-d');
            $fixPair     = new Fixture($teams_id);
            $schedule    = $fixPair->getSchedule();
            $saturday    = date('Y-m-d', strtotime('third saturday of january 2021')); // ENV-DB
            $dateMatchup = Date::createFromFormat('Y-m-d', $saturday);
            $round       = 1;

            // ida
            foreach ($schedule as $rounds)
            {
                // começa no sábado
                // adiciona um dia, jogo no domingo
                // adiciona mais 6 dias, jogo no proximo sabado
                if ($round > 1) ($round % 2 == 0) ? $dateMatchup->addDays(1) : $dateMatchup->addDays(6);

                foreach ($rounds as $matchup)
                {
                    $data[] = [
                        "split"          => 1,
                        "round"          => $round,
                        "date"           => $dateMatchup->format('Y-m-d'),
                        "division_id"    => $division_id,
                        "blue_team_id"   => $matchup[0],
                        "red_team_id"    => $matchup[1],
                        "winner_team_id" => null,
                        "created_at"     => $dateCreate,
                        "updated_at"     => $dateCreate,
                    ];
                }

                $round++;
            }

            // volta
            foreach ($schedule as $rounds)
            {
                // intervalo de 2 semanas
                if ($round == 11)
                    $dateMatchup->addDays(13);
                else
                    ($round % 2 == 0) ? $dateMatchup->addDays(1) : $dateMatchup->addDays(6);

                foreach ($rounds as $matchup)
                {
                    $data[] = [
                        "split"          => 1,
                        "round"          => $round,
                        "date"           => $dateMatchup->format('Y-m-d'),
                        "division_id"    => $division_id,
                        "blue_team_id"   => $matchup[0],
                        "red_team_id"    => $matchup[1],
                        "winner_team_id" => null,
                        "created_at"     => $dateCreate,
                        "updated_at"     => $dateCreate,
                    ];
                }

                $round++;
            }

            Matchup::insert($data);
        }
    }

    protected function seedTrustForAllMentors()
    {
        Trust::truncate();

        $mentors   = Player::where('mentor', 1)->get();
        $data      = [];
        $faker     = Factory::create();
        $timestamp = date('Y-m-d');

        foreach ($mentors as $m)
        {
            $data[] = [
                'player_id'  => $m->id,
                'board'      => $faker->numberBetween(75, 95),
                'fans'       => $faker->numberBetween(65, 85),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        Trust::insert($data);
    }

    protected function seedFinancesForAllTeams()
    {
        Finance::truncate();

        $faker     = Factory::create();
        $timestamp = date('Y-m-d');

        $teams     = Team::all();
        $cats      = Finance::categories();

        $data = [];
        foreach ($teams as $t)
        {
            $players = Player::where('team_id', $t->id)->with('attribute')->get();

            $sumSalary = 0;
            foreach ($players as $p)
            {
                $sumSalary += $p->attribute->salary;
            }

            foreach ($cats as $c)
            {
                $value = 0;
                $type  = 0;
                switch ($c) {
                    case 'in_awards':
                        $value = 0;
                        $type  = 1;
                        break;

                    case 'in_selling_players':
                        $value = 0;
                        $type  = 1;
                        break;

                    case 'in_several':
                        $value = ($t->division_id == 1) ? $faker->numberBetween(3000,6000) : $faker->numberBetween(1000,2500);
                        $type  = 1;
                        break;

                    case 'in_sponsorships':
                        $value = $sumSalary;
                        $type  = 1;
                        break;

                    case 'in_supporter_partner':
                        $value = ($t->division_id == 1) ? $faker->numberBetween(1000,2500) : $faker->numberBetween(100,500) ;
                        $type  = 1;
                        break;

                    case 'out_buying_players':
                        $value = 0;
                        $type  = 0;
                        break;

                    case 'out_salary':
                        $value = $sumSalary;
                        $type  = 0;
                        break;

                    case 'out_several':
                        $value = 0;
                        $type  = 0;
                        break;
                }

                if ($c != 'balance')
                {
                    $data[] = [
                        'team_id'    => $t->id,
                        'category'   => $c,
                        'value'      => $value,
                        'type'       => $type,
                        'date'       => '2021-01-01',
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ];
                }
            }

            $in  = 0;
            $out = 0;
            foreach ($data as $f)
            {
                if ($t->id == $f['team_id'])
                {
                    if ($f['type'])
                        $in += $f['value'];
                    else
                        $out += $f['value'];
                }
            }

            $data[] = [
                'team_id'    => $t->id,
                'category'   => 'balance',
                'value'      => ($in - $out),
                'type'       => (($in - $out) > 0) ? 1 : 0,
                'date'       => '2021-01-01',
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        Finance::insert($data);
    }


    protected function getAdvMatch($matchups, $rankings)
    {
        foreach ($matchups as $m)
        {
            if ($m->winner_team_id == null && ($m->blue_team_id == session('p_team_id') || $m->red_team_id == session('p_team_id')))
            {
                $adv = ( session('p_team_id') == $m->blue_team_id ) ? $m->red_team_id : $m->blue_team_id;

                foreach ($rankings as $auxT)
                {
                    if ($adv == $auxT['team_id']) $p = $auxT['position'];
                }

                return [
                    'adv'      => Team::find($adv),
                    'matchup'  => $m,
                    'position' => $p,
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
            if ($t->division_id != '')
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
                    'team_id'   => $t->id,
                    'victories' => $victories,
                    'defeats'   => $defeats
                ];
            }
        }

        foreach ($aux as &$value)
        {
            usort($value, function($a, $b) {
                return $b['victories'] <=> $a['victories'];
            });
        }

        foreach ($aux as &$value)
        {
            $i = 1;
            foreach ($value as $key => $t)
            {
                $value[$key]['position'] = $i++;
            }
        }

        return $aux;
    }

    protected function getFinances($team_id)
    {
        $details = Finance::where('team_id', $team_id)->get();

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
            'details'  => $details,
            'income'   => $income,
            'expenses' => $expens,
            'total'    => $total
        ];
    }
}

// rel-tempo-acumulado-fase
