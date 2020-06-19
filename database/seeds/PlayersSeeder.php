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
                'user_id'     => 1,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
        ];

		foreach(range(2,25) as $a) {
            $age   = $faker->numberBetween(18, 30);

            $month = $faker->numberBetween(1, 12);

            if (in_array($month, [1, 3, 5, 7, 8, 10, 12])) 
            {
                $day = $faker->numberBetween(1,31);
            } 
            else if (in_array($month, [4, 6, 9, 11])) 
            {
                $day = $faker->numberBetween(1,30);
            } 
            else 
            {
                $day = $faker->numberBetween(1,28);
            }

            $data[] = [
                    'name'        => $faker->firstName('male'),
                    'lastname'    => $faker->lastName,
                    'nick'        => $faker->unique()->word,
                    'nationality' => $faker->country,
                    'age'         => $age,
                    'birthday'    => ((2020 - $age) . '-' . $month . '-' . $day),
                    'employed'    => false,
                    'mentor'      => false,
                    'user_id'     => 0,
                    'created_at'  => $timestamp,
                    'updated_at'  => $timestamp
            ];
        }

        Player::insert($data);
    }
}
