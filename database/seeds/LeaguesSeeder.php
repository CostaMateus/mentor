<?php

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
                'nrdivisions' => '2',
                'image'       => 'cblol.png',
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ],
            // [
            //     'name'        => 'LoL Champions Korea',
            //     'initials'    => 'LCK',
            //     'nrdivisions' => '2',
            //     'image'       => 'lck.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Continental League',
            //     'initials'    => 'LCL',
            //     'nrdivisions' => '2',
            //     'image'       => 'lcl.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Championship Series',
            //     'initials'    => 'LCS',
            //     'nrdivisions' => '2',
            //     'image'       => 'lcs.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL European Championship',
            //     'initials'    => 'LEC',
            //     'nrdivisions' => '2',
            //     'image'       => 'lec.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Japan League',
            //     'initials'    => 'LJL',
            //     'nrdivisions' => '2',
            //     'image'       => 'ljl.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Liga Latinoamérica',
            //     'initials'    => 'LLA',
            //     'nrdivisions' => '2',
            //     'image'       => 'lla.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'LoL Pro League',
            //     'initials'    => 'LPL',
            //     'nrdivisions' => '2',
            //     'image'       => 'lpl.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Oceanic Pro League',
            //     'initials'    => 'OPL',
            //     'nrdivisions' => '2',
            //     'image'       => 'opl.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Pacific Championship Series',
            //     'initials'    => 'PCS',
            //     'nrdivisions' => '2',
            //     'image'       => 'pcs.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Turkish Championship League',
            //     'initials'    => 'TCL',
            //     'nrdivisions' => '2',
            //     'image'       => 'tcl.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
            // [
            //     'name'        => 'Vietnam Championship Series',
            //     'initials'    => 'VCS',
            //     'nrdivisions' => '2',
            //     'image'       => 'vcs.png',
            //     'created_at'  => $timestamp,
            //     'updated_at'  => $timestamp
            // ],
        ];

        League::insert($data);

        $data_divisions = [];
        foreach ($data as $key => $value) {
            $data_divisions[] = [
                'league_id'  => $key + 1,
                'name'       => $value['initials'] . ' 1ª Divisão',
                'initials'   => '1ª D',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
            $data_divisions[] = [
                'league_id'  => $key + 1,
                'name'       => $value['initials'] . ' 2ª Divisão',
                'initials'   => '2ª D',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        }
        
        Division::insert($data_divisions);
    }
}
