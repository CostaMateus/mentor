<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Division;
use Illuminate\Database\Seeder;

class LeaguesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::truncate();
        League::truncate();

        $data = [
            [
                "name"           => "Campeonato Brasileiro de LoL",
                "initials"       => "CBLOL",
                "nrdivisions"    => 4,
                "nrparticipants" => 50,
                "special"        => 0,
                "image"          => "cblol.png",
            ],
            [
                "name"           => "LoL European Championship",
                "initials"       => "LEC",
                "nrdivisions"    => 2,
                "nrparticipants" => 30,
                "special"        => 0,
                "image"          => "lec.png",
            ],
            // [
            //     "name"           => "LoL Champions Korea",
            //     "initials"       => "LCK",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "lck.png",
            // ],
            // [
            //     "name"           => "LoL Continental League",
            //     "initials"       => "LCL",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "lcl.png",
            // ],
            // [
            //     "name"           => "LoL Championship Series",
            //     "initials"       => "LCS",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "lcs.png",
            // ],
            // [
            //     "name"           => "LoL Japan League",
            //     "initials"       => "LJL",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "ljl.png",
            // ],
            // [
            //     "name"           => "Liga Latinoamérica",
            //     "initials"       => "LLA",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "lla.png",
            // ],
            // [
            //     "name"           => "LoL Pro League",
            //     "initials"       => "LPL",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "lpl.png",
            // ],
            // [
            //     "name"           => "Oceanic Pro League",
            //     "initials"       => "OPL",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "opl.png",
            // ],
            // [
            //     "name"           => "Pacific Championship Series",
            //     "initials"       => "PCS",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "pcs.png",
            // ],
            // [
            //     "name"           => "Turkish Championship League",
            //     "initials"       => "TCL",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "tcl.png",
            // ],
            // [
            //     "name"           => "Vietnam Championship Series",
            //     "initials"       => "VCS",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 30,
            //     "special"        => 0,
            //     "image"          => "vcs.png",
            // ],
            // [
            //     "name"           => "Worlds Championship",
            //     "initials"       => "WC",
            //     "nrdivisions"    => 2,
            //     "nrparticipants" => 22,
            //     "special"        => 1,
            //     "image"          => "wc.png",
            // ],
            // [
            //     "name"           => "Rift Rivals",
            //     "initials"       => "RR",
            //     "nrdivisions"    => 1,
            //     "nrparticipants" => 8"
            //     "special"        => 1,
            //     "image"          => "rr.png",
            // ],
            // [
            //     "name"           => "Mid-Season Invitation",
            //     "initials"       => "MSI",
            //     "nrdivisions"    => 1,
            //     "nrparticipants" => 16,
            //     "special"        => 1,
            //     "image"          => "msi.png",
            // ],
        ];

        League::insert($data);

        $leagues = League::where("special", 0)->get();

        $data_divisions = [];

        foreach ($leagues as $league)
        {
            for ($i = 1; $i <= $league->nrdivisions; $i++)
          {
                $data_divisions[] = [
                    "league_id"      => $league->id,
                    "name"           => $league->initials . " " . $i . "ª Divisão",
                    "initials"       => $i . "ª D",
                    "nrparticipants" => 10,
                ];
            }
        }

        Division::insert($data_divisions);
    }
}
