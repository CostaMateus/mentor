<?php

namespace App\Helpers;

use Faker\Factory;
use App\Models\Team;
use App\Models\Trust;
use App\Models\Player;
use App\Models\Finance;
use App\Models\Matchup;
use Illuminate\Support\Facades\Date;

class StartNewGame
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function seedFinancesForAllTeams()
    {
        Finance::truncate();

        $faker     = Factory::create();
        $timestamp = date("Y-m-d");

        $teams     = Team::all();
        $cats      = Finance::categories();

        $data = [];
        foreach ($teams as $t)
        {
            $players   = Player::where("team_id", $t->id)->with("attribute")->get();

            $sumSalary = 0;

            foreach ($players as $p)
            {
                $sumSalary += $p->attribute->salary;
            }

            foreach ($cats as $c)
            {
                $value = 0;
                $type  = 0;
                switch ($c) {
                    case "in_awards":
                        $value = 0;
                        $type  = 1;
                    break;

                    case "in_selling_players":
                        $value = 0;
                        $type  = 1;
                    break;

                    case "in_several":
                        $value = ($t->division_id == 1) ? $faker->numberBetween(3000,6000) : $faker->numberBetween(1000,2500);
                        $type  = 1;
                    break;

                    case "in_sponsorships":
                        $value = $sumSalary;
                        $type  = 1;
                    break;

                    case "in_supporter_partner":
                        $value = ($t->division_id == 1) ? $faker->numberBetween(1000,2500) : $faker->numberBetween(100,500) ;
                        $type  = 1;
                    break;

                    case "out_buying_players":
                        $value = 0;
                        $type  = 0;
                    break;

                    case "out_salary":
                        $value = $sumSalary;
                        $type  = 0;
                    break;

                    case "out_several":
                        $value = 0;
                        $type  = 0;
                    break;
                }

                if ($c != "balance")
                {
                    $data[] = [
                        "team_id"    => $t->id,
                        "category"   => $c,
                        "value"      => $value,
                        "type"       => $type,
                        "date"       => config("mentor.start_date"),
                        "created_at" => $timestamp,
                        "updated_at" => $timestamp,
                    ];
                }
            }

            $in  = 0;
            $out = 0;
            foreach ($data as $f)
            {
                if ($t->id == $f["team_id"])
                {
                    if ($f["type"])
                        $in += $f["value"];
                    else
                        $out += $f["value"];
                }
            }

            $data[] = [
                "team_id"    => $t->id,
                "category"   => "balance",
                "value"      => ($in - $out),
                "type"       => (($in - $out) > 0) ? 1 : 0,
                "date"       => config("mentor.start_date"),
                "created_at" => $timestamp,
                "updated_at" => $timestamp,
            ];
        }

        Finance::insert($data);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function seedMatchsForAllTeams()
    {
        Matchup::truncate();

        $teams = Team::select("id", "division_id")
                     ->whereNotNull("division_id")
                     ->orderBy("league_id")
                     ->orderBy("division_id")
                     ->orderBy("name")
                     ->get();

        $teams_division = [];

        foreach ($teams as $t)
        {
            $teams_division[$t->division_id][] = $t->id;
        }

        foreach ($teams_division as $division_id => $teams_id)
        {
            $data        = [];
            $dateCreate  = date("Y-m-d");
            $fixPair     = new Fixture($teams_id);
            $schedule    = $fixPair->getSchedule();
            $saturday    = date("Y-m-d", strtotime(config("mentor.start_date_text")));
            $dateMatchup = Date::createFromFormat("Y-m-d", $saturday);
            $round       = 1;

            // ida
            foreach ($schedule as $rounds)
            {
                // começa no sábado
                // adiciona um dia, jogo no domingo
                // adiciona mais 6 dias, jogo no proximo sabado
                if ($round > 1) ($round % 2 == 0) ? $dateMatchup->addDays(1) : $dateMatchup->addDays(6);

                foreach ($rounds as $matchup)
                {
                    $data[] = [
                        "split"          => 1,
                        "round"          => $round,
                        "date"           => $dateMatchup->format("Y-m-d"),
                        "division_id"    => $division_id,
                        "blue_team_id"   => $matchup[0],
                        "red_team_id"    => $matchup[1],
                        "winner_team_id" => null,
                        "created_at"     => $dateCreate,
                        "updated_at"     => $dateCreate,
                    ];
                }

                $round++;
            }

            // volta
            foreach ($schedule as $rounds)
            {
                // intervalo de 2 semanas
                if ($round == 11)
                    $dateMatchup->addDays(13);
                else
                    ($round % 2 == 0) ? $dateMatchup->addDays(1) : $dateMatchup->addDays(6);

                foreach ($rounds as $matchup)
                {
                    $data[] = [
                        "split"          => 1,
                        "round"          => $round,
                        "date"           => $dateMatchup->format("Y-m-d"),
                        "division_id"    => $division_id,
                        "blue_team_id"   => $matchup[0],
                        "red_team_id"    => $matchup[1],
                        "winner_team_id" => null,
                        "created_at"     => $dateCreate,
                        "updated_at"     => $dateCreate,
                    ];
                }

                $round++;
            }

            Matchup::insert($data);
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function seedTrustForAllMentors()
    {
        Trust::truncate();

        $mentors   = Player::where("mentor", 1)->get();
        $data      = [];
        $faker     = Factory::create();
        $timestamp = date("Y-m-d");

        foreach ($mentors as $m)
        {
            $data[] = [
                "player_id"  => $m->id,
                "board"      => $faker->numberBetween(75, 95),
                "fans"       => $faker->numberBetween(65, 85),
                "created_at" => $timestamp,
                "updated_at" => $timestamp,
            ];
        }

        Trust::insert($data);
    }

}
