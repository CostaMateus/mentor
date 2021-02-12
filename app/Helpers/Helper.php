<?php

namespace App\Helpers;

use DateTime;

class Helper
{

    public static function formatteRole($role)
    {
        switch (strtolower($role)) {
            case 'top':
                return 'TOP';
                break;
            case 'jng':
                return 'JNG';
                break;
            case 'mid':
                return 'MID';
                break;
            case 'adc':
                return 'ADC';
                break;
            case 'sup':
                return 'SUP';
                break;
        }
    }

    public static function formatteRoleFull($role)
    {
        switch (strtolower($role)) {
            case 'top':
                return 'Topo';
                break;
            case 'jng':
                return 'Selva';
                break;
            case 'mid':
                return 'Meio';
                break;
            case 'adc':
                return 'Atirador';
                break;
            case 'sup':
                return 'Suporte';
                break;
        }
    }

    public static function formatSalary($value)
    {
        // first strip any formatting;
        $value = (0+str_replace(",", "", $value));

        // is this a number?
        if (!is_numeric($value)) return false;

        // now filter it;
        if ($value > 1000000) {
            return round(($value/1000000), 2).' M';
        } elseif ($value > 1000) {
            return round(($value/1000), 1).' mil';
        }

        return number_format($value);
    }

    public static function formatDate($date)
    {
        return (new DateTime($date))->format('d/m/Y');
    }

    public static function formatteFinance($cat)
    {
        switch ($cat) {
            case 'in_awards':
                return 'Prêmios';
                break;
            case 'in_fines':
                return 'Juros';
                break;
            case 'in_loan':
                return 'Empréstimos';
                break;
            case 'in_selling_players':
                return 'Venda de jogadores';
                break;
            case 'in_sponsorships':
                return 'Patrocínios';
                break;
            case 'in_supporter_partner':
                return 'Sócio torcedor';
                break;

            case 'out_buying_players':
                return 'Compra de jogadores';
                break;
            case 'out_fines':
                return 'Juros';
                break;
            case 'out_loan':
                return 'Empréstimo';
                break;
            case 'out_salary':
                return 'Salários';
                break;

        }
    }
}
