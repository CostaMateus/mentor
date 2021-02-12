<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    const IN_AWARDS  = 'in_awards';
    const IN_FINES   = 'in_fines';
    const IN_LOAN    = 'in_loan';
    const IN_SELLING = 'in_selling_players';
    const IN_SPONSOR = 'in_sponsorships';
    const IN_PARTNER = 'in_supporter_partner';
    const OUT_BUYING = 'out_buying_players';
    const OUT_FINES  = 'out_fines';
    const OUT_LOAN   = 'out_loan';
    const OUT_SALARY = 'out_salary';

    public static $categories = [
        self::IN_AWARDS,
        self::IN_FINES,
        self::IN_LOAN,
        self::IN_SELLING,
        self::IN_SPONSOR,
        self::IN_PARTNER,
        self::OUT_BUYING,
        self::OUT_FINES,
        self::OUT_LOAN,
        self::OUT_SALARY
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'value', 'type', 'date', 'team_id'
    ];
}
