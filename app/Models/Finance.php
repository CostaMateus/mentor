<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    const BALANCE        = 'balance';              // saldo dos gastos

    // const IN_FINES       = 'in_fines';             // multas         (entradas)
    // const IN_LOAN        = 'in_loan';              // emprétimos     (entradas)
    // const OUT_FINES      = 'out_fines';            // multas         (saidas)
    // const OUT_LOAN       = 'out_loan';             // emprestimos    (saidas)

    const IN_AWARDS      = 'in_awards';            // prêmios        (entradas)
    const IN_SELLING     = 'in_selling_players';   // venda de jogs  (entradas)
    const IN_SEVERAL     = 'in_several';           // diversos       (entradas)
    const IN_SPONSOR     = 'in_sponsorships';      // patrocinadores (entradas)
    const IN_PARTNER     = 'in_supporter_partner'; // sócio torcedor (entradas)
    const OUT_BUYING     = 'out_buying_players';   // compra de jogs (saidas)
    const OUT_SALARY     = 'out_salary';           // salários       (saidas)
    const OUT_SEVERAL    = 'out_several';          // diversos       (saidas)

    public static function categories()
    {
        return [
            self::BALANCE,
            self::IN_AWARDS,
            // self::IN_FINES,
            // self::IN_LOAN,
            self::IN_SELLING,
            self::IN_SEVERAL,
            self::IN_SPONSOR,
            self::IN_PARTNER,
            self::OUT_BUYING,
            // self::OUT_FINES,
            // self::OUT_LOAN,
            self::OUT_SALARY,
            self::OUT_SEVERAL,
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'value', 'type', 'date', 'team_id'
    ];
}
