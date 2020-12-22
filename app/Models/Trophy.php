<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image'
    ];

    /**
     * Pega os Times que já ganharam esse Troféu.
     */
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'team_trophy');
    }
}
