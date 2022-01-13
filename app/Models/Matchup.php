<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function division()
    {
        return $this->belongsTo("App\Models\Division");
    }

    public function teamBlue()
    {
        return $this->hasOne("App\Models\Team", "id", "blue_team_id");
    }
    public function teamRed()
    {
        return $this->hasOne("App\Models\Team", "id", "red_team_id");
    }
}
