<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Team;
use App\Models\League;
use App\Models\Player;
use App\Helpers\Helper;
use App\Models\Division;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        DB::enableQueryLog();
        // $players = Player::where('mentor', 0)

        $players = DB::table('players as pl')
                    //   ->with('attribute')
                      ->join('attributes as at', 'at.player_id', '=', 'pl.id')
                      ->orderBy('name', 'ASC')
                      ->orderBy('lastname', 'ASC')
                      ->orderBy('nickname', 'ASC')
                      ->orderBy('force', 'ASC');

        $data2 = $players;

        // NAME LAST NICK
        $name = $request->input('name');
        session(['name' => ($name)?: null]);
        if ($name)
        {
            $players->where(  'name',     'like', '%'.$name.'%')
                    ->orWhere('lastname', 'like', '%'.$name.'%')
                    ->orWhere('nickname', 'like', '%'.$name.'%');
        }

        // NATIONALITY
        $nationality = $request->input('nationality');
        session(['nationality' => ($nationality)?: null]);
        if ($nationality)
        {
            $players->where('nationality', $nationality);
        }

        // AGE
        $age = $request->input('age');
        session(['age' => ($age)?: null]);
        if ($age)
        {
            switch ($age) {
                case 1:
                    $players->whereBetween('age', [16, 20]);
                    break;
                case 2:
                    $players->whereBetween('age', [21, 25]);
                    break;
                case 3:
                    $players->whereBetween('age', [26, 30]);
                    break;
                case 4:
                    $players->where('age', '>', 30);
                    break;
            }
        }

        // SEX
        $sex = $request->input('sex');
        session(['sex' => ($sex)?: null]);
        if ($sex)
        {
            switch ($sex) {
                case 'F':
                    $players->where('sex', $sex);
                    break;
                case 'M':
                    $players->where('sex', $sex);
                    break;
            }
        }

        // CONTRACT
        $contract = $request->input('contract');
        session(['contract' => ($contract)?: null]);
        if ($contract)
        {
            $today = new DateTime( date('Y-m-d') );
            $nextM = clone $today;

            switch ($contract) {
                case 1:
                    $players->where('contract', '<=', $today);
                    break;
                case 2:
                    $players->whereBetween('contract', [$today, $nextM->modify('+1 months')]);
                    break;
                case 3:
                    $players->where('contract', '<=', $nextM->modify('+1 months'));
                    break;
                case 4:
                    $players->where('contract', null);
                    break;
            }
        }

        // PASS
        $pass = $request->input('pass');
        session(['pass' => ($pass)?: null]);
        if ($pass)
        {
            switch ($pass) {
                case 1:
                    $players->whereBetween('pass', [1000, 4999]);
                    break;
                case 2:
                    $players->whereBetween('pass', [5000, 8999]);
                    break;
                case 3:
                    $players->whereBetween('pass', [9000, 12999]);
                    break;
                case 4:
                    $players->whereBetween('pass', [13000, 16999]);
                    break;
                case 5:
                    $players->whereBetween('pass', [17000, 20999]);
                    break;
                case 6:
                    $players->where('pass', '>', 20999);
                    break;
            }
        }

        // PRIMARY ROLE
        $role1 = $request->input('role1');
        session(['role1' => ($role1)?: null]);
        if ($role1)
        {
            $players->where('role', $role1);
        }

        // SECONDARY ROLE
        $role2 = $request->input('role2');
        session(['role2' => ($role2)?: null]);
        if ($role2)
        {
            $players->where('secondary_role', $role2);
        }

        // FORCE
        $force = $request->input('force');
        session(['force' => ($force)?: null]);
        if ($force)
        {
            switch ($force) {
                case 1:
                    $players->where('force', '<=', 10);
                    // $players->whereBetween('force', [1, 10]);
                    break;
                case 2:
                    $players->where('force', '>=', 11);
                    $players->where('force', '<=', 30);
                    // $players->whereBetween('force', [11, 30]);
                    break;
                case 3:
                    $players->where('force', '>=', 31);
                    $players->where('force', '<=', 50);
                    // $players->whereBetween('force', [31, 50]);
                    break;
                case 4:
                    $players->where('force', '>=', 51);
                    $players->where('force', '<=', 70);
                    // $players->whereBetween('force', [51, 70]);
                    break;
                case 5:
                    $players->where('force', '>=', 71);
                    break;
            }
        }

        // $league_id = $request->input('league_id');
        // session(['league_id' => ($league_id)?: null]);
        // if ($league_id)
        // {

        // }

        $pp = $request->input('pp');
        if (!$pp) {
            $pp = 100;
            session(['pp' => $pp]);
        } else {
            session(['pp' => $pp]);
        }

        $pageLimit = ceil($players->count() / $pp);
        $pageCurrent = $request->input('page') ?: 1;
        if ($pageCurrent <= $pageLimit) {
            session(['page' => $pageCurrent]);
            $request['page'] = $pageCurrent;
        } else {
            session(['page' => $pageLimit]);
            $request['page'] = $pageLimit;
        }

        return view('adm.players', [
            'data'      => $players->paginate($pp),
            'query'     => DB::getQueryLog()[0]['query'],
            'data2'     => $data2->get(),
            'leagues'   => League::where('special', 0)->orderBy('name')->get(),
            'divisions' => Division::orderBy('league_id')->get(),
            'teams'     => Team::orderBy('name')->get(),
            'countries' => DB::table('countries')->select('name', 'code')->orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'name.required'           => 'Este campo é obrigatório.',
            'lastname.required'       => 'Este campo é obrigatório.',
            'nickname.required'       => 'Este campo é obrigatório.',
            'nickname.unique'         => 'Esse apelido já está em uso.',
            'nationality.required'    => 'Este campo é obrigatório.',
            'age.required'            => 'Este campo é obrigatório.',
            'age.numeric'             => 'Este campo é numérico.',
            'sex.required'            => 'Este campo é obrigatório.',
            'role.required'           => 'Este campo é obrigatório.',
            'secondary_role.required' => 'Este campo é obrigatório.',
            'force.required'          => 'Este campo é obrigatório.',
        ];

        $valData = $request->validate([
            //player
            'name'           => 'required|string',
            'lastname'       => 'required|string',
            'nickname'       => 'required|unique:players',
            'nationality'    => 'required|string',
            'age'            => 'required|numeric|min:16|max:99',
            'sex'            => 'required|string',
            //attributes
            'mentor'         => 'nullable|string',
            'role'           => 'required|'.Rule::in(Attribute::$roles),
            'secondary_role' => 'required|'.Rule::in(Attribute::$roles),
            'force'          => 'required|integer',

            'league_id'      => 'nullable|integer',
            'division_id'    => 'nullable|integer',
            'team_id'        => 'nullable|integer',

            'add_team'       => 'nullable|string',
        ], $message);

        if ($valData['role'] == $valData['secondary_role'])
        {
            $error = [
                'errors' => [
                    'role' => [
                        'A 1ª pos. deve ser diferente da 2ª'
                    ],
                    'secondary_role' => [
                        'A 2ª pos. deve ser diferente da 1ª'
                    ]
                ],
                'message' => 'Posições inválidas.',
            ];
            return response()->json($error,422);
        }

        if (isset($valData['add_team']) && (
            !isset($valData['league_id']) ||
            !isset($valData['division_id']) ||
            !isset($valData['team_id'])
        ))
        {
            $error = [
                'errors' => [
                    'league_id' => [
                        'Escolha um liga'
                    ],
                    'division_id' => [
                        'Escolha uma divisão'
                    ],
                    'team_id' => [
                        'Escolha um time'
                    ]
                ],
                'message' => 'Dados inválidas.',
            ];

            return response()->json($error,422);
        }

        $valData['birthday']  = Helper::getRandomDate($valData['age']);
        $valData['employed']  = isset($valData['league_id']) ? 1 : 0;
        $valData['mentor']    = isset($valData['mentor']) ? 1 : 0;

        $valData['force']     = Helper::getRandomForce($valData['force']);

        $vlr                  = Helper::getRandomSalary($valData['force'], $valData['mentor']);
        $valData['salary']    = $vlr[0];
        $valData['pass']      = $vlr[1];

        $rand                 = rand(1,6);
        $valData['contract']  = date('Y-m-d', strtotime("+$rand months", strtotime(date('Y-m-d'))));;

        $player               = Player::create($valData);

        $valData['player_id'] = $player->id;

        Attribute::create($valData);

        return $player->load('attribute');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return $player->load('attribute', 'team');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $valData = $request->validate([
            //player
            'name'           => 'required|string',
            'lastname'       => 'required|string',
            'nickname'       => 'required|'.Rule::unique('players')->ignore($player->id),
            'nationality'    => 'required|string',
            'age'            => 'required|numeric|min:16|max:99',
            'sex'            => 'required|string',
            //attributes
            'mentor'         => 'nullable|string',
            'role'           => 'required|'.Rule::in(Attribute::$roles),
            'secondary_role' => 'required|'.Rule::in(Attribute::$roles),

            'league_id'      => 'nullable|integer',
            'division_id'    => 'nullable|integer',
            'team_id'        => 'nullable|integer',

            'add_team'       => 'nullable|string',
        ]);

        if ($valData['role'] == $valData['secondary_role'])
        {
            $error = [
                'errors' => [
                    'role' => [
                        'A 1ª pos. deve ser diferente da 2ª'
                    ],
                    'secondary_role' => [
                        'A 2ª pos. deve ser diferente da 1ª'
                    ]
                ],
                'message' => 'Posições inválidas.',
            ];
            return response()->json($error,422);
        }

        if (isset($valData['add_team']))
        {
            if (!isset($valData['league_id'])   ||
                !isset($valData['division_id']) ||
                !isset($valData['team_id']))
            {
                $error = [
                    'errors' => [
                        'league_id' => [
                            'Escolha um liga'
                        ],
                        'division_id' => [
                            'Escolha uma divisão'
                        ],
                        'team_id' => [
                            'Escolha um time'
                        ]
                    ],
                    'message' => 'Dados inválidas.',
                ];

                return response()->json($error,422);
            }
        }
        else
        {
            $valData['team_id'] = 0;
        }

        if (isset($valData['team_id']) && isset($valData['mentor']))
        {
            $p = Player::where('id', $valData['team_id'])->where('mentor', 1)->get();

            if ($p === null)
            {
                $valData['mentor'] = 1;
            }
            else
            {
                $valData['mentor'] = 0;
            }
        }

        $valData['employed']  = isset($valData['league_id']) ? 1 : 0;

        $player->fill($valData);
        $player->save();

        $attribute = Attribute::find($player->attribute->player_id);
        $attribute->fill($valData);
        $attribute->save();

        return redirect('players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->load('attribute');
        $player->attribute()->delete();
        $player->delete();

        return $player;
    }
}
