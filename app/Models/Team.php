<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'division_id', 'name', 'initials', 'image',
    ];

    /**
     * Pega a Divisão da qual esse Time faz parte.
     */
    public function divison()
    {
        return $this->belongsTo('App\Models\Division');
    }

    /**
     * Pega os Jogadores/Treinador que pertencem a esse Time.
     */
    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }

    /**
     * Pega os Troféus que esse Time já ganhou.
     */
    public function trophies()
    {
        return $this->belongsToMany('App\Models\Trophy', 'team_trophy');
    }
}
