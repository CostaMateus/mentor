<?php

namespace App\Http\Controllers\Api;

use App\Models\League;
use App\Models\Division;
use App\Http\Controllers\Controller;
use App\Http\Requests\LeagueRequest;
use Illuminate\Support\Facades\File;

class LeagueController extends Controller
{
    /**
     * Retorna todos as ligas normais
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return League::with("divisions", "teams")->orderBy("name")->get();
    }

    public function store(LeagueRequest $request)
    {

    }

    /**
     * Retorna uma liga.
     *
     * @param  \App\Models\League  $league
     * @return \App\Models\League
     */
    public function show(League $league)
    {
        return $league->load("divisions", "teams");
    }

    public function update(LeagueRequest $request, League $league)
    {
        $val_data = $request->validated();

        $league->load("divisions", "teams");

        if ($league->teams->count() == 0)
        {
            if (isset($request->image))
            {
                $image_name = strtolower($val_data["initials"]) . "." . $request->image->extension();

                if (file_exists(public_path("images/game/leagues/" . $image_name)))
                {
                    File::delete(public_path("images/game/leagues/") . $league->image);
                }

                $request->image->move(public_path("images/game/leagues"), $image_name);
                $val_data["image"] = $image_name;
            }

            $league->fill($val_data);
            $league->save();
        }
        else
        {
            // retornar error 422;
        }

        return $league;
    }

    /**
     * Exclui uma liga e suas divisoes, se tiver.
     *
     * @param  \App\Models\League  $league
     * @return \App\Models\League
     */
    public function destroy(League $league)
    {
        if ($league->image != "default.png")
        {
            File::delete(public_path("images/game/leagues/") . $league->image);
        }

        $league->load("divisions");
        $league->divisions()->delete();
        $league->delete();

        return $league;
    }

}
