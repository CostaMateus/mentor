<?php

namespace Database\Seeders;

use App\Models\Trophy;
use Illuminate\Database\Seeder;

class TrophiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trophy::truncate();

        $data = [
            [
                "name" => "World Championship",
            ],
            [
                "name" => "Mid-Season Invitational",
            ],
            [
                "name" => "Rift Rivals",
            ],
            [
                "name" => "Spring Split",
            ],
            [
                "name" => "Summer Split",
            ],
        ];

        Trophy::insert($data);
    }
}
