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
        "team_id",
        "name",
        "lastname",
        "nickname",
        "country_id",
        "birthday",
        "sex",
        "mentor",
        "user_id",
    ];

    /**
     * Pega o Atributo referente a esse jogador/treinador.
     */
    public function attribute()
    {
        return $this->hasOne("App\Models\Attribute");
    }

    /**
     * Pega o Atributo referente a esse jogador/treinador.
     */
    public function contract()
    {
        return $this->hasOne("App\Models\Contract");
    }

    /**
     * Pega o Time ao qual pertence esse jogador/treinador.
     */
    public function team()
    {
        return $this->belongsTo("App\Models\Team");
    }

    /**
     * Pega o País da qual esse Jogador faz parte.
     */
    public function country()
    {
        return $this->belongsTo("App\Models\Country", "nationality", "code");
    }
}
