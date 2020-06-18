<?php

use Faker\Factory;
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
        
        $faker = Factory::create('pt-br');

        $timestamp = date('Y-m-d');

        $data[] = [
            'player_id'  => 1,
            'role'       => 'Sup',
            'force'      => $faker->numberBetween(1, 100),
            'energy'     => 100,
            'salary'     => $faker->randomFloat(2, 1000, 10000),
            'pass'       => $faker->randomFloat(2, 2000, 20000),
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ];

		foreach(range(2,11) as $a) {
            $salary = $faker->randomFloat(2, 1000, 10000);
            $pass   = $salary * 2;

            $data[] = [
                'player_id'  => $a,
                'role'       => $faker->randomElement(['Top','Jng','Mid','Adc','Sup']),
                'force'      => $faker->numberBetween(1, 100),
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
