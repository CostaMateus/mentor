<?php

namespace App\Http\Controllers;

use App\Models\Trophy;
use Illuminate\Http\Request;

class TrophyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.home');
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
        $valData = $request->validate([
            'name' => 'required|string',
            'image' => 'string',
        ]);

        return Trophy::create($valData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function show(Trophy $trophy)
    {
        return $trophy;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function edit(Trophy $trophy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trophy $trophy)
    {
        $valData = $request->validate([
            'name' => 'required|string',
            'image' => 'string'
        ]);

        $trophy->fill($valData);
        $trophy->save();

        return $trophy;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trophy $trophy)
    {
        $trophy->delete();

        return $trophy;
    }
}
