<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Division::where('league_id', $league_id)
                        ->with('league')->get();
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
            'name.required' => 'O campo \'Nome da Divisão\' é obrigatório.',
            'initials.required' => 'O campo \'Sigla da Divisão\' é obrigatório e não pode ser vazio.',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string',
            'initials' => 'required|string',
        ], $message);

        $validatedData['league_id'] = $league_id;

        return Division::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        return Division::where('league_id', $league->id)
                        ->where('id', $division->id)
                        ->with('league:name')
                        ->with('teams')
                        ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $message = [
            'name.required' => 'O campo \'Nome da Divisão\' é obrigatório.',
            'initials.required' => 'O campo \'Sigla da Divisão\' é obrigatório e não pode ser vazio.',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string',
            'initials' => 'required|string',
        ], $message);

        $division->fill($validatedData);
        $division->save();

        return $division;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy($league_id, Division $division)
    {
        dd($league_id, $division);

        $division->delete();

        return $division;
    }
}
