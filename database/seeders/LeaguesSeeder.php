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

        $timestamp = date('Y-m-d');

        $data = [
            [
                'name'        => 'Campeonato Brasileiro de LoL',
                'initials'    => 'CBLOL',
                'nrdivisions' => '4',
                'image'       => 'cblol.png',
                'special'     => 0,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            // [
            //     'name'        => 'LoL Champions Korea',
            //     'initials'    => 'LCK',
            //     'nrdivisions' => '2',
            //     'image'       => 'lck.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Continental League',
            //     'initials'    => 'LCL',
            //     'nrdivisions' => '2',
            //     'image'       => 'lcl.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Championship Series',
            //     'initials'    => 'LCS',
            //     'nrdivisions' => '2',
            //     'image'       => 'lcs.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL European Championship',
            //     'initials'    => 'LEC',
            //     'nrdivisions' => '2',
            //     'image'       => 'lec.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Japan League',
            //     'initials'    => 'LJL',
            //     'nrdivisions' => '2',
            //     'image'       => 'ljl.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Liga Latinoamérica',
            //     'initials'    => 'LLA',
            //     'nrdivisions' => '2',
            //     'image'       => 'lla.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Pro League',
            //     'initials'    => 'LPL',
            //     'nrdivisions' => '2',
            //     'image'       => 'lpl.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Oceanic Pro League',
            //     'initials'    => 'OPL',
            //     'nrdivisions' => '2',
            //     'image'       => 'opl.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Pacific Championship Series',
            //     'initials'    => 'PCS',
            //     'nrdivisions' => '2',
            //     'image'       => 'pcs.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Turkish Championship League',
            //     'initials'    => 'TCL',
            //     'nrdivisions' => '2',
            //     'image'       => 'tcl.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Vietnam Championship Series',
            //     'initials'    => 'VCS',
            //     'nrdivisions' => '2',
            //     'image'       => 'vcs.png',
            //     'special'     => 0,
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            [
                'name'        => 'Worlds Championship',
                'initials'    => 'WC',
                'nrdivisions' => '22',
                'image'       => 'wc.png',
                'special'     => 1,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'name'        => 'Rift Rivals',
                'initials'    => 'RR',
                'nrdivisions' => '8',
                'image'       => 'rr.png',
                'special'     => 1,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            [
                'name'        => 'Mid-Season Invitation',
                'initials'    => 'MSI',
                'nrdivisions' => '13',
                'image'       => 'msi.png',
                'special'     => 1,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
        ];

        League::insert($data);

        $leagues = League::where('special', 0)->get();

        $data_divisions = [];

        foreach ($leagues as $league)
        {
            for ($i = 1; $i <= $league->nrdivisions; $i++) {
                $data_divisions[] = [
                    'league_id'  => $league->id,
                    'name'       => $league->initials . ' ' . $i . 'ª Divisão',
                    'initials'   => $i . 'ª D',
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                ];
            }
        }

        Division::insert($data_divisions);
    }
}
