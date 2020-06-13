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
        'name', 'initials', 'nrdivisions', 'image',
    ];

    public function divisions()
    {
        return $this->hasMany('App\Models\Division');
    }
}
