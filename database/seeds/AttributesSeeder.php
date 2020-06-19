<?php

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
        $faker = Factory::create('pt-br');

        Attribute::truncate();
        
        $players = Player::get();

        $timestamp = date('Y-m-d');

        foreach($players as $p) {
            $salary = $faker->randomFloat(2, 1000, 10000);
            $pass   = $salary * 2;

            $data[] = [
                'player_id'  => $p->id,
                'role'       => $faker->randomElement(['TOP','JNG','MID','ADC','SUP']),
                'force'      => $faker->numberBetween(30, 70),
                'energy'     => 100,
                'salary'     => $salary,
                'pass'       => $pass,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
        }

        Attribute::insert($data);
    }
}
