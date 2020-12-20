<?php

namespace Database\Seeders;

use App\Code;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Code::truncate();

        $faker = Factory::create();

        $timestamp = date('Y-m-d');

        $data = [];

        foreach (range(1,5) as $x) {
            $data[] = [
                'code'       => 'BR' . $faker->bothify('###???##??') . 'SP', // BR123XXX45YYSP
                'used'       => 0,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        }

        Code::insert($data);
    }
}
