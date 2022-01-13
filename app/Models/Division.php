<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "league_id",
        "name",
        "initials",
        "nrparticipants",
    ];

    /**
     * Pega a Liga a quem pertence essa Divisão.
     */
    public function league()
    {
        return $this->belongsTo("App\Models\League");
    }

    /**
     * Pega os Times que fazem parte dessa Divisão.
     */
    public function teams()
    {
        return $this->hasMany("App\Models\Team");
    }

    public function matchups()
    {
        return $this->hasMany("App\Models\Matchup")->whereNull("winner_team_id")->limit(5);
    }
}
