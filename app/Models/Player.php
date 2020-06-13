<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'nick', 'nationality', 
        'age', 'birthday', 'employed', 'coach', 'user_id',
    ];

    /**
     * Pega os atributos referentes a um jogador/treinador.
     */
    public function attribute()
    {
        return $this->hasOne('App\Models\Attribute');
    }
}
