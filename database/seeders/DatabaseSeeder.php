<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CodesSeeder;
use Database\Seeders\TeamsSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\LeaguesSeeder;
use Database\Seeders\PlayersSeeder;
use Database\Seeders\TrophiesSeeder;
use Database\Seeders\AttributesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            UsersSeeder::class,
            // CodesSeeder::class,
            LeaguesSeeder::class,
            TeamsSeeder::class,
            PlayersSeeder::class,
            AttributesSeeder::class,
            // TrophiesSeeder::class,
        ]);
    }
}
