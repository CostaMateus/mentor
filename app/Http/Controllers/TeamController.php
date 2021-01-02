<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\League;
use App\Models\Player;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
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
        $data = DB::table('teams as tm')
                  ->join('players as pl', 'pl.team_id', '=', 'tm.id')
                  ->leftJoin('divisions as dv', 'tm.division_id', '=', 'dv.id')
                  ->join('leagues as lg', 'tm.league_id', '=', 'lg.id')
                  ->select(
                      'tm.id',
                      'tm.name',
                      'tm.initials',
                      'tm.image',
                      DB::raw('count(pl.id) as total_players'),
                      'dv.id as division_id',
                      'dv.initials as division_initials',
                      'lg.id as league_id',
                      'lg.name as league_name',
                      'lg.initials as league_initials',
                      'lg.image as league_image')
                  ->groupBy('tm.id')
                  ->orderBy('lg.id')
                  ->orderBy(DB::raw('ISNULL(dv.id), dv.id'), 'ASC') // valores nulos ficam por último
                  ->orderBy('tm.name')
                  ->get();

        return view('adm.teams', [
            'data'      => $data,
            'leagues'   => League::where('special', 0)->orderBy('name')->get(),
            'divisions' => Division::orderBy('league_id')->get(),
            'players'   => Player::with('attribute')->get(),
            'countries' => DB::table('countries')->select('name', 'code')->orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.

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

        $valData = $request->validate([
            'league_id'   => 'required|string',
            'division_id' => 'required|numeric',
            'name'        => 'required|string|unique:teams',
            'initials'    => 'required|string|unique:teams',
            'image'       => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ], $message);

        $valData['initials']  = strtoupper($valData['initials']);

        $league_initials = strtolower(explode('.', $valData['league_id'])[1]);
        unset($valData['league_id']);

        if (isset($request->image))
        {
            $imageName = $league_initials . '_' . strtolower($valData['initials']) . '.' . $request->image->extension();
            $request->image->move(public_path('images/game/leagues/teams'), $imageName);
            $valData['image'] = $imageName;
        }
        else
        {
            $valData['image'] = "default.png";
        }

        Team::create($valData);

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
        return DB::table('teams as tm')
                 ->join('leagues as lg', 'tm.league_id', '=', 'lg.id')
                 ->select(
                     'tm.id',
                     'tm.name',
                     'tm.initials',
                     'tm.image',
                     'tm.league_id',
                     'tm.division_id',
                     'lg.initials as league_initials')
                 ->where('tm.id', $team->id)
                 ->get();
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

        $valData = $request->validate([
            'league_id'   => 'required|string',
            'division_id' => 'required|numeric',
            'name'        => 'required|string|'.Rule::unique('teams')->ignore($team->id),
            'initials'    => 'required|string|'.Rule::unique('teams')->ignore($team->id),
            'image'       => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ], $message);

        $valData['initials']    = strtoupper($valData['initials']);
        $valData['division_id'] = ($valData['division_id'] != 0) ? $valData['division_id'] : null;

        $league_initials              = strtolower(explode('.', $valData['league_id'])[1]);
        unset($valData['league_id']);

        if (isset($request->image))
        {
            if(file_exists(public_path('images/game/leagues/teams' . $team->image)) && $team->image != "default.png")
            {
                File::delete(public_path('images/game/leagues/teams/').$team->image);
            }

            $imageName = $league_initials . '_' . strtolower($valData['initials']) . '.' . $request->image->extension();

            $request->image->move(public_path('images/game/leagues/teams'), $imageName);
            $valData['image'] = $imageName;
        }

        $team->fill($valData);
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

        DB::table('players as pl')->where('team_id', $team->id)->update([
            'team_id' => 0,
            'employed' => 0
        ]);

        $team->delete();

        return $team;
    }
}
