<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Weidner\Goutte\GoutteFacade as Goutte;

class TestControler extends Controller
{
    //
    public function test()
    {
        // $cnb = Team::find(15)->load("players");
        // $fla = Team::find(15)->load("players");

        // foreach ($cnb->players as &$player)
        // {
        //     $player->load("attribute");
        // }
        // foreach ($fla->players as &$player)
        // {
        //     $player->load("attribute");
        // }

        // dd($cnb->players, $fla->players);


        // $data = [];
        // foreach (range(1,10) as $i)
        // {
        //     $ar    = mt_rand(0, 9999);
        //     $a     = 100/(100+87);
        //     $a     = round($a, 4, PHP_ROUND_HALF_EVEN);
        //     $a    *= 10000;
        //     $Awon  = $a > $ar;
        //
        //     $br    = mt_rand(0, 9999);
        //     $b     = 87/(100+87);
        //     $b     = round($b, 4, PHP_ROUND_HALF_EVEN);
        //     $b    *= 10000;
        //     $Bwon  = $b > $br;
        //
        //     $data[] = [
        //         "100" => [
        //             $Awon, $a, $ar
        //         ],
        //         "87"  => [
        //             $Bwon, $b, $br
        //         ]
        //     ];
        // }
        //
        // dd($data[0]);


        $roles = ["top", "jng", "mid", "adc", "sup"];

        // ============
        $teams = [
            "teamA" => [
                "top" => [
                    "force"  => 100,
                    "role"   => false,
                    "energy" => 100,
                ],
                "jng" => [
                    "force"  => 90,
                    "role"   => false,
                    "energy" => 100,
                ],
                "mid" => [
                    "force"  => 80,
                    "role"   => true,
                    "energy" => 100,
                ],
                "adc" => [
                    "force"  => 80,
                    "role"   => true,
                    "energy" => 100,
                ],
                "sup" => [
                    "force"  => 100,
                    "role"   => true,
                    "energy" => 100,
                ],
            ],
            "teamB" => [
                "top" => [
                    "force"  => 85,
                    "role"   => true,
                    "energy" => 100,
                ],
                "jng" => [
                    "force"  => 65,
                    "role"   => false,
                    "energy" => 100,
                ],
                "mid" => [
                    "force"  => 75,
                    "role"   => true,
                    "energy" => 100,
                ],
                "adc" => [
                    "force"  => 100,
                    "role"   => true,
                    "energy" => 100,
                ],
                "sup" => [
                    "force"  => 80,
                    "role"   => false,
                    "energy" => 100,
                ],
            ]
        ];

        $ttlA = 0;
        $ttlB = 0;
        foreach ($teams["teamA"] as $p) $ttlA += $p["force"];
        foreach ($teams["teamB"] as $p) $ttlB += $p["force"];
        $ttlA = $ttlA / 5;
        $ttlB = $ttlB / 5;

        foreach ($teams["teamA"] as $key => &$p)
        {
            $p["score"] = $this->generateScore($p["force"], $p["role"], $ttlA, $p["energy"]);
        }
        foreach ($teams["teamB"] as $key => &$p)
        {
            $p["score"] = $this->generateScore($p["force"], $p["role"], $ttlB, $p["energy"]);
        }

        // ============
        $teamACount = 0;
        $teamBCount = 0;
        foreach ($roles as $r)
        {
            $rand = mt_rand(0, 9999);

            $a    = $teams["teamA"][$r]["score"];
            $b    = $teams["teamB"][$r]["score"];

            $num  = $a / ($a + $b);
            $num  = round($num, 4, PHP_ROUND_HALF_EVEN);
            $num *= 10000;

            $wA   = $num > $rand;
            $wB   = !$wA;

            if ($wA) $teamACount++;
            if ($wB) $teamBCount++;
        }

        dd($teamACount, $teamBCount);
    }

    private function generateScore($force, $primary_role, $avg_team, $energy)
    {
        $_F    = 0.40;
        $_R    = 0.25;
        $_T    = 0.20;
        $_E    = 0.15;

        $role  = $primary_role ? 100 : 60;

        $score = ($_F * $force) + ($_R * $role) + ($_T * $avg_team) + ($_E * $energy);

        return $score;
    }

