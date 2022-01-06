<?php

namespace App\Http\Controllers\Web\Admin;

use DateTime;
use App\Models\Team;
use App\Models\League;
use App\Models\Player;
use App\Helpers\Helper;
use App\Models\Country;
use App\Models\Division;
use App\Models\Attribute;
use App\Helpers\RandomNames;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Show the list of leagues.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        session([
            "name"     => null,
            "country"  => null,
            "sex"      => null,
            "age"      => null,
            "pass"     => null,
            "force"    => null,
            "role1"    => null,
            "role2"    => null,
            "contract" => null,
            "league"   => null,
        ]);

        $leagues   = League::all();
        $countries = Country::all();

        $teams     = Team::all();
        $players   = Player::all();
        $divisions = Division::all();

        $query     = Player::with("attribute", "contract", "team", "country")
                           ->orderByRaw("ISNULL(team_id), team_id ASC")
                           ->orderBy("name")
                           ->orderBy("lastname")
                           ->orderBy("nickname");

        // Filtro: name, lastname, nickname
        if ($request->has("name"))
        {
            $name = $request->input("name");
            session(["name" => $name]);

            $query->where( function ($q) use ($name) {
                return $q->where(  "name",     "LIKE", "%$name%")
                         ->orWhere("lastname", "LIKE", "%$name%")
                         ->orWhere("nickname", "LIKE", "%$name%");
            });
        }

        // Filtro: country
        if ($request->has("country"))
        {
            $country = $request->input("country");
            session(["country" => $country]);

            $query->where( function ($q) use ($country) {
                return $q->where("country_id", $country);
            });
        }

        // Filtro: sex
        if ($request->has("sex"))
        {
            $sex = $request->input("sex");
            session(["sex" => $sex]);

            $query->where( function ($q) use ($sex) {
                return $q->where("sex", $sex);
            });
        }

        // Filtro: birthday
        if ($request->has("age"))
        {
            $age = $request->input("age");
            session(["age" => $age]);

            $query->where( function ($q) use ($age) {
                // A data de comparação não pode ser a data de inicio da temporado do jogo.
                // Tem que ser a data corrente do sistema do jogo.
                // No momento ela não existe.
                $year = explode("-", config("mentor.start_date"))[0];
                $min  = $max = 0;

                switch ($age)
                {
                    case 1: // 16 a 20
                        $max = $year - 16;
                        $min = $year - 20;
                    break;
                    case 2: // 21 a 25
                        $max = $year - 21;
                        $min = $year - 25;
                    break;
                    case 3: // 26 a 30
                        $max = $year - 26;
                        $min = $year - 30;
                    break;
                    case 4: // 31+
                        $max = $year - 31;
                    break;
                }

                $q->whereYear("birthday", "<=", $max);

                if ($min > 0) $q->whereYear("birthday", ">=", $min);

                return $q;
            });
        }

        // Filtro: pass
        if ($request->has("pass"))
        {
            $pass = $request->input("pass");
            session(["pass" => $pass]);

            $query->whereHas("attribute", function ($q) use ($pass) {
                $min  = 0;
                $max  = 0;

                switch ($pass)
                {
                    case 1: // 1k a 4k
                        $min = 1000;
                        $max = 4000;
                    break;
                    case 2: // 5k a 8k
                        $min = 5000;
                        $max = 8000;
                    break;
                    case 3: // 9k a 12k
                        $min = 9000;
                        $max = 12000;
                    break;
                    case 4: // 13k a 16k
                        $min = 13000;
                        $max = 16000;
                    break;
                    case 5: // 17k a 20k
                        $min = 17000;
                        $max = 20000;
                    break;
                    case 6: // 21+
                        $min = 21000;
                    break;
                }

                $q->where("pass", ">=", $min);

                if ($max > 0) $q->where("pass", "<=", $max);

                return $q;
            });
        }

        // Filtro: force
        if ($request->has("force"))
        {
            $force = $request->input("force");
            session(["force" => $force]);

            $query->whereHas("attribute", function ($q) use ($force) {
                switch ($force)
                {
                    case 1: // 1 a 10
                        $min = 1;
                        $max = 10;
                    break;
                    case 2: // 11 a 30
                        $min = 11;
                        $max = 30;
                    break;
                    case 3: // 31 a 50
                        $min = 31;
                        $max = 50;
                    break;
                    case 4: // 51 a 70
                        $min = 51;
                        $max = 70;
                    break;
                    case 5: // 71 a 100
                        $min = 71;
                        $max = 100;
                    break;
                }

                return $q->where("force", ">=", $min)
                         ->where("force", "<=", $max);
            });
        }

        // Filtro: role
        if ($request->has("role1"))
        {
            $role1 = $request->input("role1");
            session(["role1" => $role1]);

            $query->whereHas("attribute", function ($q) use ($role1) {
                return $q->where("role", $role1);
            });
        }

        // Filtro: secondary_role
        if ($request->has("role2"))
        {
            $role2 = $request->input("role2");
            session(["role2" => $role2]);

            $query->whereHas("attribute", function ($q) use ($role2) {
                return $q->where("secondary_role", $role2);
            });
        }

        // Filtro: contract
        if ($request->has("contract"))
        {
            $contract = $request->input("contract");
            session(["contract" => $contract]);

            if ($contract == 4) // livres
            {
                $query->doesntHave("contract");
                $query->doesntHave("team");
            }
            else
            {
                $query->whereHas("contract", function ($q) use ($contract) {
                    // A data de comparação não pode ser a data de inicio da temporado do jogo.
                    // Tem que ser a data corrente do sistema do jogo.
                    // No momento ela não existe.
                    $today = new DateTime(config("mentor.start_date"));

                    switch ($contract)
                    {
                        case 1: // expirados
                            $q->whereDate("end", "<", $today);
                        break;
                        case 2: // a vencer
                            $q->whereDate("end", ">=", $today)
                              ->whereDate("end", "<=", $today->modify("+1 month"));
                        break;
                        case 3: // expirados e a vencer
                            $q->whereDate("end", "<=", $today->modify("+1 month"));
                        break;
                    }

                    return $q;
                });
            }
        }

        // Filtro: league
        if ($request->has("league"))
        {
            $league = $request->input("league");
            session(["league" => $league]);

            $query->whereHas("team", function ($q) use ($league) {
                return $q->where("league_id", $league);
            });
        }

        $data = $query->get();

        return view("adm.players", compact("data", "countries", "leagues", "teams", "players", "divisions"));
    }
}
