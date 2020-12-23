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
        Player::truncate();

        $teams         = Team::get();

        $faker         = Factory::create('pt-br');

        $timestamp     = date('Y-m-d');

        $type_nickname = ['amazon', 'dalek', 'asgard', 'jaffa', 'wraith'];

        $data[]        = [
            'team_id'     => 2,
            'name'        => 'Mateus',
            'lastname'    => "Costa",
            'nickname'    => 'lkemns',
            'nationality' => 'BR',
            'age'         => 25,
            'birthday'    => date('1995-04-06'),
            'sex'         => 'M', // M or F
            'employed'    => true,
            'mentor'      => true,
            'user_id'     => 1,
            'created_at'  => $timestamp,
            'updated_at'  => $timestamp
        ];

        foreach ($teams as $team)
        {
            $temp = PlayersSeeder::generatePlayers($team, $faker, $type_nickname, $timestamp);
            $data = array_merge($data, $temp);
        }

        $temp2 = PlayersSeeder::generatePlayers(null, $faker, $type_nickname, $timestamp);

        $data = array_merge($data, $temp2);

        Player::insert($data);
    }


    protected static function generatePlayers($team = null, $faker, $type_nickname, $timestamp)
    {
        $y = ($team != null) ? 6 : rand(50,100);

        $team_country = $faker->countryCode();

        foreach(range(1, $y) as $i)
        {
            if ($team != null)
            {
                $team_id  = $team->id;
                $country  = ($team->id == 2) ? 'BR' : $team_country;
                $employed = true;
            }
            else
            {
                $team_id  = 0;
                $country  = $faker->countryCode();
                $employed = false;
            }

            $age_birthday = PlayersSeeder::getBirthday($faker);
            $name_sex     = PlayersSeeder::getSexName($faker);

            $data[] = [
                'team_id'     => $team_id,
                'name'        => $name_sex['name'],
                'lastname'    => $faker->lastName,
                'nickname'    => Helper::getNicknames($faker->randomElement($type_nickname)),
                'nationality' => $country,
                'age'         => $age_birthday['age'],
                'birthday'    => $age_birthday['birthday'],
                'sex'         => $name_sex['sex'],
                'employed'    => $employed,
                'mentor'      => ($team_id == 2) ? false : (($i == 1) ? : false),
                'user_id'     => 0,
                'created_at'  => $timestamp,
                'updated_at'  => $timestamp
            ];
        }

        return $data;
    }

    /**
     * Gera idade e data de nascimento
     *
     * @param [type] $faker
     * @return array $age_birthday
     */
    protected static function getBirthday($faker)
    {
        $age   = $faker->numberBetween(18, 33);

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

        return [
            'age'      => $age,
            'birthday' => date((2020 - $age) . '-' . $month . '-' . $day)
        ];
    }

    /**
     * Gera nome e sexo
     *
     * @param [type] $faker
     * @return array $name_sex
     */
    protected static function getSexName($faker)
    {
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

        return [
            'name' => $name,
            'sex'  => $sex
        ];
    }

}
