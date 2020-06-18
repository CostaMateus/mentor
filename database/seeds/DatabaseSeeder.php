<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(CodesTableSeeder::class);
        
        // $this->call(PlayersSeeder::class);
        // $this->call(AttributesSeeder::class);

        $this->call(LeaguesSeeder::class);
        // $this->call(DivisionsSeeder::class);
        // $this->call(TeamsSeeder::class);

        // $this->call(TrophysSeeder::class);
    }
}
