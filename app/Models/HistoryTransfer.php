<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTransfer extends Model
{
    use HasFactory;

    protected $table = 'history_transfers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'seller_team_id', 'buyer_team_id', 'value',
    ];

}
