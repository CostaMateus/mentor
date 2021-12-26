<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "split",
        "round",
        "date",
        "division_id",
        "blue_team_id",
        "red_team_id",
        "winner_team_id",
    ];

}
