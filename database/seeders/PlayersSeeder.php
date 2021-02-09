<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Team;
use App\Models\Player;
use App\Helpers\RandomNames;
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

        $teams     = Team::get();

        $timestamp = date('Y-m-d');

        $data[]    = [
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
            $temp = PlayersSeeder::generatePlayers($team, $data);
            $data = array_merge($data, $temp);
        }

        $temp2 = PlayersSeeder::generatePlayers(null, $data);
        $data  = array_merge($data, $temp2);

        Player::insert($data);
    }


    protected static function generatePlayers($team = null, $oriData)
    {
        $faker     = Factory::create('pt-br');

        $timestamp = date('Y-m-d');

        $countries = ['KR','CN','TW','US','DK','PL','DE','FR','CA','VN','RU','BR','SE','HK','ES','BE','NL','GB','TR','HR','CZ','BG','PH','UA','AU','SI','TH','JP','SA','SG','GR','RO','CL','FI','AR','MX','NO','MY','LT','HU','PT','AM','TN','EE','LB','IT','RS','JO','PE','AT'];

        $opsNicks  = ['amazon', 'dalek', 'asgard', 'jaffa', 'wraith'];

        $teamCntry = $faker->randomElement($countries);

        $y         = ($team != null) ? 6 : rand(50,100);

        $data      = [];

        foreach(range(1, $y) as $i)
        {
            if ($team != null)
            {
                $team_id  = $team->id;
                $country  = ($team->id == 2) ? 'BR' : $teamCntry;
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

            $nickname     = RandomNames::getNicknames($faker->randomElement($opsNicks));

            foreach ($oriData as $d)
            {
                if ( strcasecmp ($nickname, $d['nickname']) == 0 )
                {
                    $nickname = RandomNames::getNicknames($faker->randomElement($opsNicks));
                }
            }

            foreach ($data as $d)
            {
                if ( strcasecmp ($nickname, $d['nickname']) == 0 )
                {
                    // dump ( '1: ' . $nickname );
                    $nickname = RandomNames::getNicknames($faker->randomElement($opsNicks));
                    // dump ( '2: ' . $nickname );
                }
            }

            $data[]       = [
                'team_id'     => $team_id,
                'name'        => $name_sex['firstName'],
                'lastname'    => $name_sex['lastName'],
                'nickname'    => $nickname,
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
            'birthday' => date((date('Y') - $age) . '-' . $month . '-' . $day)
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
        if (rand(0, 1))
        {
            $name = RandomNames::getNameAndSex(true, $country);

            $sex  = 'M';
        }
        else
        {
            $name = RandomNames::getNameAndSex(false, $country);
            $sex  = 'F';
        }

        return [
            'firstName' => $name[0],
            'lastName'  => $name[1],
            'sex'       => $sex
        ];
    }
}
