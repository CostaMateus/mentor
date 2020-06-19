<?php

use App\Models\League;
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
        
        $leagues = League::get();

        $timestamp = date('Y-m-d');

        $data = [];

        foreach ($leagues as $lg) {
            $data[] = [
                'league_id'  => $lg->id,
                'name'       => $lg->initials . ' 1ª Divisão',
                'initials'   => '1ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
            $data[] = [
                'league_id'  => $lg->id,
                'name'       => $lg->initials . ' 2ª Divisão',
                'initials'   => '2ªD',
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        }

        Division::insert($data);
    }
}
