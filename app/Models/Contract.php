<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "team_id",
        "player_id",
        "start",
        "end",
        "duration", // em meses
    ];

}
