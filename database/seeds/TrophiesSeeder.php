<?php

use App\Models\Trophy;
use Illuminate\Database\Seeder;

class TrophiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trophy::truncate();
        $timestamp = date('Y-m-d');

        $data = [
            [
                'name'       => 'World Championship',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name'       => 'Mid-Season Invitational',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name'       => 'Rift Rivals',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name'       => 'Spring Split',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
            [
                'name'       => 'Summer Split',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ],
        ];

        Trophy::insert($data);
    }
}
