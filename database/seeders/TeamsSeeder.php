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

        $data = [
            // CBLOL
            // 1ª Divisão
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Cruzeiro e-Sports",
                "initials"    => "CRZ",
                "image"       => "cblol_crz.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Flamengo e-Sports",
                "initials"    => "FLA",
                "image"       => "cblol_fla.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Furia e-Sports",
                "initials"    => "FUR",
                "image"       => "cblol_fur.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "INTZ",
                "initials"    => "ITZ",
                "image"       => "cblol_itz.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Kabum e-Sports",
                "initials"    => "KBM",
                "image"       => "cblol_kbm.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Loud",
                "initials"    => "LLL",
                "image"       => "cblol_lll.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Pain Gaming",
                "initials"    => "PNG",
                "image"       => "cblol_png.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Red Canids",
                "initials"    => "RED",
                "image"       => "cblol_red.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Rensga e-Sports",
                "initials"    => "RNS",
                "image"       => "cblol_rns.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 1,
                "name"        => "Vorax",
                "initials"    => "VRX",
                "image"       => "cblol_vrx.png",
            ],
            // CBLOL
            // 2ª Divisão
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "Prodigy e-Sports",
                "initials"    => "PRG",
                "image"       => "cblol_prg.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "Redemption e-Sports",
                "initials"    => "RDP",
                "image"       => "cblol_rdp.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "Vivo Keyd",
                "initials"    => "VK",
                "image"       => "cblol_vk.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "Santos HotForex",
                "initials"    => "SAN",
                "image"       => "cblol_san.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "CNB e-Sports Club",
                "initials"    => "CNB",
                "image"       => "cblol_cnb.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "Team One e-Sports",
                "initials"    => "ONE",
                "image"       => "cblol_one.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "Uppercut e-Sports",
                "initials"    => "UP",
                "image"       => "cblol_up.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "ProGaming e-Sports",
                "initials"    => "PRO",
                "image"       => "cblol_pro.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "IDM Gaming",
                "initials"    => "IDM",
                "image"       => "cblol_idm.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 2,
                "name"        => "T Show",
                "initials"    => "TS",
                "image"       => "cblol_ts.png",
            ],
            // CBLOL
            // 3ª Divisão
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "Operation Kino",
                "initials"    => "OPK",
                "image"       => "cblol_opk.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "Remo Brave e-Sports",
                "initials"    => "BRA",
                "image"       => "cblol_bra.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "Big Gods",
                "initials"    => "BIG",
                "image"       => "cblol_big.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "g3nerationX",
                "initials"    => "G3X",
                "image"       => "cblol_g3x.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "Kabum Black",
                "initials"    => "KBB",
                "image"       => "cblol_kbb.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "INTZ Red",
                "initials"    => "ITZR",
                "image"       => "cblol_itzr.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "Dexterity Team",
                "initials"    => "DEX",
                "image"       => "cblol_dex.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "JAYOB e-Sports",
                "initials"    => "JAY",
                "image"       => "cblol_jay.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "Iron Hawks e-Sports",
                "initials"    => "IRON",
                "image"       => "cblol_iron.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 3,
                "name"        => "INTZ Genesis",
                "initials"    => "ITZG",
                "image"       => "cblol_itzg.png",
            ],
            // CBLOL
            // 4ª Divisão
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "e-Champ Gaming",
                "initials"    => "CG",
                "image"       => "cblol_cg.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "Team Genesis",
                "initials"    => "GEN",
                "image"       => "cblol_gen.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "Overload",
                "initials"    => "OVER",
                "image"       => "cblol_over.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "IMP e-Sports",
                "initials"    => "IMP",
                "image"       => "cblol_imp.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "MAD Gaming",
                "initials"    => "MAD",
                "image"       => "cblol_mad.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "Falkol",
                "initials"    => "FKL",
                "image"       => "cblol_fkl.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "Havan Liberty Gaming",
                "initials"    => "HL",
                "image"       => "cblol_hl.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "Intergalaxy Tigers Gaming",
                "initials"    => "ITG",
                "image"       => "cblol_itg.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "Submarino Stars",
                "initials"    => "SUB",
                "image"       => "cblol_sub.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => 4,
                "name"        => "WP Gaming",
                "initials"    => "WP",
                "image"       => "cblol_wp.png",
            ],

            // CBLOL
            // Sem Divisão
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "5Fox e-Sports Club",
                "initials"    => "FOX",
                "image"       => "cblol_fox.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "Merciless Gaming",
                "initials"    => "MG",
                "image"       => "cblol_mg.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "Keep Gaming",
                "initials"    => "KEEP",
                "image"       => "cblol_keep.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "Robot e-Sports Team",
                "initials"    => "RBOT",
                "image"       => "cblol_rbot.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "2Kill Gaming",
                "initials"    => "2KLL",
                "image"       => "cblol_2kll.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "Estúdio XP e-Sports",
                "initials"    => "EXP",
                "image"       => "cblol_exp.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "Ownerd e-Sports",
                "initials"    => "OWN",
                "image"       => "cblol_own.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "Seven Wars e-Sports",
                "initials"    => "7W",
                "image"       => "cblol_7w.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "Team awp",
                "initials"    => "AWP",
                "image"       => "cblol_awp.png",
            ],
            [
                "league_id"   => 1,
                "division_id" => null,
                "name"        => "CNB Infinity",
                "initials"    => "CNBI",
                "image"       => "cblol_cnbi.png",
            ],
        ];

        Team::insert($data);

        // $data = [
        //     // LEC
        //     // 1ª Divisão
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "FC Schalke 04",
        //         "initials"    => "S04",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "Fnatic",
        //         "initials"    => "FNC",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "G2 e-sports",
        //         "initials"    => "G2",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "Misfits Gaming",
        //         "initials"    => "MSF",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "Splyce",
        //         "initials"    => "SPY",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "Team Vitality",
        //         "initials"    => "VIT",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "exceL e-Sports",
        //         "initials"    => "EXL",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "Origen",
        //         "initials"    => "",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "Rogue",
        //         "initials"    => "",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 3,
        //         "name"        => "SK Gaming",
        //         "initials"    => "",
        //         "image"       => "default.png",
        //     ],

        //     // 2ª Divisão
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "Team ROCCAT",
        //         "initials"    => "ROC",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "Unicorns Of Love",
        //         "initials"    => "UOL",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "Giants Gaming",
        //         "initials"    => "GIA",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "H2k-Gaming",
        //         "initials"    => "H2K",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "Mysterious Monkeys",
        //         "initials"    => "MM",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "Ninjas in Pyjamas",
        //         "initials"    => "NIP",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "DIVIZON",
        //         "initials"    => "DIV",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "D-City Gaming Stars",
        //         "initials"    => "DCG",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "mYinsanity",
        //         "initials"    => "MYI",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => 4,
        //         "name"        => "PENTA e-Sports",
        //         "initials"    => "PENT",
        //         "image"       => "default.png",
        //     ],

        //     // Sem Divisão - pertence ao LEC
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "Austrian Force e-Sports",
        //         "initials"    => "ATF",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "BloodRain-Gaming",
        //         "initials"    => "BRG",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "Black Lion",
        //         "initials"    => "LION",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "EYES ON U",
        //         "initials"    => "EYES",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "T3H e-Sports",
        //         "initials"    => "T3H",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "eversity",
        //         "initials"    => "EVRS",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "la cité",
        //         "initials"    => "CITÉ",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "Entropy Gaming",
        //         "initials"    => "EPY",
        //         "image"       => "default.png",
        //     ],
        //     [
        //         "league_id"   => 2,
        //         "division_id" => null,
        //         "name"        => "Team Riverside",
        //         "initials"    => "TRS",
        //         "image"       => "default.png",
        //     ],
        // ];

        // Team::insert($data);
    }
}
