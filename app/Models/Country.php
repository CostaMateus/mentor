<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "code",
        "code3",
        "formal",
    ];

    /**
     * Pega os Jogadores que são desse país.
     */
    public function players()
    {
        return $this->hasMany("App\Models\Player");
    }
}
