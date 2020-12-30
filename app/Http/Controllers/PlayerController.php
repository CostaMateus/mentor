<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $data = Player::where('mentor', 0)
                      ->with('attribute')
                      ->orderBy('name', 'ASC')
                      ->orderBy('lastname', 'ASC')
                      ->orderBy('nickname', 'ASC')
                      ->get();

        return view('adm.players', [
            'data'      => $data,
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
        return $player->load('attribute');
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
        $validatedData = $request->validate([
            //player
            'name'        => 'required|string',
            'lastname'    => 'required|string',
            'nickname'    => 'required|string',
            'nationality' => 'string',
            'age'         => 'numeric',
            'birthday'    => 'date',
            //attributes
            'role'        => Rule::in(Attribute::$roles),
            'force'       => 'required|integer',
            'salary'      => 'required|numeric',
            'pass'        => 'required|numeric',
        ]);

        $player->fill($validatedData);
        $player->save();

        $attribute = Attribute::find($player->attribute->player_id);
        $attribute->fill($validatedData);
        $attribute->save();

        return $player->load('attribute');
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
