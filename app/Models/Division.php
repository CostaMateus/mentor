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
        'league_id', 'name', 'initials',
    ];

    public function league()
    {
        return $this->belongsTo('App\Models\League');
    }

    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }
}
