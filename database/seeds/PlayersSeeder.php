<?php

use Faker\Factory;
use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::truncate();

        $faker = Factory::create('pt-br');

        $timestamp = date('Y-m-d');

        $data[] = [
                'name'        => 'Mateus',
                'lastname'    => "Costa",
                'nick'        => 'lkemns',
                'nationality' => 'Brasileiro',
                'age'         => 25,
                'birthday'    => date('1995-04-06'),
                'employed'    => true,
                'mentor'      => true,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
        ];

		foreach(range(2,11) as $a) {
            $data[] = [
                    'name'        => $faker->firstName('male'),
                    'lastname'    => $faker->lastName,
                    'nick'        => $faker->unique()->word,
                    'nationality' => $faker->country,
                    'age'         => $faker->numberBetween(18, 30),
                    'birthday'    => $faker->date('Y-m-d', '2001-12-12'),
                    'employed'    => false,
                    'mentor'      => false,
                    'created_at'  => $timestamp,
                    'updated_at'  => $timestamp
            ];
        }

        Player::insert($data);
    }
}
