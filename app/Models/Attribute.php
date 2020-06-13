<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    const TOP = 'TOP';
    const JNG = 'JNG';
    const MID = 'MID';
    const ADC = 'ADC';
    const SUP = 'SUP';
    public static $roles = [self::TOP, self::JNG, self::MID, self::ADC, self::SUP];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'role', 'force', 'energy', 'salary', 'pass',
    ];

    /**
     * Pega o jogador/treinador a quem pertence esses atributos.
     */
    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}
