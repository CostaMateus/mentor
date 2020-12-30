<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
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
            'teams'     => Team::get(),
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
        $validatedData = $request->validate([
            //player
            'name'        => 'required|string',
            'lastname'    => 'required|string',
            'nickname'    => 'required|string',
            'nationality' => 'string',
            'age'         => 'numeric',
            'birthday'    => 'date',
            //attributes
            'role'        => 'required|'.Rule::in(Attribute::$roles),
            'force'       => 'required|integer',
            'salary'      => 'required|numeric',
            'pass'        => 'required|numeric',
        ]);

        $player = Player::create($validatedData);

        $validatedData['player_id'] = $player->id;

        Attribute::create($validatedData);

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