    public function media()
    {
        // $leagues = [
        //     // "North_American_Teams",
        //     // "European_Teams",
        //     // "Korean_Teams",
        //     // "Chinese_Teams",
        //     // "Brazilian_Teams",
        //     // "CIS_Teams",
        //     // "Japanese_Teams",
        //     // "Latin_American_Teams",
        //     // "Oceanic_Teams",
        //     // "PCS_Teams",
        //     // "Turkish_Teams",
        //     // "Vietnamese_Teams",
        //     [ "Brazil",        "CBLOL" ],
        //     [ "China",         "LPL"   ],
        //     [ "CIS",           "LCL"   ],
        //     [ "Europe",        "LEC"   ],
        //     [ "Japan",         "LJL"   ],
        //     [ "Korea",         "LCK"   ],
        //     [ "Latin_America", "LLA"   ],
        //     [ "North_America", "LCS"   ],
        //     [ "Oceania",       "OPL"   ],
        //     [ "Pacific",       "PCS"   ],
        //     [ "Turkey",        "TCL"   ],
        //     [ "Vietnam",       "VCS"   ],
        // ];
        // // $commomTeams   = "#mw-content-text > div.mw-parser-output > div.mw-parser-output > table > tbody > tr:nth-child(3) > td >";
        // // $activeTeams   = "$commomTeams table > tbody > tr > td:nth-child(1) > span > span.teamname > a";
        // // $inactiveTeams = "$commomTeams p > a";
        // // $tagImg  = "#infoboxTeam > tbody > tr:nth-child(3) > td > div > div > a";
        // // $roleTop = "#mw-content-text > div.mw-parser-output > div.mw-parser-output > table > tbody > tr > td > table > tbody > tr > td:nth-child(3) > span";
        // // $p = "#mw-content-text > div.mw-parser-output > div.mw-parser-output > table.wikitable.sortable.team-members.hoverable-rows.team-members-current.jquery-tablesorter > tbody > tr";
        // $activeTeam    = "#mw-content-text > div > div:nth-child(7) > div > div.template-box > table > tbody > tr:nth-child(1) > th > span.team-template-team-standard > span.team-template-text > a";
        // $inactiveTeam  = "#mw-content-text > div > div.columns > ul > li > span > span.team-template-text > a";
        // $imageTeam     = "#mw-content-text > div > div.fo-nttax-infobox-wrapper.infobox-dota2 > div > div > div > div > div > a > img";
        // $arr = [];
        // $client = new Client();
        // foreach ($leagues as $l)
        // {
        //     $arr[$l[1]] = [];
        //     $crawler = $client->request("GET", "$url/leagueoflegends/Portal:Teams/" . $l[0], ["timeout" => 6000]);
        //     $crawler->filter($activeTeam)->each(function ($node) use (&$arr, $l)
        //     {
        //         $search = array_search($node->text(), array_column($arr, "name"));
        //         if (!str_contains($node->text(), "Academy")    &&
        //             !str_contains($node->text(), "Drake")      &&
        //             !str_contains($node->text(), "University") &&
        //             $search === false)
        //         {
        //             $arr[$l[1]][] = [
        //                 "name"  => $node->text(),
        //                 "image" => $node->attr("href")
        //             ];
        //         }
        //     });
        //     $crawler->filter($inactiveTeam)->each(function ($node) use (&$arr, $l)
        //     {
        //         $search = array_search($node->text(), array_column($arr, "name"));
        //         if (!str_contains($node->text(), "Academy")    &&
        //             !str_contains($node->text(), "Drake")      &&
        //             !str_contains($node->text(), "University") &&
        //             $search === false)
        //         {
        //             $arr[$l[1]][] = [
        //                 "name"  => $node->text(),
        //                 "image" => $node->attr("href")
        //             ];
        //         }
        //     });
        //     foreach ($arr[$l[1]] as &$team)
        //     {
        //         // $team["players"] = [];
        //         $crawler = $client->request("GET", $url . $team["image"]);
        //         $team["image"] = $url . $crawler->filter($imageTeam)->attr("src");
        //         // if ($i = $crawler->filter($initialsTeam1))
        //         // {
        //         //     $team["initials"] = $i->attr("data-highlightingclass");
        //         // }
        //         // $crawler->filter($p)->each(function ($node)
        //         // {
        //         //     dump($node->text());
        //         // });
        //     }
        //     // $contents = file_get_contents($team["image"]);
        //     // Storage::put($team["name"] . ".png", $contents);
        //     dd($arr);
        // }
        // // dd($arr);
    }
}
