<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Trust;
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

        $faker     = Factory::create("pt-br");

        $players   = Player::get();

        $roles     = ["sup","top","jng","mid","adc"];

        $i         = 0;

        $data      = [];
        $trust     = [];

        foreach($players as $p)
        {
            $force = $faker->numberBetween(25, 75);

            if ($force > 70)
            {
                $salary = $faker->randomFloat(2, 7000, 8000);
            }
            else if ($force > 60)
            {
                $salary = $faker->randomFloat(2, 6000, 7250);
            }
            else if ($force > 50)
            {
                $salary = $faker->randomFloat(2, 5000, 6250);
            }
            else if ($force > 40)
            {
                $salary = $faker->randomFloat(2, 4000, 5250);
            }
            else if ($force > 30)
            {
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

                $trust[] = [
                    "player_id" => $p->id,
                    "board"     => 100,
                    "fans"      => 80
                ];
            }

            $pass   = $salary * $faker->randomFloat(2, 1, 3);
            $role   = $roles[$i];
            $second = array_diff($roles, [$role]);

            $data[] = [
                "player_id"      => $p->id,
                "role"           => $role,
                "secondary_role" => $faker->randomElement($second),
                "force"          => $force,
                "energy"         => 100,
                "salary"         => (int) $salary,
                "pass"           => (int) $pass,
            ];

            $i++;

            if ($i == 5) $i = 0;
        }

        Attribute::insert($data);
        Trust::insert($trust);
    }
}
