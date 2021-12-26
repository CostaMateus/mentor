<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "initials",
        "nrdivisions",
        "nrparticipants",
        "special",
        "image",
    ];

    /**
     * Pega as Diviões que pertencem a essa Liga.
     */
    public function divisions()
    {
        return $this->hasMany("App\Models\Division");
    }

    /**
     * Pega os Times que pertencem a essa Liga.
     */
    public function teams()
    {
        return $this->hasMany("App\Models\Team");
    }
}
