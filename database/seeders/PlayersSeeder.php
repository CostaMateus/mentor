<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Team;
use App\Models\Player;
use App\Helpers\Helper;
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
        $teams_count = Team::count();
        $count       = (($teams_count * 6) - 1);

        Player::truncate();

        $faker = Factory::create('pt-br');

        $timestamp = date('Y-m-d');

        $type_nickname = ['amazon', 'dalek', 'asgard', 'jaffa', 'wraith'];

        $data[] = [
                'name'        => 'Mateus',
                'lastname'    => "Costa",
                'nickname'    => 'lkemns',
                'nationality' => 'Brasileiro',
                'age'         => 25,
                'birthday'    => date('1995-04-06'),
                'sex'         => 'M', // M or F
                'employed'    => true,
                'mentor'      => true,
                'user_id'     => 1,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
        ];

		foreach(range(1, $count) as $i) {
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

            if (rand(0, 1))
            {
                $name = $faker->firstName('male');
                $sex  = 'M';
            }
            else
            {
                $name = $faker->firstName('female');
                $sex  = 'F';
            }

            $data[] = [
                    'name'        => $name,
                    'lastname'    => $faker->lastName,
                    'nickname'    => Helper::getNickame($faker->randomElement($type_nickname)),
                    'nationality' => $faker->country,
                    'age'         => $age,
                    'birthday'    => date((2022 - $age) . '-' . $month . '-' . $day),
                    'sex'         => $sex,
                    'employed'    => false,
                    'mentor'      => ($i % 6) ? false : true,
                    'user_id'     => 0,
                    'created_at'  => $timestamp,
                    'updated_at'  => $timestamp
            ];
        }

        Player::insert($data);
    }
}
