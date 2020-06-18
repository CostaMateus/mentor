<?php

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::truncate();
        
        $timestamp = date('Y-m-d');

        $data = [
            [
                'league_id'  => '1',
                'name'       => 'BR 1ª Divisão',
                'initials'   => '1ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '1',
                'name'       => 'BR 2ª Divisão',
                'initials'   => '2ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '2',
                'name'       => 'EU 1ª Divisão',
                'initials'   => '1ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '2',
                'name'       => 'EU 2ª Divisão',
                'initials'   => '2ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '3',
                'name'       => 'NA 1ª Divisão',
                'initials'   => '1ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '3',
                'name'       => 'NA 2ª Divisão',
                'initials'   => '2ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '4',
                'name'       => 'KR 1ª Divisão',
                'initials'   => '1ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '4',
                'name'       => 'KR 2ª Divisão',
                'initials'   => '2ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '5',
                'name'       => 'CN 1ª Divisão',
                'initials'   => '1ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '5',
                'name'       => 'CN 2ª Divisão',
                'initials'   => '2ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '6',
                'name'       => 'TW 1ª Divisão',
                'initials'   => '1ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'league_id'  => '6',
                'name'       => 'TW 2ª Divisão',
                'initials'   => '2ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
        ];

        Division::insert($data);
    }
}
