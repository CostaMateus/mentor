<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request, $division_id)
    public function index(Request $request)
    {
        $data = Team::join('divisions as dv', 'teams.division_id', '=', 'dv.id')
                    ->join('leagues as lg', 'dv.league_id', '=', 'lg.id')
                    ->select(
                        'teams.id',
                        'teams.name',
                        'teams.initials',
                        'teams.image',
                        // 'dv.id as division_id',
                        'dv.initials as division_initials',
                        // 'lg.id as league_id',
                        'lg.initials as league_initials',
                        'lg.image as league_image')
                    // ->orderBy('teams.name')
                    // ->orderBy('dv.id')
                    // ->orderBy('lg.id')
                    ->get();

        return view('adm.teams', compact('data'));
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
            'name.required'     => 'Este campo é obrigatório.',
            'name.unique'       => 'Esse nome já está em uso!',
            'initials.required' => 'Este campo é obrigatório.',
            'initials.unique'   => 'Essa sigla já está em uso.',
        ];

        $validatedData = $request->validate([
            'league_id'   => 'required|string',
            'division_id' => 'required|numeric',
            'name'        => 'required|string|unique:teams',
            'initials'    => 'required|string|unique:teams',
            'image'       => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ], $message);

        $validatedData['initials']  = strtoupper($validatedData['initials']); 

        $league_initials = strtolower(explode('.', $validatedData['league_id'])[1]);
        unset($validatedData['league_id']);

        if (isset($request->image)) 
        {
            $imageName = $league_initials . '_' . strtolower($validatedData['initials']) . '.' . $request->image->extension();
            $request->image->move(public_path('images/game/leagues/teams'), $imageName); 
            $validatedData['image'] = $imageName;
        }
        else 
        {
            $validatedData['image'] = "default.png";
        }

        Team::create($validatedData);

        return redirect('teams');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return Team::join('divisions as dv', 'teams.division_id', '=', 'dv.id')
                    ->join('leagues as lg', 'dv.league_id', '=', 'lg.id')
                    ->select(
                        'teams.id',
                        'teams.name',
                        'teams.initials',
                        'teams.image',
                        'dv.id as division_id',
                        'lg.id as league_id',
                        'lg.name as league_name',
                        'lg.initials as league_initials')
                    ->where('teams.id', $team->id)
                    ->get()[0];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $message = [
            'name.required'     => 'Este campo é obrigatório.',
            'name.unique'       => 'Esse nome já está em uso!',
            'initials.required' => 'Este campo é obrigatório.',
            'initials.unique'   => 'Essa sigla já está em uso.',
        ];

        $validatedData = $request->validate([
            'league_id'   => 'required|string',
            'division_id' => 'required|numeric',
            'name'        => 'required|string|'.Rule::unique('teams')->ignore($team->id),
            'initials'    => 'required|string|'.Rule::unique('teams')->ignore($team->id),
            'image'       => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ], $message);

        $validatedData['initials']  = strtoupper($validatedData['initials']); 

        $league_initials = strtolower(explode('.', $validatedData['league_id'])[1]);
        unset($validatedData['league_id']);

        if (isset($request->image)) 
        {
            if(file_exists(public_path('images/game/leagues/teams' . $team->image)) && $team->image != "default.png") 
            {
                File::delete(public_path('images/game/leagues/teams/').$team->image);
            }

            $imageName = $league_initials . '_' . strtolower($validatedData['initials']) . '.' . $request->image->extension();

            $request->image->move(public_path('images/game/leagues/teams'), $imageName); 
            $validatedData['image'] = $imageName;
        }

        $team->fill($validatedData);
        $team->save();

        return redirect('teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if ($team->image != "default.png") {
            File::delete(public_path('images/game/leagues/teams/').$team->image);
        }

        $team->delete();

        return $team;
    }
}
