<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    const TOP = 'top';
    const JNG = 'jng';
    const MID = 'mid';
    const ADC = 'adc';
    const SUP = 'sup';

    public static $roles = [self::TOP, self::JNG, self::MID, self::ADC, self::SUP];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'role', 'secondary_role', 'force', 'energy', 'salary', 'pass',
    ];

    /**
     * Pega o jogador/treinador a quem pertence esse atributo.
     */
    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}
