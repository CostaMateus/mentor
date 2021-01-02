<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Player;
use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::truncate();

        $faker     = Factory::create('pt-br');

        $players   = Player::get();

        $timestamp = date('Y-m-d');

        $roles     = ['sup','top','jng','mid','adc'];

        $i         = 0;

        $data      = [];

        foreach($players as $p) {
            $force = $faker->numberBetween(25, 75);

            if ($force > 70){
                $salary = $faker->randomFloat(2, 7000, 8000);
            }
            else if ($force > 60) {
                $salary = $faker->randomFloat(2, 6000, 7250);
            }
            else if ($force > 50) {
                $salary = $faker->randomFloat(2, 5000, 6250);
            }
            else if ($force > 40) {
                $salary = $faker->randomFloat(2, 4000, 5250);
            }
            else if ($force > 30) {
                $salary = $faker->randomFloat(2, 3000, 4250);
            }
            else
            {
                $salary = $faker->randomFloat(2, 2000, 3250);
            }

            if ($p->mentor)
            {
                $force  = $faker->numberBetween(60, 75);
                $salary = $faker->randomFloat(2, 6500, 8500);
            }

            $pass = $salary * $faker->randomFloat(2, 1, 3);
            $role = $roles[$i];
            $sRol = array_diff($roles, [$role]);

            $data[] = [
                'player_id'      => $p->id,
                'role'           => $role,
                'secondary_role' => $faker->randomElement($sRol),
                'force'          => $force,
                'energy'         => 100,
                'salary'         => (int) $salary,
                'pass'           => (int) $pass,
                'contract'       => ($p->team_id == 0) ? null : AttributesSeeder::getContract($faker),
                'created_at'     => $timestamp,
                'updated_at'     => $timestamp
            ];

            $i++;
            if ($i == 5) $i = 0;
        }

        Attribute::insert($data);
    }

    /**
     * Gera tempo de contrato
     *
     * @param [type] $faker
     * @return void
     */
    protected static function getContract($faker)
    {
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

        return (date('Y') . '-' . $month . '-' . $day);
    }
}
