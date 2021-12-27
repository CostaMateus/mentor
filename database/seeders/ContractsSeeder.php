<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Player;
use App\Models\Contract;
use Illuminate\Database\Seeder;

class ContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::truncate();

        $faker   = Factory::create("pt-br");

        $players = Player::whereNotNull("team_id")->get();

        $data    = [];

        foreach ($players as $p)
        {
            $duration = ($p->id == 1) ? 12 : $faker->randomElement([3, 6, 9, 12]);

            $start    = config("mentor.start_date");
            $end      = date("Y-m-d", strtotime("+$duration month", strtotime($start)));

            $data[]   = [
                "team_id"   => $p->team_id,
                "player_id" => $p->id,
                "start"     => $start,
                "end"       => $end,
                "duration"  => $duration, // em meses
            ];
        }

        Contract::insert($data);
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

        return (date("Y") . "-" . $month . "-" . $day);
    }
}
