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

        $countries     = ['KR','CN','TW','US','DK','PL','DE','FR','CA','VN','RU','BR','SE','HK','ES','BE','NL','GB','TR','HR','CZ','BG','PH','UA','AU','SI','TH','JP','SA','SG','GR','RO','CL','FI','AR','MX','NO','MY','LT','HU','PT','AM','TN','EE','LB','IT','RS','JO','PE','AT'];

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
            $temp = PlayersSeeder::generatePlayers($team, $faker, $type_nickname, $countries, $timestamp);
            $data = array_merge($data, $temp);
        }

        $temp2 = PlayersSeeder::generatePlayers(null, $faker, $type_nickname, $countries, $timestamp);

        $data = array_merge($data, $temp2);

        Player::insert($data);
    }


    protected static function generatePlayers($team = null, $faker, $type_nickname, $countries, $timestamp)
    {
        $y = ($team != null) ? 6 : rand(50,100);

        $team_country = $faker->randomElement($countries);

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
            $name_sex     = PlayersSeeder::getNameAndSex($country);

            $data[] = [
                'team_id'     => $team_id,
                'name'        => $name_sex['firstName'],
                'lastname'    => $name_sex['lastName'],
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
        $age   = $faker->numberBetween(16, 35);

        $month = $faker->numberBetween(1, 12);

        switch ($month) {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $day = $faker->numberBetween(1,31);
                break;

            case 4:
            case 6:
            case 9:
            case 11:
                $day = $faker->numberBetween(1,30);
                break;

            case 2:
                $day = $faker->numberBetween(1,28);
                break;
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
    protected static function getNameAndSex($country)
    {
        $lang = ($country == 'BR') ? 'BR' : 'EN';

        if (rand(0, 1))
        {
            $name = Helper::getNameAndSex(true, $lang);

            $sex  = 'M';
        }
        else
        {
            $name = Helper::getNameAndSex(false, $lang);
            $sex  = 'F';
        }

        return [
            'firstName' => $name[0],
            'lastName'  => $name[1],
            'sex'       => $sex
        ];
    }

}
