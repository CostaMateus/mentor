<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Team;
use App\Models\Player;
use App\Models\Country;
use App\Helpers\RandomNames;
use Exception;
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
        try
        {
            Player::truncate();

            $teams  = Team::get();

            $data   = [];
            // $data[] = [
            //     "team_id"    => 2,
            //     "name"       => "Mateus",
            //     "lastname"   => "Costa",
            //     "nickname"   => "lkemns",
            //     "country_id" => 30,
            //     "birthday"   => date("1995-04-06"),
            //     "sex"        => "M", // M or F
            //     "mentor"     => true,
            //     "user_id"    => 1,
            // ];

            foreach ($teams as $team)
            {
                $temp = $this->generatePlayers($team, $data);
                $data = array_merge($data, $temp);
            }

            $temp2 = $this->generatePlayers(null, $data);
            $data  = array_merge($data, $temp2);

            Player::insert($data);
        }
        catch(Exception $e)
        {
            $this->run();
        }
    }


    private function generatePlayers($team = null, $oriData)
    {
        $faker      = Factory::create("pt-br");

        $country_id = [10, 11, 13, 14, 21, 30, 33, 38, 43, 44, 54, 57, 58, 67, 72, 73, 80, 83, 96, 97, 105, 107, 108, 113, 118, 123, 129, 138, 150, 160, 168, 169, 171, 172, 176, 177, 187, 189, 192, 194, 199, 205, 208, 211, 217, 218, 223, 225, 226, 232];

        $opsNicks   = ["amazon", "dalek", "asgard", "jaffa", "wraith"];

        $teamCntry  = $faker->randomElement($country_id);

        $y          = ($team != null) ? 8 : rand(50,100);

        $data       = [];

        foreach(range(1, $y) as $i)
        {
            $team_id  = ($team == null) ? null : $team->id;
            $country  = ($team == null) ? $faker->numberBetween(1, 239) : (($team->id == 2) ? 30 : $teamCntry); // 30 == BRASIL

            $name_sex = $this->getNameAndSex($country);

            $nickname = RandomNames::getNicknames($faker->randomElement($opsNicks));

            foreach ($oriData as $d)
            {
                if ( strcasecmp ($nickname, $d["nickname"]) == 0 )
                {
                    $nickname = RandomNames::getNicknames($faker->randomElement($opsNicks));
                }
            }

            foreach ($data as $d)
            {
                if ( strcasecmp ($nickname, $d["nickname"]) == 0 )
                {
                    $nickname = RandomNames::getNicknames($faker->randomElement($opsNicks));
                }
            }

            $data[]   = [
                "team_id"    => $team_id,
                "name"       => $name_sex["firstName"],
                "lastname"   => $name_sex["lastName"],
                "nickname"   => $nickname,
                "country_id" => $country,
                "birthday"   => $this->getBirthday($faker),
                "sex"        => $name_sex["sex"],
                "mentor"     => ($team_id == 2) ? false : (($i == 1) ? : false),
                "user_id"    => 0,
            ];
        }

        return $data;
    }

    /**
     * Gera data de nascimento
     *
     * @param [type] $faker
     * @return string $birthday
     */
    private function getBirthday($faker)
    {
        $age   = $faker->numberBetween(16, 35);

        $month = $faker->numberBetween(1, 12);

        switch ($month)
        {
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

        $birthday = date((2021 - $age) . "-" . $month . "-" . $day);

        return $birthday;
    }

    /**
     * Gera nome e sexo
     *
     * @param [type] $faker
     * @return array $name_sex
     */
    private function getNameAndSex($country)
    {
        if (rand(0, 1))
        {
            $name = RandomNames::getNameAndSex(true, $country);
            $sex  = "M";
        }
        else
        {
            $name = RandomNames::getNameAndSex(false, $country);
            $sex  = "F";
        }

        return [
            "firstName" => $name[0],
            "lastName"  => $name[1],
            "sex"       => $sex
        ];
    }
}
