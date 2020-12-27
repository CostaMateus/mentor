<?php

namespace App\Helpers;

use Faker\Factory;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function getNameCountry($code)
    {
        $countries = DB::table('countries')->get();

        foreach ($countries as $c) {
            if ($c->code == $code) return $c->name;
        }
    }

    public static function formatteRole($role)
    {
        switch ($role) {
            case 'Top':
                return 'TOP';
                break;
            case 'Jng':
                return 'JNG';
                break;
            case 'Mid':
                return 'MID';
                break;
            case 'Adc':
                return 'ADC';
                break;
            case 'Sup':
                return 'SUP';
                break;
        }
    }
    public static function formatteRoleFull($role)
    {
        switch ($role) {
            case 'Top':
                return 'Topo';
                break;
            case 'Jng':
                return 'Selva';
                break;
            case 'Mid':
                return 'Meio';
                break;
            case 'Adc':
                return 'Atirador';
                break;
            case 'Sup':
                return 'Suporte';
                break;
        }
    }

    public static function getNicknames($type, $sex = null)
    {
        switch ($type) {
            case 'amazon':
                $name = self::nameAmazon();
                break;

            case 'dalek':
                $name = self::nameDrWhoDalek();
                break;

            case 'asgard':
                $name = self::nameStargateAsgard();
                break;

            case 'jaffa':
                $name = self::nameStargateJaffa();
                break;

            case 'wraith':
                $name = self::nameStargateWraith();
                break;

            default:
                # code...
                break;
        }

        return str_replace('\'', '', $name);
    }

    /**
     * Generate fantasy amazon name
     *
     * @return string $name
     */
    protected static function nameAmazon()
    {
        $nm1 = ["b", "bl", "br", "c", "chr", "cl", "cr", "d", "dr", "f", "g", "gl", "gr", "h", "j", "k", "kl", "kr", "m", "n", "p", "ph", "ps", "pr", "r", "rh", "s", "sm", "sc", "t", "th", "v", "x", "", "", "", "", "", "", ""];
        $nm2 = ["a", "e", "i", "o", "u", "y", "ou", "ei", "oe", "ao", "io", "eo", "a", "e", "i", "o", "u"];
        $nm3 = ["c", "d", "k", "l", "m", "r", "s", "t", "x", "", "", "", "", "", "", "", "", "", "", ""];
        $nm4 = ["c", "d", "k", "l", "m", "r", "s", "t", "x", "nd", "nt", "lk", "lc", "ll", "ndr", "br", "st", "ch", "br", "cl", "ph", "rm", "pp", "pt", "rp", "nth", "th", "rg", "thr", "dm", "lth", "lc", "chr", "phn", "dr", "mn", "rr", "rrh"];
        $nm5 = ["a", "e", "i", "o", "u", "y", "", "", "", "", "", "", "", "", ""];
        $nm6 = ["adia", "ameia", "anta", "asca", "cabe", "ce", "cleia", "cyone", "cyra", "da", "dae", "dia", "dice", "dora", "enice", "esia", "estra", "estris", "gea", "gone", "haedra", "hyia", "ippe", "isbe", "ises", "leia", "lene", "lete", "liope", "lipe", "lyte", "mache", "meia", "nache", "nara", "neira", "nestra", "nia", "nippe", "noe", "nousa", "ope", "padia", "pedo", "peia", "pesia", "phale", "pyle", "pyte", "rera", "reto", "roe", "scyra", "ses", "sippe", "sose", "tane", "thippe", "thoe", "thya", "thye", "thyia", "ybe", "yche", "yle", "yme", "yne", "yope", "yrbe", "ytie"];

        if (rand(0, 1))
        {
            $rnd  = rand(0, count($nm1) - 1);
            $rnd2 = rand(0, count($nm2) - 1);
            $rnd3 = rand(0, count($nm3) - 1);
            $rnd4 = rand(0, count($nm5) - 1);
            $rnd5 = rand(0, count($nm6) - 1);
            $name = $nm1[$rnd] . $nm2[$rnd2] . $nm3[$rnd3] . $nm5[$rnd4] . $nm6[$rnd5];
        }
        else
        {
            $rnd  = rand(0, count($nm1) - 1);
            $rnd2 = rand(0, count($nm2) - 1);
            $rnd3 = rand(0, count($nm4) - 1);
            $rnd4 = rand(0, count($nm2) - 1);
            $rnd5 = rand(0, count($nm6) - 1);
            $name = $nm1[$rnd] . $nm2[$rnd2] . $nm4[$rnd3] . $nm2[$rnd4] . $nm6[$rnd5];
        }

        return ucfirst($name);
    }

    /**
     * Generate fantasy Dalek name
     *
     * @return string $name
     */
    protected static function nameDrWhoDalek()
    {
        $nm1 = ["C", "Ch", "D", "Dh", "G", "Gh", "K", "Kh", "R", "S", "Th", "V"];
        $nm2 = ["a", "aa", "e", "a", "e", "a", "e", "i", "o"];
        $nm3 = ["c", "d", "k", "m", "n", "r", "s", "ss", "st", "t", "th", "y"];

        $name = "";

        $rnd  = rand(0, count($nm1) - 1);
        $rnd2 = rand(0, count($nm2) - 1);
        $rnd3 = rand(0, count($nm3) - 1);
        $name = $nm1[$rnd] . $nm2[$rnd2] . $nm3[$rnd3];

        return ucfirst($name);
    }

    /**
     * Generate fantasy Dalek name
     *
     * @return string $name
     */
    protected static function nameStargateAsgard()
    {
        $nm1 = ["Abi", "Adils", "Agmundr", "Agnar", "Aki", "Aleifr", "Alf", "Alfarin", "Alfgeir", "Ali", "Alrik", "Alvi", "Amundi", "An", "Anakol", "Andvett", "Anlaf", "Anund", "Arfast", "Ari", "Armod", "Arn", "Arnfinn", "Arngeir", "Arngrim", "Arni", "Arnkel", "Arnlaug", "Arnljot", "Arnor", "Arnthor", "Arnulfr", "Arnvid", "Aron", "Asbjorn", "Asbrand", "Asfrith", "Asgaut", "Asgeir", "Asgrim", "Askel", "Aslak", "Asmund", "Assur", "Asulf", "Asvald", "Asvard", "Athils", "Atli", "Atsurr", "Audolf", "Audun", "Authulf", "Authun", "Auti", "Balki", "Balli", "Banki", "Bard", "Bardi", "Baug", "Beiner", "Beinir", "Berg", "Bergvid", "Bersi", "Bior", "Biorn", "Birning", "Bjalfi", "Bjalki", "Bjarki", "Bjarni", "Bjor", "Bjorn", "Blann", "Bodalf", "Bodvar", "Boe", "Bolli", "Bolverk", "Borgar", "Bork", "Borstig", "Bothvar", "Botulf", "Bram", "Brand", "Broddi", "Brodir", "Bruni", "Brusi", "Bui", "Cnut", "Dag", "Dagfinn", "Dan", "Diarf", "Dyri", "Edgar", "Egil", "Eid", "Eilif", "Einar", "Eirik", "Eldgrim", "Engli", "Erlend", "Erling", "Ernmund", "Erp", "Eskil", "Eydis", "Eyjolf", "Eystein", "Eyvald", "Eyvind", "Fargrim", "Farmann", "Fastulf", "Finn", "Finnvid", "Floki", "Flosi", "Folkmar", "Forni", "Frodi", "Frothi", "Galti", "Gamal", "Gamli", "Gardar", "Gardi", "Gauk", "Gaut", "Gauti", "Gavtvid", "Geir", "Geirolf", "Geitir", "Gellir", "Geri", "Gest", "Gilli", "Gils", "Gisli", "Gizor", "Gizur", "Glam", "Glum", "Gnupa", "Gnupi", "Gorm", "Grani", "Gretter", "Grettir", "Grim", "Grimar", "Grimkel", "Grimolf", "Grind", "Gris", "Grith", "Guda", "Gudlaug", "Gudleif", "Gudmund", "Gudrik", "Gudrod", "Gufi", "Gulli", "Gunnald", "Gunnar", "Gunni", "Gunnkel", "Gunnulf", "Gunnvid", "Guthorm", "Guthrum", "Gylfi", "Gyrd", "Hadd", "Haf", "Hafgrim", "Haflidi", "Hafr", "Hagi", "Haki", "Haklang", "Hakon", "Halfdan", "Halftan", "Hall", "Hallad", "Halldor", "Halli", "Hallkel", "Halvdan", "Ham", "Hamund", "Hanef", "Harald", "Harek", "Hastein", "Hauk", "Havard", "Hedin", "Hegg", "Helgi", "Heming", "Heriolf", "Herjolf", "Herlaug", "Herlu", "Hermund", "Hialti", "Hildir", "Hjalkar", "Hjalti", "Hjor", "Hjort", "Hlenni", "Hlodvir", "Hogni", "Hord", "Hoskuld", "Hosvir", "Hott", "Hrafn", "Hrani", "Hrapp", "Hreida", "Hreidar", "Hrein", "Hrifla", "Hring", "Hroald", "Hroar", "Hrodi", "Hrok", "Hrolf", "Hromund", "Hrut", "Hunbogi", "Hundi", "Iarl", "Iarund", "Illugi", "Ingemar", "Ingi", "Ingimar", "Ingjald", "Ingolf", "Ingvar", "Iorthr", "Iorund", "Iri", "Iric", "Isgaut", "Isi", "Isleif", "Isulf", "Iuli", "Ivar", "Jobjorn", "Johan", "Jokul", "Jomar", "Jon", "Jorund", "Kabbi", "Kadal", "Kalf", "Kar", "Kari", "Karl", "Karli", "Karsi", "Ketil", "Ketill", "Kisping", "Kjallak", "Kjartan", "Kjotvi", "Klakkr", "Knut", "Kodran", "Koigrim", "Kol", "Kolbein", "Kolfinn", "Koll", "Konal", "Kori", "Kormak", "Kotkel", "Kotkell", "Kraki", "Lambi", "Leidolf", "Leif", "Leiknir", "Lifolf", "Lini", "Liut", "Ljot", "Lodin", "Lodmund", "Lopt", "Ludin", "Lyting", "Magnus", "Mak", "Manni", "Mar", "Meldun", "Modolf", "Moldof", "Mord", "Mursi", "Naddod", "Nafni", "Nasi", "Nikolas", "Njal", "Northri", "Odd", "Oddleif", "Odinkar", "Ofeig", "Ofieg", "Ogmund", "Olaf", "Oleif", "Olvir", "Ondott", "Onem", "Ongul", "Onund", "Orest", "Orlyg", "Orm", "Orn", "Ornolf", "Ornulf", "Orri", "Orrin", "Ospak", "Osvald", "Osvif", "Oswald", "Otkel", "Otrygg", "Ottar", "Ozur", "Paul", "Ragi", "Ragnar", "Ref", "Regin", "Reinn", "Rodmar", "Runolf", "Saksi", "Sam", "Saxi", "Serk", "Sibbi", "Sigegar", "Sigelac", "Sigeric", "Sigfast", "Sigfus", "Sighadd", "Sighvat", "Sigmund", "Sigurd", "Sigvat", "Sigvid", "Skamkel", "Skap", "Skapti", "Skard", "Skardi", "Skarf", "Skegg", "Skeggi", "Skialg", "Skidi", "Skjold", "Skopti", "Skorri", "Skuf", "Skuld", "Skuli", "Skurfa", "Skuti", "Slode", "Slodi", "Slothi", "Snorri", "Sod", "Sokkolf", "Solmund", "Solvi", "Sorli", "Spiut", "Spjut", "Starkad", "Starolf", "Starri", "Stein", "Steinar", "Storolf", "Stuf", "Sturla", "Styr", "Styrkar", "Styrmir", "Suit", "Surt", "Svafar", "Svalfi", "Svan", "Svart", "Svein", "Sven", "Sveni", "Svinulf", "Svipday", "Swein", "Teit", "Thialfi", "Thidrik", "Thorald", "Thord", "Thorir", "Thorkel", "Thorlak", "Thormar", "Thormod", "Thorod", "Thorodd", "Thorolf", "Thororm", "Thorred", "Thorvid", "Thrain", "Thrand", "Throst", "Tjorvi", "Tofi", "Toki", "Tola", "Tore", "Torfi", "Torrad", "Torsten", "Tosti", "Trandil", "Trud", "Trygg", "Tryggvi", "Tufi", "Tumi", "Tyrfing", "Tyrkir", "Ubbein", "Ufi", "Ulf", "Ulfar", "Ulfgrim", "Ulfljot", "Ulfrik", "Ulvkil", "Uni", "Unn", "Unnulf", "Valgard", "Vali", "Vandil", "Vandrad", "Var", "Varin", "Vebjorn", "Vebrand", "Vegeir", "Vekel", "Veleif", "Vermund", "Vestar", "Vestein", "Vidkunn", "Vifil", "Vigfus", "Vigi", "Vigot", "Vikar", "Vog", "Vott", "Wary", "Wengo", "Yngvar", "Ysoppa"];
        $nm2 = ["Abi", "Aldis", "Alfdis", "Alfeid", "Alof", "Armod", "Arngunn", "Arnora", "Asa", "Asdis", "Asfrid", "Asgard", "Asgerd", "Ashild", "Aslaug", "Asleif", "Asny", "Asta", "Astrid", "Asvor", "Aud", "Audhild", "Bera", "Bjorg", "Bolla", "Bothild", "Dalla", "Dotta", "Drifa", "Estrid", "Fastvi", "Freydis", "Frida", "Geirny", "Gerd", "Gerrid", "Gillaug", "Gorm", "Grelod", "Grima", "Gro", "Groa", "Gudfrid", "Gudlang", "Gudney", "Gudny", "Gudrid", "Gudrun", "Gunnvor", "Gyda", "Gyrd", "Gyrid", "Halla", "Halldis", "Heith", "Helga", "Herdis", "Herkja", "Hervor", "Hild", "Hilde", "Hlif", "Hrefna", "Hrodny", "Hungerd", "Inga", "Ingirid", "Ingirun", "Ingrid", "Ingun", "Ingunn", "Isgerd", "Jaddvor", "Jodis", "Jofrid", "Joreid", "Jorunn", "Kadlin", "Katla", "Ketiloy", "Ljot", "Ljufa", "Ljufu", "Luta", "Maria", "Matilda", "Oddny", "Odindis", "Ogn", "Olof", "Ormhild", "Osk", "Rafarta", "Raghild", "Ragna", "Ragneid", "Ranveig", "Runa", "Sibbe", "Signy", "Sigrid", "Sigrunn", "Sigvor", "Siv", "Skuld", "Skur", "Solveig", "Solvor", "Svala", "Thkatla", "Thora", "Thordis", "Thorelf", "Thorunn", "Thorve", "Thorvor", "Thurid", "Thyre", "Thyri", "Tofa", "Tola", "Tonna", "Torhild", "Torunn", "Turid", "Ulfeid", "Ulfheid", "Una", "Unn", "Valborg", "Valgerd", "Vandrad", "Vigdis", "Yngvild", "Yri", "Yrsa"];

        $name = "";

        if (rand(0, 1)) {
            $rnd  = rand(0, count($nm2) - 1);
            $name = $nm2[$rnd];
        } else {
            $rnd  = rand(0, count($nm1) - 1);
            $name = $nm1[$rnd];
        }

        return ucfirst($name);
    }

    /**
     * Generate fantasy Stargate Jaffa name
     *
     * @return string $name
     */
    protected static function nameStargateJaffa()
    {
        $nm1 = ["", "", "", "", "", "b", "c", "ch", "d", "gg", "h", "j", "k", "l", "m", "n", "p", "r", "s", "sh", "t", "tr", "v", "y"];
        $nm2 = ["a", "e", "i", "o", "u", "y", "a", "e", "i", "o", "u", "y", "a", "e", "i", "o", "u", "y", "a", "e", "i", "o", "u", "y", "a", "e", "i", "o", "u", "y", "a", "e", "i", "o", "u", "y", "a", "e", "i", "o", "u", "y", "a", "e", "i", "o", "u", "a", "e", "i", "o", "u", "ea", "oa", "ia", "aa"];
        $nm3 = ["'c", "'k", "'r", "'t", "'v", "b", "br", "b'r", "d", "hr", "h'l", "k", "k'", "k'n", "l", "ln", "l'", "l'c", "l'n", "l'r", "l'v", "m", "n", "nd", "n'", "n't", "r", "r'", "r't", "r'n", "rk", "rt", "s", "sh", "ss'", "t", "t'", "v"];
        $nm4 = ["h", "g", "l", "n", "r", "s", "sh", "t", "v"];
        $nm5 = ["", "", "c", "d", "g", "k", "l", "n", "r"];

        $nm6 = ["", "", "", "", "", "b", "g", "h", "k", "l", "m", "n", "pr", "r", "s", "y"];
        $nm7 = ["a", "e", "i", "o"];
        $nm8 = ["'d", "'l", "'n", "'t", "c", "ct", "d", "h", "k", "k'h", "l", "l'r", "l'", "m", "m'l", "m'r", "m'h", "mn", "m'n", "mt", "n'", "nr", "r'", "rr", "s'"];
        $nm9 = ["a", "e", "i", "y", "a", "e", "i", "y", "a", "e", "i", "y", "a", "e", "i", "y", "a", "e", "i", "y", "a", "e", "i", "a", "e", "i", "a", "e", "i", "a", "e", "i", "a", "e", "i", "au", "ou", "ai", "ia"];
        $nm10 = ["d", "h", "l", "n", "r", "s", "sh", "t", "th", "v"];
        $nm11 = ["", "", "", "", "", "", "", "c", "d", "h", "l", "n"];

        $name = "";

        if (rand(0, 1))
        {
            $nTp  = rand(0, 6);
            $rnd  = rand(0, count($nm1) - 1);
            $rnd2 = rand(0, count($nm2) - 1);
            $rnd3 = rand(0, count($nm3) - 1);
            $rnd4 = rand(0, count($nm2) - 1);
            $rnd5 = rand(0, count($nm5) - 1);

            if ($nTp < 4)
            {
                while ($nm3[$rnd3] === $nm1[$rnd] || $nm3[$rnd3] === $nm5[$rnd5])
                {
                    $rnd3 = rand(0, count($nm3) - 1);
                }
                $name = $nm1[$rnd] . $nm2[$rnd2] . $nm3[$rnd3] . $nm2[$rnd4] . $nm5[$rnd5];
            }
            else
            {
                $rnd6 = rand(0, count($nm2) - 1);
                $rnd7 = rand(0, count($nm4) - 1);
                while ($nm3[$rnd3] === $nm1[$rnd] || $nm3[$rnd3] === $nm4[$rnd7])
                {
                    $rnd3 = rand(0, count($nm3) - 1);
                }
                if ($nTp === 4)
                {
                    $name = $nm1[$rnd] . $nm2[$rnd2] . $nm3[$rnd3] . $nm2[$rnd4] . $nm4[$rnd7] . $nm2[$rnd6] . $nm5[$rnd5];
                }
                else
                {
                    $name = $nm1[$rnd] . $nm2[$rnd2] . $nm4[$rnd7] . $nm2[$rnd6] . $nm3[$rnd3] . $nm2[$rnd4] . $nm5[$rnd5];
                }
            }
        }
        else
        {
            $nTp  = rand() * 4;
            $rnd  = rand(0, count($nm6) - 1);
            $rnd2 = rand(0, count($nm7) - 1);
            $rnd3 = rand(0, count($nm8) - 1);
            $rnd4 = rand(0, count($nm9) - 1);
            $rnd5 = rand(0, count($nm11) - 1);
            if ($nTp < 2)
            {
                while ($nm8[$rnd3] === $nm6[$rnd] || $nm8[$rnd3] === $nm11[$rnd5])
                {
                    $rnd3 = rand(0, count($nm8) - 1);
                }
                $name = $nm6[$rnd] . $nm7[$rnd2] . $nm8[$rnd3] . $nm9[$rnd4] . $nm11[$rnd5];
            }
            else
            {
                $rnd6 = rand(0, count($nm7) - 1);
                $rnd7 = rand(0, count($nm10) - 1);
                while ($nm8[$rnd3] === $nm6[$rnd] || $nm8[$rnd3] === $nm10[$rnd7])
                {
                    $rnd3 = rand(0, count($nm8) - 1);
                }
                if ($nTp === 2)
                {
                    $name = $nm6[$rnd] . $nm7[$rnd2] . $nm8[$rnd3] . $nm9[$rnd4] . $nm10[$rnd7] . $nm7[$rnd6] . $nm11[$rnd5];
                }
                else
                {
                    $name = $nm6[$rnd] . $nm7[$rnd2] . $nm10[$rnd7] . $nm7[$rnd6] . $nm8[$rnd3] . $nm9[$rnd4] . $nm11[$rnd5];
                }
            }
        }

        return ucfirst($name);
    }

    /**
     * Generate fantasy Stargate Wraith name
     *
     * @return string $name
     */
    protected static function nameStargateWraith()
    {
        $nm1 = ["action", "air", "ambition", "answer", "aspect", "author", "balance", "beam", "bit", "bite", "bone", "bonus", "brain", "brave", "breath", "burst", "call", "calm", "care", "catch", "chain", "champion", "change", "chaos", "charge", "choice", "claim", "cloud", "clover", "clue", "code", "coil", "cold", "copper", "count", "courage", "cross", "cycle", "dark", "data", "death", "design", "desire", "despair", "dime", "dirt", "divide", "doll", "dot", "draw", "dream", "drink", "dust", "edge", "end", "error", "escape", "event", "fall", "fight", "fire", "flame", "flavor", "flight", "flock", "flow", "fluke", "fog", "fold", "force", "front", "game", "ghost", "gift", "glass", "goal", "gold", "grace", "grand", "guard", "guest", "guide", "hand", "harm", "health", "heart", "hide", "hold", "honor", "horn", "ice", "image", "impulse", "ink", "iron", "jewel", "judge", "justice", "kind", "knowledge", "law", "leader", "lesson", "life", "light", "limit", "link", "loan", "loss", "luck", "march", "mask", "master", "matter", "memory", "mercy", "metal", "might", "mind", "mist", "moment", "moon", "mud", "need", "night", "part", "passage", "patch", "path", "peak", "phase", "pride", "quiet", "quill", "ray", "record", "rest", "riddle", "risk", "role", "root", "rush", "scale", "scheme", "science", "sea", "seat", "secret", "sense", "shade", "shadow", "shape", "shift", "shine", "shore", "sign", "silk", "sky", "sleet", "slide", "smile", "smoke", "snow", "soil", "song", "sorrow", "sound", "space", "spark", "spell", "star", "steam", "stitch", "storm", "stream", "strike", "sun", "talent", "temper", "thunder", "time", "trick", "trust", "truth", "veil", "wish", "writer"];
        $nm2 = ["all", "blank", "bleak", "blind", "bold", "brash", "bright", "broad", "calm", "clear", "cold", "cruel", "deep", "dark", "dim", "dual", "even", "faint", "fair", "false", "far", "fast", "fine", "free", "full", "gentle", "giant", "glass", "glum", "gold", "grand", "grim", "half", "high", "hollow", "ill", "keen", "key", "kind", "last", "light", "lone", "long", "lost", "loud", "low", "mad", "mild", "minor", "new", "next", "numb", "odd", "old", "past", "plain", "proud", "pure", "quick", "quiet", "rapid", "rare", "right", "sharp", "silent", "slim", "slow", "small", "soft", "stark", "stout", "swift", "thin", "torn", "true", "twin", "vast", "warp", "whole", "wide", "wild", "wise"];
        $nm3 = ["action", "air", "ambition", "answer", "aspect", "author", "balance", "beam", "bit", "bite", "bone", "bonus", "brain", "brave", "breath", "burst", "call", "catch", "chain", "champion", "change", "chaos", "charge", "choice", "cloud", "clover", "clue", "copper", "count", "courage", "cross", "cycle", "data", "death", "dime", "dirt", "doll", "dot", "draw", "dream", "drink", "dust", "edge", "end", "fall", "fight", "fire", "flame", "flight", "flock", "flow", "fluke", "fog", "fold", "force", "front", "game", "ghost", "gift", "goal", "gold", "grace", "guard", "guest", "guide", "hand", "harm", "health", "heart", "hide", "hold", "honor", "horn", "ice", "ink", "iron", "jewel", "judge", "kind", "law", "life", "light", "link", "loss", "luck", "march", "mask", "master", "matter", "memory", "mercy", "metal", "might", "mind", "mist", "moon", "mud", "need", "night", "part", "patch", "path", "peak", "phase", "pride", "quiet", "quill", "ray", "rest", "risk", "role", "root", "rush", "scale", "sea", "seat", "secret", "sense", "shade", "shadow", "shape", "shift", "shine", "sign", "silk", "sky", "sleet", "slide", "smile", "smoke", "snow", "song", "sorrow", "sound", "space", "spark", "spell", "star", "steam", "stitch", "storm", "stream", "strike", "sun", "talent", "temper", "thunder", "time", "trick", "trust", "truth", "veil", "wish"];

        $name = "";

        if (rand(0, 1)) {
            $rnd  = rand(0, count($nm1) - 1);
            $name = $nm1[$rnd];
        } else {
            $rnd  = rand(0, count($nm2) - 1);
            $rnd2 = rand(0, count($nm3) - 1);
            while ($nm3[$rnd2] === $nm2[$rnd])
            {
                $rnd2 = rand(0, count($nm3) - 1);
            }
            $name = $nm2[$rnd] . $nm3[$rnd2];
        }

        return ucfirst($name);
    }

    /**
     * Undocumented function
     *
     * @param boolean $sex
     * @return void
     */
    public static function getNameAndSex($sex, $lang)
    {
        $namesMale   = '';
        $namesFemale = '';
        $lastNames   = '';

        switch ($lang) {
            case 'BR':
                $namesMale   = ["Álvaro", "Ângelo", "Érico", "Óscar", "Abílio", "Abel", "Abraão", "Adão", "Adalberto", "Adelmar", "Ademar", "Ademir", "Adriano", "Afonso", "Agostinho", "Alberto", "Albino", "Alcides", "Aldo", "Aleixo", "Alex", "Alexandre", "Alfredo", "Almir", "Almiro", "Aloísio", "Altair", "Américo", "Amílcar", "Amancio", "Amando", "Ambrósio", "Amor", "Aníbal", "Anacleto", "André", "Anselmo", "António", "Antônio", "Antelmo", "Aristides", "Armando", "Arsenio", "Artur", "Atílio", "Augusto", "Aurélio", "Balbino", "Balduíno", "Bartolomeu", "Benedito", "Benigno", "Benjamim", "Bento", "Bernardino", "Bernardo", "Bonifacio", "Brás", "Breno", "Brian", "Bruno", "Cândido", "César", "Cézar", "Caetano", "Caio", "Calisto", "Calixto", "Camilo", "Carlinhos", "Carlito", "Carlitos", "Carlos", "Carmo", "Casimiro", "Cecilio", "Celestino", "Celio", "Celso", "Cesário", "Cezário", "Cezar", "Chico", "Cipriano", "Ciríaco", "Cláudio", "Clemente", "Cleto", "Cornélio", "Cosme", "Cristóvão", "Cristiano", "Cruz", "Custódio", "Dário", "Dado", "Dan", "Daniel", "Danilo", "Davi", "David", "Demétrio", "Deodato", "Desidério", "Diego", "Dimas", "Dinis", "Diniz", "Diogo", "Dionísio", "Domingos", "Donato", "Du", "Duarte", "Duda", "Dudu", "Edgar", "Edmundo", "Edu", "Eduardo", "Egídio", "Elder", "Eleuterio", "Elias", "Elpidio", "Emanuel", "Emilio", "Enéas", "Enzo", "Erasmo", "Ernesto", "Estevão", "Eugênio", "Eusébio", "Eustaquio", "Eutímio", "Evaristo", "Ezequiel", "Fábio", "Félix", "Fúlvio", "Fabiano", "Fabricio", "Faustino", "Fausto", "Feliciano", "Felipe", "Felipinho", "Fernão", "Fernando", "Filipe", "Flávio", "Florencio", "Fortunato", "Francisco", "Fred", "Frederico", "Gabriel", "Gaspar", "Geraldo", "Germano", "Gervásio", "Gil", "Gilberto", "Gláucio", "Glauco", "Godofredo", "Gonçalo", "Graciano", "Guálter", "Gualberto", "Guilherme", "Guiomar", "Gustavo", "Hélder", "Haroldo", "Heitor", "Helder", "Heliodoro", "Henrique", "Herberto", "Heriberto", "Hermínio", "Hermenegildo", "Hipólito", "Horácio", "Hugo", "Iago", "Ian", "Igor", "Inácio", "Isaac", "Isac", "Ismael", "Ivan", "Ivo", "Ivo ", "Jônatas", "Jacó", "Jacinto", "Jaime", "Jerónimo", "Jerônimo", "Jeremias", "João", "Joãozinho", "Joaquim", "Joel", "Joel ", "Jordão", "Jorge", "Jorginho", "José", "Josué", "Julio", "Kévim", "Kevin", "Lúcio", "Leandro", "Leonardo", "Leonel", "Leopoldo", "Lino", "Lisandro", "Lourenço", "Luís", "Luca", "Lucas", "Luciano", "Luisinho", "Luiz", "Márcio", "Mário", "Manel ", "Manoel", "Manuel", "Marcelinho", "Marcelino", "Marcelo", "Marciano", "Marco", "Marcos", "Maria", "Mariano", "Marinho", "Marquinhos", "Martim", "Martinho", "Mateus", "Matheus", "Matias", "Maurício", "Mauro", "Maximiano", "Maximiliano", "Maximino", "Micael", "Miguel", "Miguelito", "Modesto", "Moisés", "Narciso", "Natanael", "Nataniel", "Nelinho", "Nelson", "Netuno", "Nico", "Nicodemo", "Nicolau", "Noé", "Noah ", "Norberto", "Nuno", "Octávio", "Odilon", "Olavo", "Olegário", "Oscar", "Osvaldo", "Otávio", "Ovídio", "Patrício", "Paulinho", "Paulino", "Paulo", "Pedrinho", "Pedro", "Pio", "Plácido", "Plínio", "Primo", "Quim", "Quirino", "Régulo", "Rúben", "Raúl", "Rafael", "Rafinha", "Raimundo", "Ramiro", "Raul", "Raymundo", "Reinaldo", "Remigio", "Renato", "Reynaldo", "Ricardo", "Roberto", "Rodolfo", "Rodrigo", "Rogério", "Rolando", "Roldão", "Ronaldo", "Roque", "Rubem", "Rubens", "Rubinho", "Rufino", "Rui", "Ruy", "Sérgio", "Salomão", "Salvador", "Samuel", "Sandro", "Santiago", "Saturnino", "Sebastião", "Severino", "Silvestre", "Silvio", "Simão", "Téo", "Túlio", "Tacito", "Tadeu", "Teófilo", "Telmo", "Teobaldo", "Teodósio", "Teodoro", "Thiago", "Tiago", "Tiburcio", "Timoteo", "Tito", "Tomás", "Tomé", "Toninho", "Tristão", "Ulisses", "Vítor", "Valério", "Valentin", "Valter", "Vasco", "Veríssimo", "Vicente", "Victor", "Victorino", "Vinícius", "Virgílio", "Viriato", "Wilson", "Xande", "Xandinho", "Xavier", "Zé", "Zeferino", "Zezé"];
                $namesFemale = ["Águeda", "Áurea", "Ângela", "Érica", "Íris", "Úrsula", "Adelaide", "Adelina", "Adriana", "Alícia", "Alberta", "Albertina", "Albina", "Alda", "Aldina", "Alex", "Alexandra", "Alexandrina", "Alice", "Aline", "Amália", "Amélia", "América", "Amanda", "Amor", "Ana", "Anabela", "Andréa", "Andréia", "Andreia", "Angélica", "Anita", "Antónia", "Antônia", "Apolónia", "Apolônia", "Ariana", "Assunção", "Augusta", "Aurora", "Bárbara", "Balbina", "Beatriz", "Belinha", "Benedita", "Benigna", "Bia", "Bianca", "Brígida", "Branca", "Bruna", "Brunilda", "Cátia", "Cândida", "Célia", "Cíntia", "Caetana", "Calista", "Calixta", "Camila", "Carina", "Carla", "Carlota", "Carminho", "Carmo", "Carolina", "Cassandra", "Catarina", "Cecília", "Cesária", "Chica", "Cláudia", "Clara", "Clarissa", "Clementina", "Cloé", "Clotilde", "Constância", "Constança", "Cristiana", "Cristina", "Cruz", "Custódia", "Débora", "Délia", "Daniela", "Desidéria", "Diana", "Dina", "Domitila", "Dores", "Dorotéia", "Doroteia", "Duda", "Dulce", "Edite", "Eduarda", "Efigénia", "Efigênia", "Eliana", "Elisa", "Elisabete", "Eliza", "Elvira", "Emília", "Ema", "Emiliana", "Eneida", "Esmeralda", "Estefânia", "Estela", "Ester", "Eufêmia", "Eugênia", "Eulália", "Eva", "Fábia", "Fátima", "Fabiana", "Felícia", "Felicidade", "Fernanda", "Filipa", "Filomena", "Flávia", "Florinda", "Fortunata", "Francisca", "Frederica", "Gabriela", "Genoveva", "Gertrudes", "Gilda", "Gisela", "Gláucia", "Gloria", "Graça", "Gracília", "Graciana", "Guiomar", "Helena", "Hermínia", "Iara", "Ida", "Imaculada", "Inês", "Iolanda", "Irene", "Iria", "Irina", "Isabel", "Isabela", "Isaura", "Isidora", "Isis", "Izabel", "Jéssica", "Júlia", "Jacinta", "Jaqueline", "Jessica", "Joana", "Joaninha", "Jordana", "Josefa", "Josefina", "Jovita", "Judite", "Juliana", "Julie", "Julinha", "Lídia", "Lígia", "Lílian", "Lívia", "Lúcia", "Lara", "Larissa", "Laura", "Leandra", "Lena", "Leocádia", "Leonor", "Letícia", "Lia", "Liana", "Liliana", "Lorena", "Luísa", "Luana", "Lucília", "Luciana", "Lucinda", "Luiza", "Luna", "Lurdes", "Luzia", "Lygia", "Márcia", "Mélanie", "Mónica", "Mônica", "Madalena", "Mafalda", "Magda", "Maia", "Maiara", "Manoela", "Manuela", "Mara", "Marciana", "Marciane", "Margarida", "Maria", "Mariana", "Mariazinha", "Marina", "Marisa", "Maristela", "Marta", "Matilde", "Melissa", "Mia", "Micaela", "Miguela", "Moema", "Monica", "Nádia", "Núria", "Naiara", "Narcisa", "Natália", "Natacha", "Nathália", "Nela", "Nelinha", "Neves", "Nicole", "Nilda", "Noêmia", "Noa", "Noemí", "Octávia", "Ofélia", "Olívia", "Olga", "Ondina", "Otávia", "Palmira", "Paloma", "Patrícia", "Paula", "Paulina", "Paulinha", "Perpétua", "Pilar", "Priscila", "Rafaela", "Raissa", "Raquel", "Rebeca", "Regina", "Renata", "Rita", "Rosália", "Rosário", "Rosa", "Rosalia", "Rosalina", "Rosana", "Rosinha", "Rute", "Sílvia", "Sónia", "Sabina", "Safira", "Salomé", "Sandra", "Sara", "Serafina", "Severina", "Silvia", "Sofia", "Sol", "Sonia", "Soraia", "Susana", "Suzana", "Tânia", "Taís", "Talita", "Tatiana", "Telma", "Teodora", "Teresa", "Teresinha", "Tereza", "Terezinha", "Thaís", "Thalita", "Valéria", "Valentina", "Valquíria", "Vanda", "Vanessa", "Verônica", "Vera", "Victória", "Violeta", "Virginia", "Vitória", "Yasmin", "Zita"];
                $lastNames   = ["Águas", "Álvares", "Ávila", "Abreu", "Abril", "Agostinho", "Aguiar", "Albuquerque", "Alcantara", "Almeida", "Alves", "Alvim", "Amaral", "Amorim", "Andrade", "Antunes", "Araújo", "Azevedo", "Bandeira", "Baptista", "Barbosa", "Barboza", "Barreto", "Barros", "Bastos", "Batista", "Bento", "Bettencourt", "Borges", "Botelho", "Braga", "Branco", "Brandão", "Brito", "Câmara", "Cabral", "Caetano", "Campos", "Cardoso", "Carneiro", "Carreira", "Carriço", "Carvalho", "Castro", "Cavaco", "Cerqueira", "Coelho", "Coimbra", "Cordeiro", "Correia", "Corte-Real", "Cortes", "Costa", "Coutinho", "Couto", "Cruz", "Cunha", "Dantas", "de Freitas", "de Lima", "de Sá", "Dias", "do Rosário", "Duarte", "Faria", "Fernandes", "Ferreira", "Fidalgo", "Florencio", "Fonseca", "Fontes", "Freire", "Freitas", "Furtado", "Góes", "Gama", "Garcia", "Gomes", "Gonçalves", "Gonsalves", "Gouveia", "Guerra", "Guimarães", "Gusmão", "Henriques", "Hernandes", "Leitão", "Leite", "Lima", "Lobo", "Lopes", "Luz", "Macedo", "Machado", "Maciel", "Magalhães", "Martins", "Mascarenhas", "Mata", "Matos", "Medeiros", "Melo", "Mendes", "Mendez", "Mendonça", "Menezes", "Miranda", "Moniz", "Monteiro", "Montenegro", "Morais", "Moreira", "Moreno", "Moura", "Nascimento", "Neves", "Nogueira", "Nunes", "Oliveira", "Pacheco", "Paiva", "Pascoal", "Passos", "Pereira", "Peres", "Pimentel", "Pinho", "Pinto", "Pires", "Queiros", "Queiroz", "Ramos", "Rebelo", "Rego", "Reis", "Resende", "Resendes", "Ribeiro", "Rocha", "Rodrigues", "Roque", "Rosa", "Sá", "Saldanha", "Salgado", "Santos", "Sapateiro", "Saraiva", "Seabra", "Seixas", "Sequeira", "Serra", "Silva", "Silveira", "Silvestre", "Simões", "Siqueira", "Soares", "Sousa", "Tavares", "Teixeira", "Tomás", "Torres", "Valente", "Varejão", "Varela", "Vasconcelos", "Vaz", "Venâncio", "Vidal", "Vieira", "Vila", "Vomlel"];
                break;

            case 'EN':
                $namesFemale = ["Abbie", "Abby", "Abigail", "Aimee", "Alex", "Alexandra", "Alice", "Alicia", "Alisha", "Amber", "Amelia", "Amelie", "Amy", "Anna", "Ava", "Bella", "Bethany", "Brooke", "Caitlin", "Cerys", "Charlie", "Charlotte", "Chelsea", "Chloe", "Courtney", "Daisy", "Danielle", "Demi", "Eleanor", "Eliza", "Elizabeth", "Ella", "Ellie", "Eloise", "Elsie", "Emilia", "Emily", "Emma", "Erin", "Esme", "Eva", "Eve", "Evelyn", "Evie", "Faith", "Freya", "Georgia", "Georgina", "Grace", "Gracie", "Hannah", "Harriet", "Heidi", "Hollie", "Holly", "Imogen", "Isabel", "Isabella", "Isabelle", "Isla", "Isobel", "Jade", "Jasmine", "Jennifer", "Jessica", "Jodie", "Julia", "Kate", "Katherine", "Katie", "Kayla", "Kayleigh", "Keira", "Lacey", "Lara", "Laura", "Lauren", "Layla", "Leah", "Lexi", "Lexie", "Libby", "Lilly", "Lily", "Lola", "Louise", "Lucy", "Lydia", "Maddison", "Madeleine", "Madison", "Maisie", "Maisy", "Maria", "Martha", "Matilda", "Maya", "Megan", "Melissa", "Mia", "Millie", "Mollie", "Molly", "Morgan", "Mya", "Naomi", "Natasha", "Niamh", "Nicole", "Olivia", "Paige", "Phoebe", "Poppy", "Rachel", "Rebecca", "Rose", "Rosie", "Ruby", "Samantha", "Sara", "Sarah", "Scarlett", "Shannon", "Sienna", "Skye", "Sofia", "Sophia", "Sophie", "Summer", "Tegan", "Tia", "Tilly", "Victoria", "Willow", "Yasmin", "Zara", "Zoe", "Sophia", "Emma", "Isabella", "Olivia", "Ava", "Emily", "Abigail", "Mia", "Madison", "Elizabeth", "Chloe", "Ella", "Avery", "Addison", "Aubrey", "Lily", "Natalie", "Sofia", "Charlotte", "Zoey", "Grace", "Hannah", "Amelia", "Harper", "Lillian", "Samantha", "Evelyn", "Victoria", "Brooklyn", "Zoe", "Layla", "Hailey", "Leah", "Kaylee", "Anna", "Aaliyah", "Gabriella", "Allison", "Nevaeh", "Alexis", "Audrey", "Savannah", "Sarah", "Alyssa", "Claire", "Taylor", "Riley", "Camila", "Arianna", "Ashley", "Brianna", "Sophie", "Peyton", "Bella", "Khloe", "Genesis", "Alexa", "Serenity", "Kylie", "Aubree", "Scarlett", "Stella", "Maya", "Katherine", "Julia", "Lucy", "Madelyn", "Autumn", "Makayla", "Kayla", "Mackenzie", "Lauren", "Gianna", "Ariana", "Faith", "Alexandra", "Melanie", "Sydney", "Bailey", "Caroline", "Naomi", "Morgan", "Kennedy", "Ellie", "Jasmine", "Eva", "Skylar", "Kimberly", "Violet", "Molly", "Aria", "Jocelyn", "Trinity", "London", "Lydia", "Madeline", "Reagan", "Piper", "Andrea", "Annabelle", "Maria", "Brooke", "Payton", "Paisley", "Paige", "Ruby", "Nora", "Mariah", "Rylee", "Lilly", "Brielle", "Jade", "Destiny", "Nicole", "Mila", "Kendall", "Liliana", "Kaitlyn", "Natalia", "Sadie", "Jordyn", "Vanessa", "Mary", "Mya", "Penelope", "Isabelle", "Alice", "Reese", "Gabrielle", "Hadley", "Katelyn", "Angelina", "Rachel", "Isabel", "Eleanor", "Clara", "Brooklynn", "Jessica", "Elena", "Aliyah", "Vivian", "Laila", "Sara", "Amy", "Eliana", "Lyla", "Juliana", "Valeria", "Adriana", "Makenzie", "Elise", "Mckenzie", "Quinn", "Delilah", "Cora", "Kylee", "Rebecca", "Gracie", "Izabella", "Josephine", "Alaina", "Michelle", "Jennifer", "Eden", "Valentina", "Aurora", "Catherine", "Stephanie", "Valerie", "Jayla", "Willow", "Daisy", "Alana", "Melody", "Hazel", "Summer", "Melissa", "Margaret", "Kinsley", "Kinley", "Ariel", "Lila", "Giselle", "Ryleigh", "Haley", "Julianna", "Ivy", "Alivia", "Brynn", "Keira", "Daniela", "Aniyah", "Angela", "Kate", "Londyn", "Hayden", "Harmony", "Adalyn", "Megan", "Allie", "Gabriela", "Alayna", "Presley", "Jenna", "Alexandria", "Ashlyn", "Adrianna", "Jada", "Fiona", "Norah", "Emery", "Maci", "Miranda", "Ximena", "Amaya", "Cecilia", "Ana", "Shelby", "Katie", "Hope", "Callie", "Jordan", "Luna", "Leilani", "Eliza", "Mckenna", "Angel", "Genevieve", "Makenna", "Isla", "Lola", "Danielle", "Chelsea", "Leila", "Tessa", "Adelyn", "Camille", "Mikayla", "Adeline", "Adalynn", "Sienna", "Esther", "Jacqueline", "Emerson", "Arabella", "Maggie", "Athena", "Lucia", "Lexi", "Ayla", "Diana", "Alexia", "Juliet", "Josie", "Allyson", "Addyson", "Delaney", "Teagan", "Marley", "Amber", "Rose", "Erin", "Leslie", "Kayleigh", "Amanda", "Kathryn", "Kelsey", "Emilia", "Alina", "Kenzie", "Kaydence", "Alicia", "Alison", "Paris", "Sabrina", "Ashlynn", "Lilliana", "Sierra", "Cassidy", "Laura", "Alondra", "Iris", "Kyla", "Christina", "Carly", "Jillian", "Madilyn", "Kyleigh", "Madeleine", "Cadence", "Nina", "Evangeline", "Nadia", "Raegan", "Lyric", "Giuliana", "Briana", "Georgia", "Yaretzi", "Elliana", "Haylee", "Fatima", "Phoebe", "Selena", "Charlie", "Dakota", "Annabella", "Abby", "Daniella", "Juliette", "Lilah", "Bianca", "Mariana", "Miriam", "Parker", "Veronica", "Gemma", "Noelle", "Cheyenne", "Marissa", "Heaven", "Vivienne", "Brynlee", "Joanna", "Mallory", "Aubrie", "Journey", "Nyla", "Cali", "Tatum", "Carmen", "Gia", "Jazmine", "Heidi", "Miley", "Baylee", "Elaina", "Macy", "Ainsley", "Jane", "Raelynn", "Anastasia", "Adelaide", "Ruth", "Camryn", "Kiara", "Alessandra", "Hanna", "Finley", "Maddison", "Lia", "Bethany", "Karen", "Kelly", "Malia", "Jazmin", "Jayda", "Esmeralda", "Kira", "Lena", "Kamryn", "Kamila", "Karina", "Eloise", "Kara", "Elisa", "Rylie", "Olive", "Nayeli", "Tiffany", "Macie", "Skyler", "Addisyn", "Angelica", "Briella", "Fernanda", "Annie", "Maliyah", "Amiyah", "Jayden", "Charlee", "Caitlyn", "Elle", "Crystal", "Julie", "Imani", "Kendra", "Talia", "Angelique", "Jazlyn", "Guadalupe", "Alejandra", "Emely", "Lucille", "Anya", "April", "Elsie", "Madelynn", "Myla", "Julissa", "Scarlet", "Helen", "Breanna", "Kyra", "Madisyn", "Rosalie", "Brittany", "Brylee", "Jayleen", "Arielle", "Karla", "Kailey", "Arya", "Sarai", "Harley", "Miracle", "Kaelyn", "Kali", "Cynthia", "Daphne", "Aleah", "Caitlin", "Cassandra", "Holly", "Janelle", "Marilyn", "Katelynn", "Kaylie", "Itzel", "Carolina", "Bristol", "Haven", "Michaela", "Monica", "June", "Janiyah", "Camilla", "Jamie", "Rebekah", "Audrina", "Dayana", "Lana", "Serena", "Tiana", "Nylah", "Braelyn", "Savanna", "Skye", "Raelyn", "Madalyn", "Sasha", "Perla", "Bridget", "Aniya", "Rowan", "Logan", "Mckinley", "Averie", "Jaylah", "Aylin", "Joselyn", "Nia", "Hayley", "Lilian", "Adelynn", "Jaliyah", "Kassidy", "Kaylin", "Kadence", "Celeste", "Jaelyn", "Zariah", "Tatiana", "Jimena", "Lilyana", "Anaya", "Catalina", "Viviana", "Cataleya", "Sloane", "Courtney", "Johanna", "Amari", "Melany", "Anabelle", "Francesca", "Ada", "Alanna", "Priscilla", "Danna", "Angie", "Kailyn", "Lacey", "Sage", "Lillie", "Brinley", "Caylee", "Joy", "Kenley", "Vera", "Bailee", "Amira", "Aileen", "Aspen", "Emmalyn", "Erica", "Gracelyn", "Kennedi", "Skyla", "Annalise", "Danica", "Dylan", "Kiley", "Gwendolyn", "Jasmin", "Lauryn", "Aleena", "Justice", "Annabel", "Tenley", "Dahlia", "Gloria", "Lexie", "Lindsey", "Hallie", "Sylvia", "Elyse", "Annika", "Maeve", "Marlee", "Aryanna", "Kenya", "Lorelei", "Selah", "Kaliyah", "Adele", "Natasha", "Brenda", "Erika", "Alyson", "Braylee", "Emilee", "Raven", "Ariella", "Blakely", "Liana", "Jaycee", "Sawyer", "Anahi", "Jaelynn", "Elsa", "Farrah", "Cameron", "Evelynn", "Luciana", "Zara", "Madilynn", "Eve", "Kaia", "Helena", "Anne", "Estrella", "Leighton", "Nataly", "Whitney", "Lainey", "Amara", "Anabella", "Malaysia", "Samara", "Zoie", "Amani", "Phoenix", "Dulce", "Paola", "Marie", "Aisha", "Harlow", "Virginia", "Ember", "Regina", "Jaylee", "Anika", "Ally", "Kayden", "Alani", "Miah", "Yareli", "Journee", "Kiera", "Nathalie", "Mikaela", "Jaylynn", "Litzy", "Charley", "Claudia", "Aliya", "Madyson", "Cecelia", "Liberty", "Braelynn", "Evie", "Rosemary", "Myah", "Lizbeth", "Giana", "Ryan", "Teresa", "Ciara", "Isis", "Lea", "Shayla", "Jazlynn", "Rosa", "Gracelynn", "Desiree", "Elisabeth", "Isabela", "Arely", "Mariam", "Abbigail", "Emersyn", "Brenna", "Kaylynn", "Nova", "Raquel", "Dana", "Laney", "Laylah", "Siena", "Amelie", "Clarissa", "Lilianna", "Lylah", "Halle", "Madalynn", "Maleah", "Sherlyn", "Linda", "Shiloh", "Jessie", "Kenia", "Greta", "Marina", "Melina", "Amiya", "Bria", "Natalee", "Sariah", "Mollie", "Nancy", "Christine", "Felicity", "Zuri", "Irene", "Simone", "Amya", "Matilda", "Colette", "Kristen", "Paityn", "Alayah", "Janiya", "Kallie", "Mira", "Hailee", "Kathleen", "Meredith", "Janessa", "Noemi", "Aiyana", "Aliana", "Leia", "Mariyah", "Tori", "Alissa", "Ivanna", "Joslyn", "Sandra", "Maryam", "Saniyah", "Kassandra", "Danika", "Denise", "Jemma", "River", "Charleigh", "Emelia", "Kristina", "Armani", "Beatrice", "Jaylene", "Karlee", "Blake", "Cara", "Addilyn", "Amina", "Ansley", "Kaitlynn", "Iliana", "Mckayla", "Adelina", "Briley", "Elaine", "Lailah", "Mercedes", "Chaya", "Lindsay", "Hattie", "Lisa", "Marisol", "Patricia", "Bryanna", "Taliyah", "Adrienne", "Emmy", "Millie", "Paislee", "Charli", "Kourtney", "Leyla", "Maia", "Willa", "Milan", "Paula", "Ayleen", "Clare", "Kensley", "Reyna", "Martha", "Adley", "Elianna", "Emilie", "Karsyn", "Yasmin", "Lorelai", "Amirah", "Aryana", "Livia", "Alena", "Kiana", "Celia", "Kailee", "Rylan", "Ellen", "Galilea", "Kynlee", "Leanna", "Renata", "Mae", "Ayanna", "Chanel", "Lesly", "Cindy", "Carla", "Pearl", "Jaylin", "Kimora", "Angeline", "Carlee", "Aubri", "Edith", "Alia", "Frances", "Corinne", "Jocelynn", "Cherish", "Wendy", "Carolyn", "Lina", "Tabitha", "Winter", "Abril", "Bryn", "Jolie", "Yaritza", "Casey", "Zion", "Lillianna", "Jordynn", "Zariyah", "Audriana", "Jayde", "Jaida", "Salma", "Diamond", "Malaya", "Kimber", "Ryann", "Abbie", "Paloma", "Destinee", "Kaleigh", "Asia", "Demi", "Yamileth", "Deborah", "Elin", "Kaiya", "Mara", "Averi", "Nola", "Tara", "Taryn", "Emmalee", "Aubrianna", "Janae", "Kyndall", "Jewel", "Zaniyah", "Kaya", "Sonia", "Alaya", "Heather", "Nathaly", "Shannon", "Ariah", "Avah", "Giada", "Lilith", "Samiyah", "Sharon", "Coraline", "Eileen", "Julianne", "Milania", "Chana", "Regan", "Krystal", "Rihanna", "Sidney", "Hadassah", "Macey", "Mina", "Paulina", "Rayne", "Kaitlin", "Maritza", "Susan", "Raina", "Hana", "Keyla", "Temperance", "Aimee", "Alisson", "Charlize", "Kendal", "Lara", "Roselyn", "Alannah", "Alma", "Dixie", "Larissa", "Patience", "Taraji", "Sky", "Zaria", "Aleigha", "Alyvia", "Aviana", "Bryleigh", "Elliot", "Jenny", "Luz", "Ali", "Alisha", "Ayana", "Campbell", "Karis", "Lilyanna", "Azaria", "Blair", "Micah", "Moriah", "Myra", "Lilia", "Aliza", "Giovanna", "Karissa", "Saniya", "Emory", "Estella", "Juniper", "Kairi", "Kenna", "Meghan", "Abrielle", "Elissa", "Rachael", "Emmaline", "Jolene", "Joyce", "Britney", "Carlie", "Haylie", "Judith", "Renee", "Saanvi", "Yesenia", "Barbara", "Dallas", "Jaqueline", "Karma", "America", "Sariyah", "Azalea", "Everly", "Ingrid", "Lillyana", "Emmalynn", "Marianna", "Brisa", "Kaelynn", "Leona", "Libby", "Deanna", "Mattie", "Miya", "Annalee", "Nahla", "Dorothy", "Kaylyn", "Rayna", "Araceli", "Cambria", "Evalyn", "Haleigh", "Thalia", "Jakayla", "Maliah", "Saige", "Avianna", "Charity", "Kaylen", "Raylee", "Tamia", "Aubrielle", "Bayleigh", "Carley", "Kailynn", "Katrina", "Belen", "Karlie", "Natalya", "Alaysia", "Celine", "Milana", "Monroe", "Estelle", "Meadow", "Audrianna", "Cristina", "Harlee", "Jazzlyn", "Scarlette", "Zahra", "Akira", "Ann", "Collins", "Kendyl", "Anabel", "Azariah", "Carissa", "Milena", "Tia", "Alisa", "Bree", "Carleigh", "Cheyanne", "Sarahi", "Laurel", "Kylah", "Tinley", "Kora", "Marisa", "Esme", "Sloan", "Cailyn", "Gisselle", "Kasey", "Kyndal", "Marlene", "Riya", "Annabell", "Aubriana", "Izabelle", "Kirsten", "Aya", "Dalilah", "Devyn", "Geraldine", "Analia", "Hayleigh", "Landry", "Sofie", "Tess", "Ashtyn", "Jessa", "Katalina"];
                $namesMale   = ["Aaron", "Adam", "Aidan", "Aiden", "Alex", "Alexander", "Alfie", "Andrew", "Anthony", "Archie", "Arthur", "Ashton", "Bailey", "Ben", "Benjamin", "Billy", "Blake", "Bobby", "Bradley", "Brandon", "Caleb", "Callum", "Cameron", "Charles", "Charlie", "Christopher", "Cody", "Connor", "Corey", "Daniel", "David", "Declan", "Dexter", "Dominic", "Dylan", "Edward", "Elliot", "Ellis", "Ethan", "Evan", "Ewan", "Finlay", "Finley", "Frankie", "Freddie", "Frederick", "Gabriel", "George", "Harley", "Harrison", "Harry", "Harvey", "Hayden", "Henry", "Isaac", "Jack", "Jackson", "Jacob", "Jake", "James", "Jamie", "Jay", "Jayden", "Jenson", "Joe", "Joel", "John", "Jonathan", "Jordan", "Joseph", "Josh", "Joshua", "Jude", "Kai", "Kayden", "Kian", "Kieran", "Kyle", "Leo", "Leon", "Lewis", "Liam", "Logan", "Louie", "Louis", "Luca", "Lucas", "Luke", "Mason", "Matthew", "Max", "Michael", "Morgan", "Nathan", "Nicholas", "Noah", "Oliver", "Ollie", "Oscar", "Owen", "Patrick", "Peter", "Reece", "Reuben", "Rhys", "Riley", "Robert", "Rory", "Ryan", "Sam", "Samuel", "Scott", "Sean", "Sebastian", "Spencer", "Stanley", "Taylor", "Theo", "Thomas", "Toby", "Tom", "Tommy", "Tyler", "William", "Zac", "Zachary", "Zak", "Aaden", "Aarav", "Aaron", "Abdiel", "Abdullah", "Abel", "Abraham", "Abram", "Ace", "Adam", "Adan", "Aden", "Aditya", "Adonis", "Adrian", "Adriel", "Adrien", "Agustin", "Ahmad", "Ahmed", "Aidan", "Aiden", "Aidyn", "Alan", "Albert", "Alberto", "Alden", "Aldo", "Alec", "Alejandro", "Alessandro", "Alex", "Alexander", "Alexis", "Alexzander", "Alfonso", "Alfred", "Alfredo", "Alijah", "Allan", "Allen", "Alonso", "Alonzo", "Alvaro", "Alvin", "Amari", "Ameer", "Amir", "Amos", "Anders", "Anderson", "Andre", "Andres", "Andrew", "Andy", "Angel", "Angelo", "Anthony", "Antoine", "Anton", "Antonio", "Apollo", "Archer", "Ari", "Arian", "Ariel", "Arjun", "Arlo", "Armando", "Armani", "Arnav", "Aron", "Arthur", "Arturo", "Aryan", "Asa", "Asher", "Ashton", "Atticus", "August", "Augustine", "Augustus", "Austin", "Austyn", "Avery", "Axel", "Axton", "Ayaan", "Aydan", "Ayden", "Aydin", "Barrett", "Beau", "Beckett", "Beckham", "Ben", "Benjamin", "Bennett", "Benson", "Bentlee", "Bentley", "Bently", "Benton", "Billy", "Blaine", "Blaise", "Blake", "Blaze", "Bo", "Bobby", "Bodhi", "Boston", "Bowen", "Braden", "Bradley", "Brady", "Bradyn", "Braeden", "Braiden", "Branden", "Brandon", "Branson", "Brantley", "Braxton", "Brayan", "Brayden", "Braydon", "Braylen", "Braylon", "Brecken", "Brendan", "Brenden", "Brendon", "Brennan", "Brennen", "Brent", "Brentley", "Brenton", "Brett", "Brian", "Brice", "Bridger", "Briggs", "Brock", "Broderick", "Brodie", "Brody", "Brogan", "Bronson", "Brooks", "Bruce", "Bruno", "Bryan", "Bryant", "Bryce", "Brycen", "Bryson", "Byron", "Cade", "Caden", "Cael", "Caiden", "Cain", "Cale", "Caleb", "Callan", "Callen", "Callum", "Calvin", "Camden", "Camdyn", "Cameron", "Camilo", "Camren", "Camron", "Camryn", "Cannon", "Carl", "Carlos", "Carmelo", "Carson", "Carter", "Case", "Casen", "Casey", "Cash", "Cason", "Cassius", "Cayden", "Cayson", "Cedric", "Cesar", "Chace", "Chad", "Chaim", "Chance", "Chandler", "Channing", "Charles", "Charlie", "Chase", "Chris", "Christian", "Christopher", "Clark", "Clay", "Clayton", "Clinton", "Cody", "Cohen", "Colby", "Cole", "Coleman", "Colin", "Collin", "Colt", "Colten", "Colton", "Conner", "Connor", "Conor", "Conrad", "Cooper", "Corbin", "Corey", "Cory", "Craig", "Crew", "Cristian", "Cristopher", "Crosby", "Cruz", "Cullen", "Curtis", "Cyrus", "Dakota", "Dallas", "Dalton", "Damarion", "Damian", "Damien", "Damion", "Damon", "Dane", "Dangelo", "Daniel", "Danny", "Dante", "Darian", "Dariel", "Darien", "Dario", "Darius", "Darnell", "Darrell", "Darren", "Darryl", "Darwin", "Davian", "David", "Davin", "Davion", "Davis", "Davon", "Dawson", "Dax", "Daxton", "Dayton", "Deacon", "Dean", "Deandre", "Deangelo", "Declan", "Deegan", "Demarcus", "Demetrius", "Dennis", "Denzel", "Deon", "Derek", "Derick", "Derrick", "Deshawn", "Desmond", "Devan", "Devin", "Devon", "Dexter", "Diego", "Dillon", "Dominic", "Dominick", "Dominik", "Dominique", "Donald", "Donovan", "Donte", "Dorian", "Douglas", "Drake", "Draven", "Drew", "Duncan", "Dustin", "Dwayne", "Dylan", "Ean", "Easton", "Eddie", "Eden", "Edgar", "Edison", "Eduardo", "Edward", "Edwin", "Efrain", "Eli", "Elian", "Elias", "Elijah", "Eliot", "Eliseo", "Elisha", "Elliot", "Elliott", "Ellis", "Emanuel", "Emerson", "Emery", "Emiliano", "Emilio", "Emmanuel", "Emmett", "Emmitt", "Emory", "Enrique", "Enzo", "Eric", "Erick", "Erik", "Ernest", "Ernesto", "Esteban", "Ethan", "Eugene", "Evan", "Everett", "Ezekiel", "Ezequiel", "Ezra", "Fabian", "Felipe", "Felix", "Fernando", "Finley", "Finn", "Finnegan", "Fisher", "Fletcher", "Flynn", "Foster", "Francis", "Francisco", "Franco", "Frank", "Frankie", "Franklin", "Freddy", "Frederick", "Gabriel", "Gael", "Gage", "Gaige", "Garrett", "Gary", "Gauge", "Gavin", "Gavyn", "George", "Gerald", "Gerardo", "Giancarlo", "Gianni", "Gibson", "Gideon", "Gilbert", "Gilberto", "Giovani", "Giovanni", "Giovanny", "Grady", "Graeme", "Graham", "Grant", "Graysen", "Grayson", "Gregory", "Greyson", "Griffin", "Guillermo", "Gunnar", "Gunner", "Gustavo", "Hamza", "Hank", "Harley", "Harold", "Harper", "Harrison", "Harry", "Harvey", "Hassan", "Hayden", "Hayes", "Heath", "Hector", "Hendrix", "Henry", "Hezekiah", "Holden", "Houston", "Howard", "Hudson", "Hugh", "Hugo", "Hunter", "Ian", "Ibrahim", "Ignacio", "Iker", "Immanuel", "Isaac", "Isai", "Isaiah", "Isaias", "Ishaan", "Isiah", "Ismael", "Israel", "Issac", "Ivan", "Izaiah", "Izayah", "Jabari", "Jace", "Jack", "Jackson", "Jacob", "Jacoby", "Jaden", "Jadiel", "Jadon", "Jaeden", "Jael", "Jagger", "Jaiden", "Jaidyn", "Jaime", "Jairo", "Jake", "Jakob", "Jalen", "Jamal", "Jamar", "Jamari", "Jamarion", "James", "Jameson", "Jamie", "Jamir", "Jamison", "Jared", "Jarrett", "Jase", "Jasiah", "Jason", "Jasper", "Javier", "Javion", "Javon", "Jax", "Jaxen", "Jaxon", "Jaxson", "Jaxton", "Jay", "Jayce", "Jaycob", "Jayden", "Jaydon", "Jaylen", "Jaylin", "Jaylon", "Jayson", "Jedidiah", "Jefferson", "Jeffery", "Jeffrey", "Jensen", "Jeremiah", "Jeremy", "Jermaine", "Jerome", "Jerry", "Jesse", "Jessie", "Jett", "Jimmy", "Jionni", "Joaquin", "Joe", "Joel", "Joey", "Johan", "Johann", "John", "Johnathan", "Johnathon", "Johnny", "Jon", "Jonah", "Jonas", "Jonathan", "Jonathon", "Jordan", "Jorden", "Jordyn", "Jorge", "Jose", "Joseph", "Joshua", "Josiah", "Josue", "Jovani", "Jovanni", "Joziah", "Juan", "Judah", "Jude", "Juelz", "Julian", "Julien", "Julio", "Julius", "Junior", "Justice", "Justin", "Justus", "Kade", "Kaden", "Kaeden", "Kael", "Kai", "Kaiden", "Kale", "Kaleb", "Kamari", "Kamden", "Kameron", "Kamron", "Kamryn", "Kane", "Kareem", "Karsen", "Karson", "Karter", "Kase", "Kasen", "Kash", "Kason", "Kayden", "Kaysen", "Kayson", "Keagan", "Keaton", "Keegan", "Keenan", "Keith", "Kellan", "Kellen", "Kelvin", "Kendall", "Kendrick", "Kenneth", "Kenny", "Kevin", "Khalil", "Kian", "Kieran", "Killian", "King", "Kingsley", "Kingston", "Knox", "Kobe", "Kody", "Kohen", "Kolby", "Kole", "Kolten", "Kolton", "Konner", "Konnor", "Korbin", "Krish", "Kristian", "Kristopher", "Kylan", "Kyle", "Kylen", "Kyler", "Kymani", "Kyree", "Kyrie", "Kyson", "Lamar", "Lance", "Landen", "Landon", "Landry", "Landyn", "Lane", "Larry", "Lawrence", "Lawson", "Layne", "Layton", "Leandro", "Lee", "Legend", "Leland", "Lennon", "Lennox", "Leo", "Leon", "Leonard", "Leonardo", "Leonel", "Leonidas", "Leroy", "Levi", "Lewis", "Liam", "Lincoln", "Lionel", "Logan", "London", "Lorenzo", "Louis", "Luca", "Lucas", "Lucca", "Lucian", "Luciano", "Luis", "Luka", "Lukas", "Luke", "Lyric", "Mack", "Madden", "Maddox", "Maison", "Major", "Makai", "Makhi", "Malachi", "Malakai", "Malaki", "Malcolm", "Malik", "Manuel", "Marc", "Marcel", "Marcelo", "Marco", "Marcos", "Marcus", "Mario", "Mark", "Markus", "Marlon", "Marquis", "Marshall", "Martin", "Marvin", "Masen", "Mason", "Mateo", "Mathew", "Mathias", "Matias", "Matteo", "Matthew", "Matthias", "Maurice", "Mauricio", "Maverick", "Max", "Maxim", "Maximilian", "Maximiliano", "Maximo", "Maximus", "Maxton", "Maxwell", "Mayson", "Mekhi", "Melvin", "Memphis", "Messiah", "Micah", "Michael", "Micheal", "Miguel", "Mike", "Miles", "Milo", "Misael", "Mitchell", "Mohamed", "Mohammad", "Mohammed", "Moises", "Morgan", "Myles", "Nash", "Nasir", "Nathan", "Nathanael", "Nathaniel", "Nehemiah", "Neil", "Nelson", "Neymar", "Nicholas", "Nickolas", "Nico", "Nicolas", "Niko", "Nikolai", "Nikolas", "Nixon", "Noah", "Noe", "Noel", "Nolan", "Oakley", "Odin", "Oliver", "Omar", "Omari", "Orion", "Orlando", "Oscar", "Osvaldo", "Otto", "Owen", "Pablo", "Parker", "Patrick", "Paul", "Paxton", "Payton", "Pedro", "Peter", "Peyton", "Philip", "Phillip", "Phoenix", "Pierce", "Porter", "Preston", "Prince", "Princeton", "Quentin", "Quincy", "Quinn", "Quintin", "Quinton", "Rafael", "Raiden", "Ramiro", "Ramon", "Randall", "Randy", "Raphael", "Rashad", "Raul", "Ray", "Rayan", "Rayden", "Raylan", "Raymond", "Reagan", "Reece", "Reed", "Reese", "Reginald", "Reid", "Remington", "Remy", "Rene", "Reuben", "Rex", "Rey", "Rhett", "Rhys", "Ricardo", "Richard", "Ricky", "Riley", "River", "Robert", "Roberto", "Rocco", "Roderick", "Rodney", "Rodolfo", "Rodrigo", "Rogelio", "Roger", "Rohan", "Roland", "Rolando", "Roman", "Romeo", "Ronald", "Ronan", "Ronin", "Ronnie", "Rory", "Ross", "Rowan", "Rowen", "Roy", "Royce", "Ruben", "Rudy", "Russell", "Ryan", "Ryder", "Ryker", "Rylan", "Ryland", "Rylee", "Rylen", "Sage", "Sam", "Samson", "Samuel", "Saul", "Sawyer", "Scott", "Seamus", "Sean", "Sebastian", "Semaj", "Sergio", "Seth", "Shane", "Shaun", "Shawn", "Sheldon", "Sidney", "Silas", "Simeon", "Simon", "Sincere", "Skylar", "Skyler", "Solomon", "Sonny", "Soren", "Spencer", "Stanley", "Stefan", "Stephen", "Sterling", "Steve", "Steven", "Sullivan", "Sylas", "Talon", "Tanner", "Tate", "Tatum", "Taylor", "Teagan", "Terrance", "Terrell", "Terrence", "Terry", "Thaddeus", "Theo", "Theodore", "Thiago", "Thomas", "Timothy", "Titan", "Titus", "Tobias", "Toby", "Todd", "Tomas", "Tommy", "Tony", "Trace", "Travis", "Trent", "Trenton", "Trevon", "Trevor", "Trey", "Tripp", "Tristan", "Tristen", "Tristian", "Tristin", "Triston", "Troy", "Truman", "Trystan", "Tucker", "Turner", "Ty", "Tyler", "Tyree", "Tyrell", "Tyrone", "Tyson", "Ulises", "Uriah", "Uriel", "Urijah", "Valentin", "Valentino", "Van", "Vance", "Vaughn", "Vicente", "Victor", "Vihaan", "Vincent", "Vincenzo", "Wade", "Walker", "Walter", "Warren", "Waylon", "Wayne", "Wesley", "Westin", "Weston", "Will", "William", "Willie", "Wilson", "Winston", "Wyatt", "Xander", "Xavi", "Xavier", "Xzavier", "Yael", "Yahir", "Yandel", "Yehuda", "Yosef", "Yousef", "Yusuf", "Zachariah", "Zachary", "Zackary", "Zaid", "Zaiden", "Zain", "Zaire", "Zander", "Zane", "Zavier", "Zayden", "Zayne", "Zechariah", "Zeke", "Zion"];
                $lastNames   = ["Adams", "Allen", "Anderson", "Andrews", "Armstrong", "Atkinson", "Austin", "Bailey", "Baker", "Ball", "Barker", "Barnes", "Barrett", "Bates", "Baxter", "Bell", "Bennett", "Berry", "Black", "Booth", "Bradley", "Brooks", "Brown", "Burke", "Burns", "Burton", "Butler", "Byrne", "Campbell", "Carr", "Carter", "Chambers", "Chapman", "Clark", "Clarke", "Cole", "Collins", "Cook", "Cooke", "Cooper", "Cox", "Cunningham", "Davidson", "Davies", "Davis", "Dawson", "Day", "Dean", "Dixon", "Doyle", "Duncan", "Edwards", "Elliott", "Ellis", "Evans", "Fisher", "Fletcher", "Foster", "Fox", "Francis", "Fraser", "Gallagher", "Gardner", "George", "Gibson", "Gill", "Gordon", "Graham", "Grant", "Gray", "Green", "Griffiths", "Hall", "Hamilton", "Harper", "Harris", "Harrison", "Hart", "Harvey", "Hawkins", "Hayes", "Henderson", "Hill", "Holland", "Holmes", "Hopkins", "Houghton", "Howard", "Hudson", "Hughes", "Hunt", "Hunter", "Hussain", "Jackson", "James", "Jenkins", "John", "Johnson", "Johnston", "Jones", "Jordan", "Kaur", "Kelly", "Kennedy", "Khan", "King", "Knight", "Lane", "Lawrence", "Lawson", "Lee", "Lewis", "Lloyd", "Lowe", "Macdonald", "Marsh", "Marshall", "Martin", "Mason", "Matthews", "May", "Mccarthy", "Mcdonald", "Miller", "Mills", "Mitchell", "Moore", "Morgan", "Morris", "Moss", "Murphy", "Murray", "Newman", "Nicholson", "Owen", "Palmer", "Parker", "Parry", "Patel", "Pearce", "Pearson", "Perry", "Phillips", "Poole", "Porter", "Powell", "Price", "Read", "Rees", "Reid", "Reynolds", "Richards", "Richardson", "Riley", "Roberts", "Robertson", "Robinson", "Rogers", "Rose", "Ross", "Russell", "Ryan", "Saunders", "Scott", "Sharp", "Shaw", "Simpson", "Smith", "Spencer", "Stevens", "Stewart", "Stone", "Sutton", "Taylor", "Thomas", "Thompson", "Thomson", "Turner", "Walker", "Wallace", "Walsh", "Ward", "Watson", "Watts", "Webb", "Wells", "West", "White", "Wilkinson", "Williams", "Williamson", "Willis", "Wilson", "Wood", "Woods", "Wright", "Young", "Abbott", "Acevedo", "Acosta", "Adams", "Adkins", "Aguilar", "Aguirre", "Albert", "Alexander", "Alford", "Allen", "Allison", "Alston", "Anderson", "Andrews", "Anthony", "Armstrong", "Arnold", "Ashley", "Atkins", "Atkinson", "Austin", "Avery", "Avila", "Ayala", "Ayers", "Bailey", "Baird", "Baker", "Baldwin", "Ball", "Ballard", "Banks", "Barber", "Barker", "Barlow", "Barnes", "Barnett", "Barr", "Barrera", "Barrett", "Barron", "Barry", "Bartlett", "Barton", "Bass", "Bates", "Battle", "Bauer", "Baxter", "Beach", "Bean", "Beard", "Beasley", "Beck", "Becker", "Bell", "Bender", "Benjamin", "Bennett", "Benson", "Bentley", "Benton", "Berg", "Berger", "Bernard", "Berry", "Best", "Bird", "Bishop", "Black", "Blackburn", "Blackwell", "Blair", "Blake", "Blanchard", "Blankenship", "Blevins", "Bolton", "Bond", "Bonner", "Booker", "Boone", "Booth", "Bowen", "Bowers", "Bowman", "Boyd", "Boyer", "Boyle", "Bradford", "Bradley", "Bradshaw", "Brady", "Branch", "Bray", "Brennan", "Brewer", "Bridges", "Briggs", "Bright", "Britt", "Brock", "Brooks", "Brown", "Browning", "Bruce", "Bryan", "Bryant", "Buchanan", "Buck", "Buckley", "Buckner", "Bullock", "Burch", "Burgess", "Burke", "Burks", "Burnett", "Burns", "Burris", "Burt", "Burton", "Bush", "Butler", "Byers", "Byrd", "Cabrera", "Cain", "Calderon", "Caldwell", "Calhoun", "Callahan", "Camacho", "Cameron", "Campbell", "Campos", "Cannon", "Cantrell", "Cantu", "Cardenas", "Carey", "Carlson", "Carney", "Carpenter", "Carr", "Carrillo", "Carroll", "Carson", "Carter", "Carver", "Case", "Casey", "Cash", "Castaneda", "Castillo", "Castro", "Cervantes", "Chambers", "Chan", "Chandler", "Chaney", "Chang", "Chapman", "Charles", "Chase", "Chavez", "Chen", "Cherry", "Christensen", "Christian", "Church", "Clark", "Clarke", "Clay", "Clayton", "Clements", "Clemons", "Cleveland", "Cline", "Cobb", "Cochran", "Coffey", "Cohen", "Cole", "Coleman", "Collier", "Collins", "Colon", "Combs", "Compton", "Conley", "Conner", "Conrad", "Contreras", "Conway", "Cook", "Cooke", "Cooley", "Cooper", "Copeland", "Cortez", "Cote", "Cotton", "Cox", "Craft", "Craig", "Crane", "Crawford", "Crosby", "Cross", "Cruz", "Cummings", "Cunningham", "Curry", "Curtis", "Dale", "Dalton", "Daniel", "Daniels", "Daugherty", "Davenport", "David", "Davidson", "Davis", "Dawson", "Day", "Dean", "Decker", "Dejesus", "Delacruz", "Delaney", "Deleon", "Delgado", "Dennis", "Diaz", "Dickerson", "Dickson", "Dillard", "Dillon", "Dixon", "Dodson", "Dominguez", "Donaldson", "Donovan", "Dorsey", "Dotson", "Douglas", "Downs", "Doyle", "Drake", "Dudley", "Duffy", "Duke", "Duncan", "Dunlap", "Dunn", "Duran", "Durham", "Dyer", "Eaton", "Edwards", "Elliott", "Ellis", "Ellison", "Emerson", "England", "English", "Erickson", "Espinoza", "Estes", "Estrada", "Evans", "Everett", "Ewing", "Farley", "Farmer", "Farrell", "Faulkner", "Ferguson", "Fernandez", "Ferrell", "Fields", "Figueroa", "Finch", "Finley", "Fischer", "Fisher", "Fitzgerald", "Fitzpatrick", "Fleming", "Fletcher", "Flores", "Flowers", "Floyd", "Flynn", "Foley", "Forbes", "Ford", "Foreman", "Foster", "Fowler", "Fox", "Francis", "Franco", "Frank", "Franklin", "Franks", "Frazier", "Frederick", "Freeman", "French", "Frost", "Fry", "Frye", "Fuentes", "Fuller", "Fulton", "Gaines", "Gallagher", "Gallegos", "Galloway", "Gamble", "Garcia", "Gardner", "Garner", "Garrett", "Garrison", "Garza", "Gates", "Gay", "Gentry", "George", "Gibbs", "Gibson", "Gilbert", "Giles", "Gill", "Gillespie", "Gilliam", "Gilmore", "Glass", "Glenn", "Glover", "Goff", "Golden", "Gomez", "Gonzales", "Gonzalez", "Good", "Goodman", "Goodwin", "Gordon", "Gould", "Graham", "Grant", "Graves", "Gray", "Green", "Greene", "Greer", "Gregory", "Griffin", "Griffith", "Grimes", "Gross", "Guerra", "Guerrero", "Guthrie", "Gutierrez", "Guy", "Guzman", "Hahn", "Hale", "Haley", "Hall", "Hamilton", "Hammond", "Hampton", "Hancock", "Haney", "Hansen", "Hanson", "Hardin", "Harding", "Hardy", "Harmon", "Harper", "Harrell", "Harrington", "Harris", "Harrison", "Hart", "Hartman", "Harvey", "Hatfield", "Hawkins", "Hayden", "Hayes", "Haynes", "Hays", "Head", "Heath", "Hebert", "Henderson", "Hendricks", "Hendrix", "Henry", "Hensley", "Henson", "Herman", "Hernandez", "Herrera", "Herring", "Hess", "Hester", "Hewitt", "Hickman", "Hicks", "Higgins", "Hill", "Hines", "Hinton", "Hobbs", "Hodge", "Hodges", "Hoffman", "Hogan", "Holcomb", "Holden", "Holder", "Holland", "Holloway", "Holman", "Holmes", "Holt", "Hood", "Hooper", "Hoover", "Hopkins", "Hopper", "Horn", "Horne", "Horton", "House", "Houston", "Howard", "Howe", "Howell", "Hubbard", "Huber", "Hudson", "Huff", "Huffman", "Hughes", "Hull", "Humphrey", "Hunt", "Hunter", "Hurley", "Hurst", "Hutchinson", "Hyde", "Ingram", "Irwin", "Jackson", "Jacobs", "Jacobson", "James", "Jarvis", "Jefferson", "Jenkins", "Jennings", "Jensen", "Jimenez", "Johns", "Johnson", "Johnston", "Jones", "Jordan", "Joseph", "Joyce", "Joyner", "Juarez", "Justice", "Kane", "Kaufman", "Keith", "Keller", "Kelley", "Kelly", "Kemp", "Kennedy", "Kent", "Kerr", "Key", "Kidd", "Kim", "King", "Kinney", "Kirby", "Kirk", "Kirkland", "Klein", "Kline", "Knapp", "Knight", "Knowles", "Knox", "Koch", "Kramer", "Lamb", "Lambert", "Lancaster", "Landry", "Lane", "Lang", "Langley", "Lara", "Larsen", "Larson", "Lawrence", "Lawson", "Leach", "Leblanc", "Lee", "Leon", "Leonard", "Lester", "Levine", "Levy", "Lewis", "Lindsay", "Lindsey", "Little", "Livingston", "Lloyd", "Logan", "Long", "Lopez", "Lott", "Love", "Lowe", "Lowery", "Lucas", "Luna", "Lynch", "Lynn", "Lyons", "Macdonald", "Macias", "Mack", "Madden", "Maddox", "Maldonado", "Malone", "Mann", "Manning", "Marks", "Marquez", "Marsh", "Marshall", "Martin", "Martinez", "Mason", "Massey", "Mathews", "Mathis", "Matthews", "Maxwell", "May", "Mayer", "Maynard", "Mayo", "Mays", "Mcbride", "Mccall", "Mccarthy", "Mccarty", "Mcclain", "Mcclure", "Mcconnell", "Mccormick", "Mccoy", "Mccray", "Mccullough", "Mcdaniel", "Mcdonald", "Mcdowell", "Mcfadden", "Mcfarland", "Mcgee", "Mcgowan", "Mcguire", "Mcintosh", "Mcintyre", "Mckay", "Mckee", "Mckenzie", "Mckinney", "Mcknight", "Mclaughlin", "Mclean", "Mcleod", "Mcmahon", "Mcmillan", "Mcneil", "Mcpherson", "Meadows", "Medina", "Mejia", "Melendez", "Melton", "Mendez", "Mendoza", "Mercado", "Mercer", "Merrill", "Merritt", "Meyer", "Meyers", "Michael", "Middleton", "Miles", "Miller", "Mills", "Miranda", "Mitchell", "Molina", "Monroe", "Montgomery", "Montoya", "Moody", "Moon", "Mooney", "Moore", "Morales", "Moran", "Moreno", "Morgan", "Morin", "Morris", "Morrison", "Morrow", "Morse", "Morton", "Moses", "Mosley", "Moss", "Mueller", "Mullen", "Mullins", "Munoz", "Murphy", "Murray", "Myers", "Nash", "Navarro", "Neal", "Nelson", "Newman", "Newton", "Nguyen", "Nichols", "Nicholson", "Nielsen", "Nieves", "Nixon", "Noble", "Noel", "Nolan", "Norman", "Norris", "Norton", "Nunez", "O'brien", "O'connor", "O'donnell", "O'neal", "O'neil", "O'neill", "Ochoa", "Odom", "Oliver", "Olsen", "Olson", "Orr", "Ortega", "Ortiz", "Osborn", "Osborne", "Owen", "Owens", "Pace", "Pacheco", "Padilla", "Page", "Palmer", "Park", "Parker", "Parks", "Parrish", "Parsons", "Pate", "Patel", "Patrick", "Patterson", "Patton", "Paul", "Payne", "Pearson", "Peck", "Pena", "Pennington", "Perez", "Perkins", "Perry", "Peters", "Petersen", "Peterson", "Petty", "Phelps", "Phillips", "Pickett", "Pierce", "Pittman", "Pitts", "Pollard", "Poole", "Pope", "Porter", "Potter", "Potts", "Powell", "Powers", "Pratt", "Preston", "Price", "Prince", "Pruitt", "Puckett", "Pugh", "Quinn", "Ramirez", "Ramos", "Ramsey", "Randall", "Randolph", "Rasmussen", "Ratliff", "Ray", "Raymond", "Reed", "Reese", "Reeves", "Reid", "Reilly", "Reyes", "Reynolds", "Rhodes", "Rice", "Rich", "Richard", "Richards", "Richardson", "Richmond", "Riddle", "Riggs", "Riley", "Rios", "Rivas", "Rivera", "Rivers", "Roach", "Robbins", "Roberson", "Roberts", "Robertson", "Robinson", "Robles", "Rodgers", "Rodriguez", "Rodriquez", "Rogers", "Rojas", "Rollins", "Roman", "Romero", "Rosa", "Rosales", "Rosario", "Rose", "Ross", "Roth", "Rowe", "Rowland", "Roy", "Ruiz", "Rush", "Russell", "Russo", "Rutledge", "Ryan", "Salas", "Salazar", "Salinas", "Sampson", "Sanchez", "Sanders", "Sandoval", "Sanford", "Santana", "Santiago", "Santos", "Sargent", "Saunders", "Savage", "Sawyer", "Schmidt", "Schneider", "Schroeder", "Schultz", "Schwartz", "Scott", "Sears", "Sellers", "Serrano", "Sexton", "Shaffer", "Shannon", "Sharp", "Sharpe", "Shaw", "Shelton", "Shepard", "Shepherd", "Sheppard", "Sherman", "Shields", "Short", "Silva", "Simmons", "Simon", "Simpson", "Sims", "Singleton", "Skinner", "Slater", "Sloan", "Small", "Smith", "Snider", "Snow", "Snyder", "Solis", "Solomon", "Sosa", "Soto", "Sparks", "Spears", "Spence", "Spencer", "Stafford", "Stanley", "Stanton", "Stark", "Steele", "Stein", "Stephens", "Stephenson", "Stevens", "Stevenson", "Stewart", "Stokes", "Stone", "Stout", "Strickland", "Strong", "Stuart", "Suarez", "Sullivan", "Summers", "Sutton", "Swanson", "Sweeney", "Sweet", "Sykes", "Talley", "Tanner", "Tate", "Taylor", "Terrell", "Terry", "Thomas", "Thompson", "Thornton", "Tillman", "Todd", "Torres", "Townsend", "Tran", "Travis", "Trevino", "Trujillo", "Tucker", "Turner", "Tyler", "Tyson", "Underwood", "Valencia", "Valentine", "Valenzuela", "Vance", "Vargas", "Vasquez", "Vaughan", "Vaughn", "Vazquez", "Vega", "Vincent", "Vinson", "Wade", "Wagner", "Walker", "Wall", "Wallace", "Waller", "Walls", "Walsh", "Walter", "Walters", "Walton", "Ward", "Ware", "Warner", "Warren", "Washington", "Waters", "Watkins", "Watson", "Watts", "Weaver", "Webb", "Weber", "Webster", "Weeks", "Weiss", "Welch", "Wells", "West", "Wheeler", "Whitaker", "White", "Whitehead", "Whitfield", "Whitley", "Whitney", "Wiggins", "Wilcox", "Wilder", "Wiley", "Wilkerson", "Wilkins", "Wilkinson", "William", "Williams", "Williamson", "Willis", "Wilson", "Winters", "Wise", "Witt", "Wolf", "Wolfe", "Wong", "Wood", "Woodard", "Woods", "Woodward", "Wooten", "Workman", "Wright", "Wyatt", "Wynn", "Yang", "Yates", "York", "Young", "Zamora", "Zimmerman"];
                break;
            // default:
            //     # code...
            //     break;
        }

        // if ($sex)
        // {
        //     $firstNames = $namesMale;
        // }
        // else
        // {
        //     $firstNames = $namesFemale;
        // }

        $firstNames = ($sex) ? $namesMale : $namesFemale;

        $rnd   = rand(0, count($firstNames) - 1);
        $rnd1  = rand(0, count($lastNames) - 1);

        $name[] = $firstNames[$rnd];
        $name[] = $lastNames[$rnd1];

        return $name;
    }
}
