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

    public function divison()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function trophies()
    {
        return $this->belongsToMany('App\Models\Trophy', 'team_trophy');
    }
}
