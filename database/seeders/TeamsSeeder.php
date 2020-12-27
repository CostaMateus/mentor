<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Team;
use App\Models\League;
use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::truncate();

        $timestamp = date('Y-m-d');

        $data = [];

        $data = [
            // CBLOL
            // 1ª Divisão
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Cruzeiro e-Sports',
                'initials'    => 'CRUZ',
                'image'       => 'cblol_cruz.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Flamengo e-Sports',
                'initials'    => 'FLA',
                'image'       => 'cblol_fla.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Furia e-Sports',
                'initials'    => 'FUR',
                'image'       => 'cblol_fur.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'INTZ',
                'initials'    => 'ITZ',
                'image'       => 'cblol_itz.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Kabum e-Sports',
                'initials'    => 'KBM',
                'image'       => 'cblol_kbm.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Loud',
                'initials'    => 'LOUD',
                'image'       => 'cblol_loud.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Pain Gaming',
                'initials'    => 'PNG',
                'image'       => 'cblol_png.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Red Canids',
                'initials'    => 'RED',
                'image'       => 'cblol_red.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Rensga e-Sports',
                'initials'    => 'REN',
                'image'       => 'cblol_ren.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 1,
                'name'        => 'Vorax',
                'initials'    => 'VRX',
                'image'       => 'cblol_vrx.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            // CBLOL
            // 2ª Divisão
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'Prodigy e-Sports',
                'initials'    => 'PRG',
                'image'       => 'cblol_prg.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'Redemption e-Sports',
                'initials'    => 'RDP',
                'image'       => 'cblol_rdp.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'Vivo Keyd',
                'initials'    => 'VK',
                'image'       => 'cblol_vk.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'Santos HotForex',
                'initials'    => 'SAN',
                'image'       => 'cblol_san.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'CNB e-Sports Club',
                'initials'    => 'CNB',
                'image'       => 'cblol_cnb.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'Team One e-Sports',
                'initials'    => 'ONE',
                'image'       => 'cblol_one.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'Uppercut e-Sports',
                'initials'    => 'UP',
                'image'       => 'cblol_up.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'ProGaming e-Sports',
                'initials'    => 'PRO',
                'image'       => 'cblol_pro.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'IDM Gaming',
                'initials'    => 'IDM',
                'image'       => 'cblol_idm.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 2,
                'name'        => 'T Show',
                'initials'    => 'TS',
                'image'       => 'cblol_ts.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            // CBLOL
            // 3ª Divisão
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'Operation Kino',
                'initials'    => 'OPK',
                'image'       => 'cblol_opk.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'Remo Brave e-Sports',
                'initials'    => 'BRA',
                'image'       => 'cblol_bra.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'Big Gods',
                'initials'    => 'BIG',
                'image'       => 'cblol_big.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'g3nerationX',
                'initials'    => 'G3X',
                'image'       => 'cblol_g3x.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'Kabum Black',
                'initials'    => 'KBB',
                'image'       => 'cblol_kbb.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'INTZ Red',
                'initials'    => 'ITZR',
                'image'       => 'cblol_itzr.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'Dexterity Team',
                'initials'    => 'DEX',
                'image'       => 'cblol_dex.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'JAYOB e-Sports',
                'initials'    => 'JAY',
                'image'       => 'cblol_jay.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'Iron Hawks e-Sports',
                'initials'    => 'IRON',
                'image'       => 'cblol_iron.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 3,
                'name'        => 'INTZ Genesis',
                'initials'    => 'ITZG',
                'image'       => 'cblol_itzg.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            // CBLOL
            // 4ª Divisão
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'e-Champ Gaming',
                'initials'    => 'CG',
                'image'       => 'cblol_cg.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'Team Genesis',
                'initials'    => 'GEN',
                'image'       => 'cblol_gen.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'Overload',
                'initials'    => 'OVER',
                'image'       => 'cblol_over.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'IMP e-Sports',
                'initials'    => 'IMP',
                'image'       => 'cblol_imp.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'MAD Gaming',
                'initials'    => 'MAD',
                'image'       => 'cblol_mad.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'Falkol',
                'initials'    => 'FKL',
                'image'       => 'cblol_fkl.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'Havan Liberty Gaming',
                'initials'    => 'HL',
                'image'       => 'cblol_hl.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'Intergalaxy Tigers Gaming',
                'initials'    => 'ITG',
                'image'       => 'cblol_itg.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'Submarino Stars',
                'initials'    => 'SUB',
                'image'       => 'cblol_sub.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => 4,
                'name'        => 'WP Gaming',
                'initials'    => 'WP',
                'image'       => 'cblol_wp.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],

            // CBLOL
            // Sem Divisão
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => '5Fox e-Sports Club',
                'initials'    => 'FOX',
                'image'       => 'cblol_fox.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'Merciless Gaming',
                'initials'    => 'MG',
                'image'       => 'cblol_mg.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'Keep Gaming',
                'initials'    => 'KEEP',
                'image'       => 'cblol_keep.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'Robot e-Sports Team',
                'initials'    => 'RBOT',
                'image'       => 'cblol_rbot.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => '2Kill Gaming',
                'initials'    => '2KLL',
                'image'       => 'cblol_2kll.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'Estúdio XP e-Sports',
                'initials'    => 'EXP',
                'image'       => 'cblol_exp.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'Ownerd e-Sports',
                'initials'    => 'OWN',
                'image'       => 'cblol_own.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'Seven Wars e-Sports',
                'initials'    => '7W',
                'image'       => 'cblol_7w.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'Team awp',
                'initials'    => 'AWP',
                'image'       => 'cblol_awp.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'league_id'   => 1,
                'division_id' => null,
                'name'        => 'CNB Infinity',
                'initials'    => 'CNBI',
                'image'       => 'cblol_cnbi.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
        ];

        Team::insert($data);

        // $data = [
        //     // LEC
        //     // 1ª Divisão
        //     [
        //         'league_id'   => 2,
        //         'division_id' => 3,
        //         'name' => 'FC Schalke 04',
        //         'initials' => 'S04',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id'   => 2,
        //         'division_id' => 3,
        //         'name' => 'Fnatic',
        //         'initials' => 'FNC',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'G2 e-sports',
        //         'initials' => 'G2',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'Misfits Gaming',
        //         'initials' => 'MSF',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'Splyce',
        //         'initials' => 'SPY',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'Team Vitality',
        //         'initials' => 'VIT',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'exceL e-Sports',
        //         'initials' => 'EXL',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'Origen',
        //         'initials' => '',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'Rogue',
        //         'initials' => '',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 3,
        //         'name' => 'SK Gaming',
        //         'initials' => '',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],

        //     // 2ª Divisão
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'Team ROCCAT',
        //         'initials' => 'ROC',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'Unicorns Of Love',
        //         'initials' => 'UOL',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'Giants Gaming',
        //         'initials' => 'GIA',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'H2k-Gaming',
        //         'initials' => 'H2K',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'Mysterious Monkeys',
        //         'initials' => 'MM',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'Ninjas in Pyjamas',
        //         'initials' => 'NIP',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'DIVIZON',
        //         'initials' => 'DIV',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'D-City Gaming Stars',
        //         'initials' => 'DCG',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'mYinsanity',
        //         'initials' => 'MYI',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => 4,
        //         'name' => 'PENTA e-Sports',
        //         'initials' => 'PENT',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],

        //     // Sem Divisão - pertence ao LEC
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'Austrian Force e-Sports',
        //         'initials' => 'ATF',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'BloodRain-Gaming',
        //         'initials' => 'BRG',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'Black Lion',
        //         'initials' => 'LION',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'EYES ON U',
        //         'initials' => 'EYES',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'T3H e-Sports',
        //         'initials' => 'T3H',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'eversity',
        //         'initials' => 'EVRS',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'la cité',
        //         'initials' => 'CITÉ',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'Entropy Gaming',
        //         'initials' => 'EPY',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         'division_id' => null,
        //         'name' => 'Team Riverside',
        //         'initials' => 'TRS',
        //         'image' => 'default.png',
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        // ];

        // Team::insert($data);
    }
}
