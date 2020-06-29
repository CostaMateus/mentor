<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\League;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        return League::orderBy('name')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = League::orderBy('name')->get();

        return view('adm.leagues', compact('data'));
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
            'name.required'     => 'Este campo é obrigatório.',
            'name.unique'       => 'Esse nome já está em uso!',
            'initials.required' => 'Este campo é obrigatório.',
            'initials.unique'   => 'Essa sigla já está em uso.',
        ];

        $validatedData = $request->validate([
            'name'        => 'required|string|unique:leagues',
            'initials'    => 'required|string|unique:leagues',
            'nrdivisions' => 'nullable|numeric',
            'image'       => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ], $message);

        $validatedData['initials'] = strtoupper($validatedData['initials']); 
        $validatedData['nrdivisions'] = (isset($validatedData['nrdivisions'])) ? $validatedData['nrdivisions'] : 1;

        if (isset($request->image)) 
        {
            $imageName = strtolower($validatedData['initials']) . '.' . $request->image->extension();
            $request->image->move(public_path('images/game/leagues'), $imageName); 
            $validatedData['image'] = $imageName;
        }
        else 
        {
            $validatedData['image'] = "default.png";
        }

        $league = League::create($validatedData);

        $timestamp = date('Y-m-d');

        $data = [];

        for ($i = 1; $i <= $validatedData['nrdivisions']; $i++) 
        { 
            $data[] = [
                'league_id'  => $league->id,
                'name'       => $validatedData['initials'] . ' ' . $i .'ª Divisão',
                'initials'   => $i . 'ª D',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        }

        Division::insert($data);

        return redirect('leagues');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function show(League $league)
    {
        return $league;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, League $league)
    {
        $message = [
            'name.required'     => 'Este campo é obrigatório.',
            'name.unique'       => 'Esse nome já está em uso!',
            'initials.required' => 'Este campo é obrigatório.',
            'initials.unique'   => 'Essa sigla já está em uso.',
        ];

        $validatedData = $request->validate([
            'name'        => 'required|string|'.Rule::unique('leagues')->ignore($league->id),
            'initials'    => 'required|string|'.Rule::unique('leagues')->ignore($league->id),
            'nrdivisions' => 'nullable|numeric',
            'image'       => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ], $message);

        if (isset($request->image) ) 
        {
            $imageName = strtolower($validatedData['initials']) . '.' . $request->image->extension();

            if (file_exists(public_path('images/game/leagues/' . $imageName))) 
            {
                File::delete(public_path('images/game/leagues/').$league->image);
            } 

            $request->image->move(public_path('images/game/leagues'), $imageName); 
            $validatedData['image'] = $imageName;
        }
        else 
        {
            $validatedData['image'] = "default.png";
        }

        $league->fill($validatedData);
        $league->save();

        return redirect('leagues');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\League  $league
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league)
    {
        if ($league->image != "default.png") {
            File::delete(public_path('images/game/leagues/').$league->image);
        }

        $league->load('divisions');
        $league->divisions()->delete();
        $league->delete();

        return $league;
    }

    /**
     *
     *
     * @param League $league
     * @return void
     */
    public function listTeams(League $league)
    {
        return Team::where('league_id', $league->id)->get();
    }
}
