<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "league_id",
        "division_id",
        "name",
        "initials",
        "image",
    ];

    /**
     * Pega a Liga da qual esse Time faz parte.
     */
    public function league()
    {
        return $this->belongsTo("App\Models\League");
    }

    /**
     * Pega a Divisão da qual esse Time faz parte.
     */
    public function division()
    {
        return $this->belongsTo("App\Models\Division");
    }

    /**
     * Pega os Jogadores/Treinador que pertencem a esse Time.
     */
    public function players()
    {
        return $this->hasMany("App\Models\Player");
    }

    /**
     * Pega os Troféus que esse Time já ganhou.
     */
    public function trophies()
    {
        return $this->belongsToMany("App\Models\Trophy", "team_trophy");
    }

    /**
     * Pega as finanças do time
     */
    public function finance()
    {
        return $this->hasMany("App\Models\Finance");
    }
}
