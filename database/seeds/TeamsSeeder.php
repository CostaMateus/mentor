<?php

use Faker\Factory;
use App\Models\Team;
use App\Models\League;
use Illuminate\Database\Seeder;

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

        $leagues = League::with('divisions')->get();

        $faker = Factory::create('pt-br');
        
        $timestamp = date('Y-m-d');

        $data = [];

        foreach ($leagues as $lg) {
            foreach ($lg->divisions as $dv) {
                foreach (range(1,5) as $x) {
                    $name = ucwords($faker->sentence(3, false)) . " e-Sports";

                    $initials = explode(" ", $name);
                    $initials = $initials[0][0] . $initials[1][0] . $initials[2][0];
                    $initials = strtolower($initials);
                    
                    $data[] = [
                        "division_id" => $dv->id,
                        "name" => $name,
                        "initials" => strtoupper($initials),
                        "image" => strtolower($lg->initials) . "_" . $initials . ".png",
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp
                    ];
                }
            }
            break;
        }

        Team::insert($data);

        // $data = [
        //     // CBLOL
        //     // 1ª Divisão
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "ProGaming Esports",
        //         "initials" => "PRG",
        //         "image" => "cblol_prg.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "Red Canids",
        //         "initials" => "RED",
        //         "image" => "cblol_red.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "INTZ e-Sports Club",
        //         "initials" => "INTZ",
        //         "image" => "cblol_itz.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "Vivo Keyd",
        //         "initials" => "VK",
        //         "image" => "cblol_vk.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "CNB e-Sports Club",
        //         "initials" => "CNB",
        //         "image" => "cblol_cnb.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "RPG",
        //         "initials" => "RPG",
        //         "image" => "cblol_rpg.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "Flamengo eSports",
        //         "initials" => "FLA",
        //         "image" => "cblol_fla.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "KaBuM! e-Sports",
        //         "initials" => "KBM",
        //         "image" => "cblol_kbm.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "paiN Gaming",
        //         "initials" => "PAIN",
        //         "image" => "cblol_pain.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 1,
        //         "name" => "Team One e-Sports",
        //         "initials" => "ONE",
        //         "image" => "cblol_one.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],

        //     // 2ª Divisão
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "WP Gaming",
        //         "initials" => "WP",
        //         "image" => "cblol_wp.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Submarino Stars",
        //         "initials" => "SUB",
        //         "image" => "cblol_sub.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Operation Kino",
        //         "initials" => "OPK",
        //         "image" => "cblol_opk.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Redemption eSports POA",
        //         "initials" => "RDT",
        //         "image" => "cblol_rdt,png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "T Show",
        //         "initials" => "TS",
        //         "image" => "cblol_ts.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Iron Hawks e-Sports",
        //         "initials" => "IRON",
        //         "image" => "cblol_iron.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Falkol",
        //         "initials" => "FKL",
        //         "image" => "cblol_fkl.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Santos e-Sports",
        //         "initials" => "SAN",
        //         "image" => "cblol_san.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Brave e-Sports",
        //         "initials" => "BRA",
        //         "image" => "cblol_bra.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => 2,
        //         "name" => "Stay Gaming",
        //         "initials" => "STG",
        //         "image" => "cblol_stg.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],

        //     // Sem Divisão - Pertence ao CBLOL
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "5Fox E-Sports Club",
        //         "initials" => "FOX",
        //         "image" => "cblol_fox.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "CNB Trinity White",
        //         "initials" => "CNB",
        //         "image" => "cblol_cnb2.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "IDM Gaming",
        //         "initials" => "IDM",
        //         "image" => "cblol_idm.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "Sons of Tzu Gaming",
        //         "initials" => "SOT",
        //         "image" => "cblol_sot.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "e-Champ Gaming",
        //         "initials" => "CG",
        //         "image" => "cblol_cg.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "Team Genesis",
        //         "initials" => "GEN",
        //         "image" => "cblol_gen.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "Overload",
        //         "initials" => "OVER",
        //         "image" => "cblol_over.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "Big Gods",
        //         "initials" => "BIG",
        //         "image" => "cblol_big.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "Dexterity Team",
        //         "initials" => "DEX",
        //         "image" => "cblol_dex.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "JAYOB e-Sports",
        //         "initials" => "JAY",
        //         "image" => "cblol_jay.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "IMP e-Sports",
        //         "initials" => "IMP",
        //         "image" => "cblol_imp.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "Team awp",
        //         "initials" => "AWP",
        //         "image" => "cblol_awp.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "Team United",
        //         "initials" => "UNI",
        //         "image" => "cblol_uni.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 1,
        //         "division_id" => null,
        //         "name" => "g3nerationX",
        //         "initials" => "G3X",
        //         "image" => "cblol_g3x.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],


        //     // LEC
        //     // 1ª Divisão
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "FC Schalke 04",
        //         "initials" => "S04",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "Fnatic",
        //         "initials" => "FNC",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "G2 Esports",
        //         "initials" => "G2",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "Misfits Gaming",
        //         "initials" => "MSF",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "Splyce",
        //         "initials" => "SPY",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "Team Vitality",
        //         "initials" => "VIT",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "exceL Esports",
        //         "initials" => "EXL",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "Origen",
        //         "initials" => "",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "Rogue",
        //         "initials" => "",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 3,
        //         "name" => "SK Gaming",
        //         "initials" => "",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],

        //     // 2ª Divisão
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "Team ROCCAT",
        //         "initials" => "ROC",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "Unicorns Of Love",
        //         "initials" => "UOL",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "Giants Gaming",
        //         "initials" => "GIA",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "H2k-Gaming",
        //         "initials" => "H2K",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "Mysterious Monkeys",
        //         "initials" => "MM",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "Ninjas in Pyjamas",
        //         "initials" => "NIP",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "DIVIZON",
        //         "initials" => "DIV",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "D-City Gaming Stars",
        //         "initials" => "DCG",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "mYinsanity",
        //         "initials" => "MYI",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => 4,
        //         "name" => "PENTA Sports",
        //         "initials" => "PENT",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],

        //     // Sem Divisão - pertence ao LEC
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "Austrian Force eSports",
        //         "initials" => "ATF",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "BloodRain-Gaming",
        //         "initials" => "BRG",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "Black Lion",
        //         "initials" => "LION",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "EYES ON U",
        //         "initials" => "EYES",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "T3H Esports",
        //         "initials" => "T3H",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "eversity",
        //         "initials" => "EVRS",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "la cité",
        //         "initials" => "CITÉ",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "Entropy Gaming",
        //         "initials" => "EPY",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        //     [
        //         'league_id' => 2,
        //         "division_id" => null,
        //         "name" => "Team Riverside",
        //         "initials" => "TRS",
        //         "image" => "default.png",
        //         'created_at' => $timestamp,
        //         'updated_at' => $timestamp
        //     ],
        // ];

        // Team::insert($data);
    }
}
