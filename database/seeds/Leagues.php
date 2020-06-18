<?php

use App\Models\League;
use Illuminate\Database\Seeder;

class Leagues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        League::truncate();
        $timestamp = date('Y-m-d');

        $data = [
            [
                'name' => 'Campeonato Brasileiro de League of Legends',
                'initials' => 'CBLoL',
                'nrdivisions' => '2',
                'image' => 'cblol.png',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'League of Legends European Championship',
                'initials' => 'LEC',
                'nrdivisions' => '2',
                'image' => 'lec.png',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'League of Legends Championship Series North America',
                'initials' => 'LCS NA',
                'nrdivisions' => '2',
                'image' => 'nalcs.png',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'LoL Champions Korea',
                'initials' => 'LCK',
                'nrdivisions' => '2',
                'image' => 'lck.png',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'LoL Pro League',
                'initials' => 'LPL',
                'nrdivisions' => '2',
                'image' => 'lpl.png',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name' => 'LoL Master Series',
                'initials' => 'LMS',
                'nrdivisions' => '2',
                'image' => 'lms.png',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
        ];

        League::insert($data);
    }
}
