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
        switch (strtolower($role)) {
            case 'top':
                return 'TOP';
                break;
            case 'jng':
                return 'JNG';
                break;
            case 'mid':
                return 'MID';
                break;
            case 'adc':
                return 'ADC';
                break;
            case 'sup':
                return 'SUP';
                break;
        }
    }
    public static function formatteRoleFull($role)
    {
        switch (strtolower($role)) {
            case 'top':
                return 'Topo';
                break;
            case 'jng':
                return 'Selva';
                break;
            case 'mid':
                return 'Meio';
                break;
            case 'adc':
                return 'Atirador';
                break;
            case 'sup':
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



    public static function getNameAndSex($sex, $lang)
    {
        $namesMale   = '';
        $namesFemale = '';
        $lastNames   = '';

        switch ($lang) {
            case 'AR':
            case 'BO':
            case 'CL':
            case 'CO':
            case 'CR':
            case 'CU':
            case 'SV':
            case 'ES':
            case 'EC':
            case 'GT':
            case 'GQ':
            case 'HN':
            case 'MX':
            case 'NI':
            case 'PA':
            case 'PY':
            case 'PE':
            case 'DO':
            case 'UY':
            case 'VE':
                $namesFemale = ["Abril", "Adara", "Adriana", "Africa", "Aida", "Aina", "Ainara", "Ainhoa", "Ainoa", "Aitana", "Alba", "Alba Maria", "Alejandra", "Alexia", "Alicia", "Alma", "Almudena", "Amaia", "Amanda", "Amira", "Ana", "Ana Belen", "Ana Isabel", "Ana Maria", "Andrea", "Ane", "Angela", "Anna", "Antia", "Ariadna", "Arlet", "Aroa", "Aya", "Azahara", "Barbara", "Beatriz", "Belen", "Berta", "Blanca", "Candela", "Carla", "Carlota", "Carmen", "Carmen Maria", "Carolina", "Cayetana", "Cecilia", "Celia", "Chloe", "Clara", "Claudia", "Cloe", "Cristina", "Daniela", "Desiree", "Diana", "Elena", "Elia", "Elisa", "Elsa", "Emma", "Erika", "Estefania", "Estela", "Esther", "Eva", "Eva Maria", "Fatima", "Gabriela", "Gala", "Gema", "Gemma", "Gisela", "Gloria", "Helena", "India", "Ines", "Ingrid", "Inmaculada", "Irati", "Irene", "Iria", "Iris", "Isabel", "Isabel Maria", "Isabella", "Itziar", "Izaro", "Jana", "Jennifer", "Jessica", "Jimena", "Judit", "Judith", "Julia", "Julieta", "June", "Laia", "Lara", "Laura", "Leire", "Leticia", "Leyre", "Lia", "Lidia", "Lina", "Lola", "Lorena", "Lucia", "Luna", "Lydia", "Maialen", "Maider", "Malak", "Manuela", "Mar", "Mara", "Maria", "Maria Del Carmen", "Maria Del Mar", "Maria Isabel", "Maria Jose", "Mariam", "Marina", "Mariona", "Marta", "Martina", "Mercedes", "Mia", "Mireia", "Mireya", "Miriam", "Monica", "Nadia", "Nahia", "Naia", "Naiara", "Naroa", "Natalia", "Nayara", "Nazaret", "Nerea", "Neus", "Noa", "Noelia", "Noemi", "Nora", "Nour", "Nuria", "Olga", "Olivia", "Ona", "Paloma", "Paola", "Patricia", "Paula", "Pilar", "Raquel", "Rebeca", "Rocio", "Rosa", "Ruth", "Salma", "Sandra", "Sara", "Saray", "Sheila", "Silvia", "Sofia", "Sonia", "Soraya", "Susana", "Tania", "Teresa", "Triana", "Uxia", "Uxue", "Valentina", "Valeria", "Vanesa", "Vanessa", "Vega", "Vera", "Veronica", "Victoria", "Virginia", "Yaiza", "Yanira", "Yasmin", "Yasmina", "Yolanda", "Zaira", "Zoe"];
                $namesMale = ["Aaron", "Abel", "Abraham", "Abril", "Adam", "Adan", "Adria", "Adrian", "Agustin", "Aimar", "Aitor", "Alan", "Albert", "Alberto", "Aleix", "Alejandro", "Alfonso", "Alonso", "Alvaro", "Amir", "Ander", "Andres", "Angel", "Antonio", "Antonio Jesus", "Antonio Jose", "Aritz", "Arnau", "Arturo", "Asier", "Axel", "Biel", "Borja", "Brais", "Bruno", "Carles", "Carlos", "Cesar", "Christian", "Cristian", "Daniel", "Dario", "David", "Denis", "Diego", "Dylan", "Edgar", "Eduardo", "Elias", "Eloy", "Emilio", "Eneko", "Enrique", "Enzo", "Eric", "Erik", "Fernando", "Ferran", "Francisco", "Francisco Javier", "Francisco Jose", "Gabriel", "Gael", "Gerard", "German", "Gonzalo", "Gorka", "Guillem", "Guillermo", "Hector", "Hugo", "Iñigo", "Iago", "Ian", "Ibai", "Ignacio", "Iker", "Imran", "Isaac", "Ismael", "Israel", "Ivan", "Izan", "Jaime", "Jairo", "Jan", "Jaume", "Javier", "Jesus", "Joan", "Joaquin", "Joel", "Jon", "Jonathan", "Jordi", "Jorge", "Jose", "Jose Angel", "Jose Antonio", "Jose Carlos", "Jose Luis", "Jose Manuel", "Jose Maria", "Jose Miguel", "Josep", "Juan", "Juan Antonio", "Juan Carlos", "Juan Francisco", "Juan Jose", "Juan Manuel", "Julen", "Julian", "Julio", "Kevin", "Leo", "Liam", "Luca", "Lucas", "Luis", "Luis Miguel", "Luka", "Manuel", "Marc", "Marco", "Marcos", "Mario", "Markel", "Marti", "Martin", "Mateo", "Matias", "Mauro", "Miguel", "Miguel Angel", "Mikel", "Miquel", "Mohamed", "Moises", "Neizan", "Nicolas", "Nil", "Noah", "Oier", "Oliver", "Omar", "Oriol", "Oscar", "Pablo", "Pau", "Pedro", "Pol", "Rafael", "Ramon", "Raul", "Rayan", "Ricardo", "Roberto", "Rodrigo", "Roger", "Ruben", "Salvador", "Samuel", "Santiago", "Saul", "Sebastian", "Sergi", "Sergio", "Teo", "Thiago", "Tomas", "Unai", "Vicente", "Victor", "Xabier", "Xavier", "Yago", "Yeray", "Youssef"];
                $lastNames = ["Álvarez", "Ávila", "Abad", "Abarquero", "Acin", "Aisa", "Alameda", "Albacete", "Alcaide", "Alcalde", "Alférez", "Alguacil", "Alonso", "Anglés", "Arán", "Aragón", "Aragonés", "Aranda", "Ariza", "Arriaga", "Arroyo", "Artigas", "Ascaso", "Avilés", "Ayerbe", "Bacque", "Bailén", "Balderas", "Ballester", "Ballesteros", "Barbero", "Barceló", "Batanero", "Baztán", "Benítez", "Bermúdez", "Bescós", "Biel", "Bielsa", "Biescas", "Bilbao", "Blázquez", "Bolívar", "Bolea", "Borobia", "Botero", "Briones", "Burgos", "Caballero", "Camarero", "Canales", "Cantero", "Capitán", "Carbonero", "Cardenal", "Carnicer", "Carnicero", "Carpenter", "Carpentier", "Carpintero Charpentier", "Carranza", "Carreiro", "Carretero", "Castañeda", "Castejón", "Castellano", "Castillero", "Castrillón", "Catalá", "Catalán", "Cedillo", "Cerecero", "Charpantier", "Cherro", "Chistau", "Colina", "Coll", "Collado", "Conde", "Conejero", "Contador", "Coronel", "Corredor", "Costa", "Criado", "Cuéllar", "Cubero", "Cueva", "Cuevas", "Dávila", "Díaz", "Díez", "Domínguez", "Duque", "Durán", "Enríquez", "Escribano", "Escrivá", "Escudero", "España", "Esparraguera", "Fernández", "Ferrón", "Ferrandis", "Ferreira", "Ferreiro", "Ferrer", "Ferrero", "Ferrufino", "Fidalgo", "Fonz", "Fraile", "Fuster o Fusté", "Gállego", "Gálvez", "Gómez", "Gómez Gomis", "Gabasa", "Gallego", "García", "Giménez", "Gistaín", "González", "Guerrero", "Gutiérrez", "Halconero", "Hernández", "Herrera", "Herrero", "Hidalgo", "Hoyo", "Jiménez", "Juárez", "Jurado", "Lérida", "López", "Labrador", "Lago", "Lagos", "Laguna", "Leñero", "Ligüerre", "Linares", "Llopis", "Márquez", "Méndez", "Mínguez", "Madrid", "Malillos", "Mallén", "Marinero", "Marqués", "Martín", "Martínez", "Mayordomo", "Melero", "Menéndez", "Merino", "Mesonero", "Miguélez", "Moliner", "Molinero", "Monedero", "Monte", "Montemayor", "Montes", "Montilla", "Morata", "Moreno", "Morterero", "Muñoz", "Nápoles", "Núñez", "Navarra", "Navarro", "Notario", "Oñate", "Obrero", "Ocaña", "Olloqui", "Ordóñez", "Orellana", "Ortiz", "Ovejero", "Páez", "Pérez", "Padrón", "Pajarero", "Panadero", "Pastor", "Peña", "Pedrero", "Pena", "Peralta", "Peris", "Pescador", "Piedrabuena", "Prado", "Rabadán", "Rabellini", "Rabellino", "Racionero", "Ramírez", "Ramos", "Ravelino", "Rey", "Riba", "Rivera", "Rodríguez", "Romero", "Ruiz", "Sáenz", "Sánchez", "Sabaté", "Sabater", "Sacristán", "Sahagún", "Salazar", "Saldaña", "Sallent", "Sambuesa", "Sandoval", "Sangüesa", "Sanhueza", "Santander", "Santisteban", "Santolaria", "Sartori", "Sastre", "Señor", "Serrano", "Sevilla", "Siurana", "Soldado", "Soria", "Soriano", "Suárez", "Tarragona", "Teixidó", "Tejedor", "Tejero", "Toledano", "Toledo", "Torrente", "Torres", "Tudela", "Vázquez", "Vélez", "Vaca", "Val", "Valdés", "Valderas", "Valdovinos", "Valdueza", "Valenzuela", "Valladares", "Valle", "Valverde", "Vaquero", "Vargas", "Velázquez", "Verdugo", "Vergara", "Villalba", "Villalobos", "Villarreal", "Villegas", "Yáñez", "Zamorano", "Zanhuesa", "Zapatero", "Zaragoza", "de Herrera", "del Valle"];
                break;

            case 'KR':
            case 'JP':
            case 'CN':
                $namesFemale = $namesMale = ["Bai", "Cai", "Cao", "Chang", "Chen", "Cheng", "Cui", "Dai", "Deng", "Ding", "Dong", "Du", "Duan", "Fan", "Fang", "Feng", "Fu", "Gao", "Geng", "Gong", "Gu", "Guo", "Han", "Hao", "He", "Hou", "Hu", "Huang", "Huo", "Jia", "Jiang", "Jin", "Kang", "Kong", "Lai", "Lang", "Lei", "Li", "Lian", "Liang", "Liao", "Lin", "Liu", "Long", "Lu", "Luo", "Ma", "Mao", "Meng", "Mo", "Pan", "Peng", "Qian", "Qiao", "Qin", "Qiu", "Quan", "Ren", "Shao", "Shen", "Shi", "Song", "Su", "Sun", "Tan", "Tang", "Tao", "Teng", "Tian", "Wan", "Wang", "Wei", "Wen", "Wu", "Xia", "Xian", "Xiang", "Xiao", "Xie", "Xing", "Xiong", "Xu", "Xuan", "Xue", "Xun", "Yan", "Yang", "Yao", "Ye", "Yi", "Yin", "Yu", "Yuan", "Zeng", "Zhan", "Zhang", "Zhao", "Zhen", "Zheng", "Zhong", "Zhou", "Zhu", "Zhuan", "Zi", "Zou", "Ae", "Ah", "An", "Ch'a", "Ch'ae", "Ch'ang", "Ch'o", "Ch'oe", "Ch'on", "Ch'u", "Cha", "Chang", "Changgok", "Che", "Chegal", "Chi", "Chin", "Cho", "Chom", "Chon", "Chong", "Chu", "Chun", "Chung", "Chup", "Chwa", "Eoh", "Ha", "Hae", "Hak", "Ham", "Han", "Ho", "Hong", "Hu", "Hung", "Hwa", "Hwan", "Hwang", "Hwangbo", "Hyon", "Hyong", "Im", "In", "Ka", "Kae", "Kal", "Kam", "Kan", "Kang", "Kangjon", "Ki", "Kil", "Kim", "Ko", "Kok", "Kong", "Ku", "Kuk", "Kum", "Kun", "Kung", "Kwak", "Kwok", "Kwon", "Kye", "Kyo", "Kyon", "Kyong", "Ma", "Mae", "Maeng", "Man", "Mangjol", "Mi", "Min", "Mo", "Mok", "Muk", "Mun", "Myo", "Myong", "Na", "Nae", "Nam", "Namgung", "Nan", "Nang", "No", "Noe", "Nu", "Ogum", "Oh", "Ok", "Om", "On", "Ong", "P'aeng", "P'an", "P'i", "P'il", "P'o", "P'ung", "P'yo", "P'yon", "P'yong", "Pae", "Paek", "Pak", "Pan", "Pang", "Pi", "Pin", "Ping", "Pok", "Pom", "Pong", "Pu", "Pyon", "Ra", "Ran", "Rang", "Ri", "Rim", "Ro", "Roe", "Ru", "Ryang", "Ryo", "Ryom", "Ryon", "Ryong", "Ryu", "Ryuk", "Sa", "Sagong", "Sam", "Sang", "Si", "Sim", "Sin", "Sip", "So", "Sobong", "Sok", "Sol", "Somun", "Son", "Song", "Sonu", "Sop", "Su", "Sun", "Sung", "T'ae", "T'ak", "T'an", "Tae", "Tam", "Tan", "Tang", "To", "Tokko", "Ton", "Tong", "Tongbang", "Tu", "Uh", "Um", "Un", "Wang", "Wi", "Won", "Wu", "Ya", "Yang", "Ye", "Yi", "Yo", "Yom", "Yon", "Yong", "Yop", "Yu", "Yuk", "Yun"];
                $lastNames = ["Ah", "Ai", "An", "Bai", "Bao", "Bi", "Bo", "Cai", "Chan", "Chang", "Chao", "Chen", "Cheng", "Chin", "Chun", "Cui", "Da", "Dai", "Dan", "Delan", "Fang", "Fen", "Feng", "Fu", "Gengxin", "Guanting", "Guanyu", "Guiying", "Guo", "Hai", "Hanying", "He", "Heng", "Hong", "Hua", "Huan", "Huang", "Hui", "Huo", "Jia", "Jian", "Jiang", "Jiao", "Jie", "Jin", "Jing", "Jingyi", "Ju", "Juan", "Jun", "Kun", "Lan", "Lei", "Li", "Lian", "Lim", "Lin", "Ling", "Lingxin", "Liuxian", "Luoyang", "Mei", "Min", "Ming", "My", "Na", "Ning", "Nuan", "Ping", "Qigang", "Qing", "Qiu", "Rong", "Ru", "Ruogang", "Shi", "Shu", "Shufen", "Shui", "Shun", "Shuren", "Su", "Tai", "Tu", "Wei", "Wen", "Wu", "Wuhan", "Wuying", "Xia", "Xiang", "Xieren", "Xinya", "Xinyi", "Xinyue", "Xiu", "Xiulan", "Xiuying", "Xuefeng", "Xuegang", "Xun", "Ya", "Yahui", "Yaling", "Yan", "Yang", "Yating", "Yawen", "Yazhu", "Yi", "Yijun", "Yimu", "Yong", "Yu", "Yuhan", "Yun", "Zan", "Zedong", "Zemin", "Zexi", "Zexian", "Zhelan", "Zhen", "ZhenKang", "Zheng", "Zhenya", "Zhi", "Zhihao", "Zhong", "Zhou", "Bae", "Byeong-Cheol", "Byeong-Ho", "Byung-Chul", "Byung-Ho", "Byung-Hoon", "Chang-Min", "Chang-Woo", "Chi-Hun", "Chi-Won", "Chihu", "Chihun", "Chin-Ho", "Chong-Ho", "Chong-Hun", "Chong-Su", "Chong-Yol", "Chul-Soo", "Chun-Ho", "Chun-Yong", "Chung-Hee", "Chung-Ho", "Chunho", "Chunso", "Chunyong", "Chuwon", "Dae-Ho", "Dae-Hyun", "Dae-Jung", "Dae-Won", "Do-Hyeon", "Do-Hyun", "Do-Yeon", "Dong-Gun", "Dong-Hyeon", "Dong-Hyun", "Dong-Jun", "Dong-Min", "Dong-Sun", "Dong-Wook", "Du-Ho", "Duck-Young", "Eun-Soo", "Geon-U", "Gun", "Gyeong-Su", "Ha-Sun", "Hae-Il", "Hae-Seong", "Hee-Chul", "Ho-Jin", "Ho-Sung", "Hoon", "Hyeon-Jun", "Hyeon-U", "Hyo", "Hyon-U", "Hyonjun", "Hyonu", "Hyuk", "Hyun", "Hyun-Jun", "Hyun-Ki", "Hyun-Seok", "Hyun-Shik", "Hyun-Su", "Hyun-Woo", "Hyung-Joon", "Il-Seong", "Il-Song", "Il-Sung", "In-Ho", "In-Su", "Ja-Kyung", "Jae", "Jae-Hui", "Jae-Hwa", "Jae-Sun", "Jae-Wook", "Jae-Yong", "Jeong-Ho", "Jeong-Hun", "Jeong-Mun", "Ji-Hae", "Ji-Hoon", "Ji-Hu", "Ji-Hun", "Ji-Tae", "Ji-Won", "Jin-Hee", "Jin-Ho", "Jin-Hwan", "Jin-Sang", "Jin-Young", "Jong-Soo", "Jong-Su", "Jong-Yeol", "Jong-Yul", "Joo-Won", "Joon-Ho", "Ju-Won", "Jun-Ho", "Jun-Seo", "Jun-Yeong", "Jun-Young", "Jung", "Jung-Eun", "Jung-Hee", "Jung-Ho", "Jung-Hoon", "Jung-Hwa", "Jung-Hwan", "Jung-Min", "Jung-Nam", "Jung-Su", "Jung-Woo", "Kang-Dae", "Ki-Nam", "Konu", "Kun-Woo", "Kwan", "Kwang", "Kwang-Ho", "Kwang-Hoon", "Kwang-Hyok", "Kwang-Hyun", "Kwang-Jo", "Kwang-Min", "Kwang-Seok", "Kwang-Seon", "Kwang-Su", "Kwang-Sun-", "Kyong-Su", "Kyu-Bok", "Kyu-Bong", "Kyung", "Kyung-Gu", "Kyung-Ho", "Kyung-Jae", "Kyung-Min", "Kyung-Mo", "Kyung-Sam", "Kyung-Soo", "Min-Gyu", "Min-Ho", "Min-Hyuk", "Min-Jae", "Min-Jun", "Min-Ki", "Min-Kyu", "Min-Kyung", "Min-Soo", "Min-Su", "Min'gyu", "Minjae", "Minjun", "Minsu", "Mun-Hee", "Myung-Dae", "Myung-Hee", "Myung-Ki", "Nam-Gi", "Nam-Il", "Nam-Kyu", "Nam-Seon", "Nam-Sun", "Pyong-Chol", "Pyong-Ho", "Sang-Chol", "Sang-Chul", "Sang-Hoon", "Sang-Hun", "Sang-Jun", "Sang-Ki", "Sang-Kyu", "Sang-Min", "Se-Yeon", "Se-Yoon", "Seo-Jun", "Seon", "Seong", "Seong-Gi", "Seong-Ho", "Seong-Hun", "Seong-Hyeon", "Seong-Jin", "Seong-Min", "Seong-Su", "Seung-Eun", "Seung-Gi", "Seung-Hee", "Seung-Heon", "Seung-Ho", "Seung-Hoon", "Seung-Hyeon", "Seung-Hyun", "Seung-Min", "Seung-Won", "Seung-Woo", "Shi-Won", "Shi-Woo", "Shin", "Shin-Il", "Shin-Young", "Si-U", "Si'u", "Sochun", "Song-Gi", "Song-Ho", "Song-Hun", "Song-Jin", "Song-Min", "Song-Su", "Songhyon", "Songmin", "Soo-Hyun", "Soo-Yeon", "Suk-Chul", "Sun-Woo", "Sung-Chul", "Sung-Ho", "Sung-Hoon", "Sung-Hyun", "Sung-Jin", "Sung-Ki", "Sung-Min", "Sung-Nam", "Sung-Soo", "Sunghyon", "Tae-Hee", "Tae-Hyun", "Tae-Won", "Tae-Woo", "Tae-Woong", "Tae-Yeon", "Tae-Young", "Tohyon", "Tong-Hyon", "Tonghyon", "U-Jin", "Ujin", "Woo-Jin", "Woo-Sung", "Ye-Jun", "Yejun", "Yeon-Seok", "Yeon-Woo", "Yeong-Cheol", "Yeong-Gi", "Yeong-Ho", "Yeong-Hwan", "Yeong-Jin", "Yeong-Sik", "Yeong-Su", "Yo-Han", "Yong-Chol", "Yong-Gi", "Yong-Ho", "Yong-Hwan", "Yong-Jin", "Yong-Joon", "Yong-Sik", "Yong-Sook", "Yong-Su", "Yong-Sun", "Young", "Young-Chul", "Young-Gi", "Young-Ho", "Young-Hwan", "Young-Il", "Young-Ja", "Young-Jae", "Young-Jin", "Young-Min", "Young-Nam", "Young-Nam-", "Young-Shik", "Young-Soo", "Young-Su", "Ae-Ra", "Ae-Ri", "Ae", "Ah-Hyun", "Ah-Joong", "Ah-Ra", "Bit-Na", "Bo-Hee", "Bo-Kyung", "Bo-Ra", "Bo-Young", "Bo-Yun", "Ch'un-Ja", "Chae-Young", "Chi-Hye", "Chi-U", "Chi-Un", "Chi-Yon", "Chi-Yong", "Chi'u", "Chi'un", "Chihye", "Chihyon", "Chimin", "Chiyong", "Chiyun", "Chong-Hui", "Chong-Ja", "Chong-Suk", "Chong-Sun", "Chun-Hwa", "Chun-Ja", "Chung-Ah", "Da-Bin", "Da-Hae", "Da-Hee", "Do-Yeon", "Doo-Na", "Eon-Jeong", "Eul-Dong", "Eun-Ah", "Eun-Bi", "Eun-Chae", "Eun-Gyung", "Eun-Ha", "Eun-Hee", "Eun-Hye", "Eun-Ji", "Eun-Jin", "Eun-Joo", "Eun-Ju", "Eun-Jung", "Eun-Kyeong", "Eun-Kyung", "Eun-Seo", "Eun-Song", "Eun-Soo", "Eun-Sook", "Eun-Young", "Eun", "Ga-In", "Ga-Yun", "Geum-Suk", "Geun-Young", "Go-Eun", "Gri-Na", "Ha-Eun", "Ha-Na", "Ha-Neul", "Ha-Sun", "Ha'un", "Hae-Sook", "Hae-Young", "Han-Bi", "Han-Byul", "Hee-Ae", "Hee-Bon", "Hee-Jin", "Hee-Ra", "Hee-Sun", "Hee-Yun", "Hee-Yung", "Ho-Jung", "Hwa-Young", "Hwi-Hyang", "Hye-Bin", "Hye-Gyo", "Hye-Ja", "Hye-Jin", "Hye-Jung", "Hye-Kyung", "Hye-Ok", "Hye-Rim", "Hye-Soo", "Hye-Sook", "Hye-Sun", "Hye-Young", "Hyejin", "Hyo-Jin", "Hyo-Joo", "Hyo-Ju", "Hyo-Jung", "Hyo-Ri", "Hyo-Rin", "Hyon-Jong", "Hyon-Ju", "Hyon-Suk", "Hyun-Ah", "Hyun-Joo", "Hyun-Ju", "Hyun-Jung", "Hyun-Sook", "In-Hye", "In-Sook", "In-Suk", "In-Young", "Ja-Hye", "Ja-Hyun", "Ja-Kyung", "Ja-Ok", "Jae-Yun", "Jeong-Ja", "Ji-Ae", "Ji-Eun", "Ji-Hae", "Ji-Hee", "Ji-Ho", "Ji-Hye", "Ji-Hyo", "Ji-Hyun", "Ji-Min", "Ji-Na", "Ji-Soo", "Ji-Su", "Ji-Sun", "Ji-Won", "Ji-Woo", "Ji-Yong", "Ji-Yoon", "Ji-Young", "Ji-Yun", "Ji-Yung", "Jin-Hee", "Jin-Ju", "Jin-Shil", "Jin-Young", "Jin-Yung", "Jin", "Jiyeon", "Joo-Eun", "Ju-Ah", "Ju-Hee", "Ju-Hyun", "Jung-Ah", "Jung-Ahn", "Jung-Eum", "Jung-Eun", "Jung-Hee", "Jung-Hwa", "Jung-Hyun", "Jung-Ok", "Jung-Soo", "Jung-Sook", "Jung-Soon", "Jung-Won", "Jung-Yoon", "Jung", "Kang-Hee", "Kyong-Hui", "Kyong-Ja", "Kyong-Ok", "Kyong-Suk", "Kyu-Ri", "Kyung-Hee", "Kyung-Ja", "Kyung-Jin", "Kyung-Min", "Kyung-Ok", "Kyung-Sook", "Li-Na", "Mi-Gyong", "Mi-Hyun", "Mi-Kyung", "Mi-Ri", "Mi-Ryung", "Mi-So", "Mi-Sook", "Mi-Suk", "Mi-Yeon", "Mi-Yong", "Mi-Young", "Mi-Yun", "Mi-Yung", "Min-Ah", "Min-Hee", "Min-Ji", "Min-Joo", "Min-Ju", "Min-Jung", "Min-Kyung", "Min-Seo", "Min-Sun", "Min-Yung", "Min", "Minji", "Minso", "Moon-Hee", "Myong-Suk", "Myung-Hee", "Myung-Sook", "Na-Rae", "Na-Woon", "Na-Young", "Nam-Joo", "Nam-Seon", "Nam-Sun", "Nara", "Ok-Bin", "Ok-Sook", "Ran", "Ri-Na", "Rim", "Ryu-Won", "Sa-Rang", "San-Ha", "Sang-Hee", "Se-Ah", "Se-Bin", "Se-Eun", "Se-Jung", "Se-Yeon", "Seo-Hee", "Seo-Hyeon", "Seo-Yeon", "Seo-Yun", "Seong-Eon", "Seong-Ja", "Seong", "Seul-Gi", "Seul-Ki", "Seung-Eun", "Seung-Hee", "Seung-Hyun", "Seung-Min", "Seung-Yun", "Shi-Eun", "Shi-Won", "Shin-Ae", "Shin-Hye", "Shin-Young", "Si-Yeon", "So-Hee", "So-Hyon", "So-Ra", "So-Ri", "So-Yeon", "So-Yi", "So-Young", "So-Yun", "So-Yung", "Sohyon", "Sol-Bi", "Sol-Mi", "Son-Ha", "Son-Yong", "Song-Hee", "Soo-Ah", "Soo-Hyun", "Soo-Jin", "Soo-Jung", "Soo-Kyung", "Soo-Yeon", "Sook-Ja", "Soon-Hee", "Soon-Ja", "Soyon", "Soyun", "Su-Bin", "Su-Hwa", "Su-Hyun", "Su-Ji", "Su-Jin", "Su-Jung", "Su-Mi", "Su-Min", "Su-Yun", "Su-Yung", "Subin", "Suh-Hyung", "Sujin", "Suk-Ja", "Sulgi", "Sun-Ah", "Sun-Hi", "Sun-Hwa", "Sun-Ja", "Sun-Jung", "Sun-Mi", "Sun-Young", "Sun-Yung", "Sun", "Sung-Eun", "Sung-Ryung", "Sung-Sook", "Sung-Yun", "Tae-Hee", "Tae-Ran", "Tae-Yeon", "Tae-Young", "Tae-Yun", "Tam-Hee", "Un-Gyong", "Un-Jong", "Un-Ju", "Un-Yong", "Unji", "Unso", "Won-Sook", "Woon-Kye", "Ye-Eun", "Ye-Hee", "Ye-Jin", "Ye-Seul", "Ye-Won", "Ye'un", "Yeh-Jin", "Yeo-Jin", "Yeo-Jung", "Yeo-Woon", "Yeon-Hee", "Yeon-Hong", "Yeon-Joo", "Yeon-Seo", "Yeon-Woo", "Yeong-Hee", "Yeong", "Yi-Hyun", "Yi-Jae", "Yi-Jin", "Yi", "Yo-Won", "Yong-Hui", "Yong-Ja", "Yong-Mi", "Yong-Suk", "Yoo-Jin", "Yoo-Mi", "Yoo-Ri", "Yoo-Sun", "Yoon-Ah", "Yoon-Hee", "Yoon-Ji", "Yoon-Jin", "Yoon-Jung", "Yoon-Mi", "Yoon-Sook", "Yoon-Young", "Young-Ae", "Young-Ah", "Young-Eun", "Young-Hee", "Young-Ja", "Young-Mi", "Young-Nam", "Young-Ok", "Young-Ran", "Young-Sook", "Yu-Jin", "Yu-Ni", "Yu-Ri", "Yujin", "Yun-Ji", "Yun-Ju", "Yun-Seo", "Yun-Soo", "Yung-Hee", "Yunso", "Akahito", "Akeno", "Aki", "Akihiro", "Akihisa", "Akihito", "Akikazu", "Akinari", "Akinori", "Akio", "Akio", "Akira", "Amane", "Anzai", "Arata", "Arinori", "Aritomo", "Ashihei", "Atasuke", "Atshushi", "Atsumichi", "Atsumori", "Atsutane", "Azumamaro", "Baiko", "Bairei", "Bakin", "Basho", "Benjiro", "Benkei", "Bokkai", "Botan", "Buncho", "Bunjiro", "Bunrakuken", "Bunzo", "Bussho", "Chikafusa", "Chikao", "Chiko", "Chojiro", "Chomei", "Chuichi", "Dai", "Daisetsu", "Daisuke", "Danjuro", "Danno", "Dayu", "Denbe", "Doi", "Dokuohtei", "Doppo", "Ebizo", "Eichi", "Eichiro", "Eien", "Eiichi", "Eiji", "Eijiro", "Eikichi", "Eisaku", "Eisen", "Eishi", "Eisuke", "Eitoku", "Eizan", "Eizo", "Ekiken", "Ennosuke", "Etsuya", "Fujimaro", "Fujio", "Fukusaburu", "Fumiaki", "Fumihiko", "Fumihiro", "Fumimaro", "Fumio", "Gaho", "Gekko", "Gempachi", "Gengyo", "Genichi", "Genjo", "Gennai", "Gennosuke", "Genpaku", "Gesshin", "Gidayu", "Gihei", "Giichi", "Gonkuro", "Gonshiro", "Goro", "Gyokusho", "Gyukudo", "Hachemon", "Hachigoro", "Hachiro", "Hajime", "Hakuseki", "Hanshiro", "Haranobu", "Haru", "Haru", "Haruhiko", "Haruhiro", "Haruki", "Haruko", "Harumi", "Harunobu", "Hayato", "Heihachiro", "Heiji", "Heikichi", "Heizo", "Hideaki", "Hidehira", "Hidekazu", "Hideki", "Hidemichi", "Hideo", "Hidetada", "Hidetora", "Hidetoshi", "Hidetsugu", "Hideyori", "Hideyoshi", "Higashikuni", "Hikaru", "Hikosaburo", "Hikozaemon", "Hiro", "Hiroaki", "Hirobumi", "Hirofumi", "Hiroharu", "Hirohisa", "Hiroji", "Hirokazu", "Hirokichi", "Hirokumi", "Hiroshi", "Hiroshige", "Hirotada", "Hirotaka", "Hirotsugu", "Hiroya", "Hiroyasu", "Hiroyuki", "Hisahsi", "Hisaki", "Hisamitsu", "Hisanobu", "Hisashi", "Hisato", "Hisayuki", "Hitomaro", "Hitoshi", "Hogai", "Hoitsu", "Hokichi", "Hokusai", "Honzo", "Horiuchi", "Hoshi", "Hoshiko", "Hyobe", "Hyosuke", "Hyotaru", "Ichibei", "Ichiro", "Ichisake", "Ichiyo", "Ichizo", "Iemitsu", "Iemochi", "Ienobu", "Iesada", "Ieshige", "Ietsuna", "Ieyasu", "Ieyoshi", "Ikemoto", "Ikki", "Ikku", "Inejiro", "Ippei", "Isamu", "Isao", "Isei", "Isoruko", "Isoshi", "Iwane", "Iwao", "Izo", "Izumo", "Jakuchu", "Jin", "Jinzaburo", "Jiro", "Jo", "Joben", "Joji", "Jomei", "Josuke", "Jotaro", "Jou", "Juichi", "Jun", "Junichi", "Junichiro", "Junji", "Junnosuke", "Junzo", "Juro", "Jurobei", "Juzaburo", "Juzo", "Kado", "Kadonomaro", "Kaemon", "Kafu", "Kagehisa", "Kagetoki", "Kageyasu", "Kaii", "Kakuei", "Kakuzo", "Kamatari", "Kamlyn", "Kan", "Kanbe", "Kane", "Kaneie", "Kanezane", "Kanjiro", "Kanko", "Kannon", "Kano", "Kansuke", "Kantaro", "Kanzaburo", "Kaori", "Kaoru", "Kata", "Katai", "Katsuhiko", "Katsuhito", "Katsumi", "Katsumoto", "Katsunan", "Katsunosuki", "Katsuyoshi", "Katsuyuki", "Katzumi", "Kawanari", "Kazu", "Kazuhiko", "Kazuhiro", "Kazuki", "Kazuko", "Kazuma", "Kazunori", "Kazuo", "Kazushi", "Kazushige", "Kazutoshi", "Kazuyuki", "Kei", "Keiji", "Keiki", "Keishi", "Keisuke", "Keita", "Keitaro", "Keizo", "Ken", "Kenichi", "Kenji", "Kenji", "Kenji", "Kenjiro", "Kenkichi", "Kenko", "Kensaku", "Kenshin", "Kentaro", "Kenzaburo", "Kenzan", "Kenzo", "Kichibei", "Kichisaburo", "Kiemon", "Kiichi", "Kijuro", "Kikaku", "Kikugoro", "Kikunojo", "Kimi", "Kiminobu", "Kimitada", "Kin", "Kingo", "Kinji", "Kinmochi", "Kinnojo", "Kinnosuke", "Kinzo", "Kioshi", "Kisho", "Kitahachi", "Kiyoemon", "Kiyohira", "Kiyohisa", "Kiyomasu", "Kiyomori", "Kiyonaga", "Kiyonobu", "Kiyonori", "Kiyoshi", "Kiyotaka", "Koan", "Kobo", "Koetsu", "Kohei", "Koichi", "Koin", "Koji", "Kojiro", "Kojuro", "Kokan", "Kokei", "Koki", "Kokushi", "Konosuke", "Konoye", "Konyo", "Korechika", "Korekiyo", "Korenaga", "Korin", "Koryusai", "Kosaku", "Kosami", "Koshiro", "Kosho", "Kotaro", "Koto", "Koyo", "Kozue", "Kuemon", "Kuma", "Kumanosuke", "Kuniaki", "Kunihiko", "Kunimatsu", "Kunimichi", "Kunio", "Kunisada", "Kunitaro", "Kuniyoshi", "Kuniyuki", "Kuri", "Kyoden", "Kyoichi", "Kyoji", "Kyoshi", "Kyuichi", "Kyushichi", "Kyuso", "Kyuwa", "Mabuchi", "Magobei", "Magohachi", "Makoto", "Mamoru", "Manabu", "Manobu", "Manzo", "Mareo", "Maresuke", "Marihito", "Maris", "Marise", "Maro", "Masaaki", "Masafumi", "Masaharu", "Masahide", "Masahiko", "Masahiro", "Masakado", "Masakazu", "Masaki", "Masami", "Masamichi", "Masamune", "Masanobu", "Masanori", "Masao", "Masaru", "Masashi", "Masashige", "Masatake", "Masato", "Masayoshi", "Masayuki", "Masazumi", "Mashai", "Mashashi", "Mashiro", "Masu", "Masuhiro", "Masujiro", "Masutaro", "Matabei", "Matashichi", "Matsu", "Matsudaira", "Matsuo", "Matsusuke", "Matsuta", "Matsuyo", "Meiji", "Michihiro", "Michinaga", "Michinori", "Michio", "Michizane", "Mieko", "Miki", "Mikio", "Minoru", "Misao", "Mito", "Mitsuharu", "Mitsuhide", "Mitsukuni", "Mitsunari", "Mitsuo", "Mitsuoki", "Mitsuzuka", "Miyazaki", "Miyoko", "Mobumasu", "Mochihito", "Mokichi", "Mokuami", "Momoru", "Montaro", "Monzaemon", "Morie", "Morihiro", "Morimasa", "Morio", "Moromao", "Moronobu", "Motoichi", "Motoki", "Motonobu", "Motoshige", "Mototsune", "Motoyasu", "Motoyuki", "Munemitsu", "Munemori", "Munenori", "Muneyaki", "Munoto", "Murai", "Mushanokoji", "Mutsohito", "Naganori", "Naizen", "Nakamaro", "Nakazo", "Namboku", "Nampo", "Naoaki", "Naofumi", "Naohiro", "Naoki", "Naoko", "Naomichi", "Naonobu", "Naosuke", "Naoya", "Naozane", "Narahiko", "Nariaki", "Nariakira", "Narihari", "Narihira", "Naruhiko", "Natsu", "Natsume", "Natsuo", "Nichiren", "Nikki", "Nikko", "Ninsei", "Niou", "Nissho", "Noboru", "Nobuatsu", "Nobuharu", "Nobuhiko", "Nobuhisa", "Nobuhito", "Nobukazu", "Nobuo", "Noburo", "Nobusuke", "Nobuyoki", "Nobuyori", "Nobuyoshi", "Nori", "Noriaki", "Norihide", "Norihisa", "Norinaga", "Norio", "Norishige", "Noritada", "Noritoshi", "Noriyori", "Noriyuki", "Norogumi", "Oda", "Ogai", "Okakura", "Okitsugu", "Okura", "Okyoito", "Omezo", "Oniji", "Orinosuke", "Osamu", "Otojiro", "Rai", "Raidon", "Razan", "Rei", "Reijiro", "Reizo", "Renjiro", "Renzo", "Rikiya", "Rikyu", "Ringo", "Rinji", "Rintaro", "Rkuemon", "Robun", "Roka", "Roku", "Rosanjin", "Ryo", "Ryobe", "Ryoichi", "Ryoko", "Ryoma", "Ryosei", "Ryozo", "Ryu", "Ryuichi", "Ryunosuke", "Ryushi", "Ryutaro", "Ryuzaburo", "Saburo", "Sachi", "Sachio", "Sadaharu", "Sadahige", "Sadakuno", "Sadanobu", "Sadao", "Sadatake", "Sadayoshi", "Saemon", "Saikaku", "Saionji", "Sakutaro", "Samba", "Saneatsu", "Sanetomo", "Sanjiro", "Sanjuro", "Sanraku", "Sanzo", "Satoru", "Satoshi", "Sawao", "Seibei", "Seiesnsui", "Seihachi", "Seiho", "Seiichi", "Seiji", "Seika", "Seiki", "Seinosuke", "Seiryo", "Seishiro", "Seishisai", "Seison", "Seitaro", "Sekien", "Sen", "Senichi", "Senzo", "Sessue", "Settan", "Sharaku", "Shiba", "Shichirobei", "Shigeaki", "Shigekazu", "Shigeki", "Shigeko", "Shigemasa", "Shigematsu", "Shigemori", "Shigenaga", "Shigenobu", "Shigeru", "Shigetaka", "Shigetoki", "Shigochiyo", "Shihei", "Shihi", "Shijo", "Shiki", "Shiko", "Shimei", "Shimpei", "Shingen", "Shinichi", "Shinji", "Shinkichi", "Shino", "Shinobu", "ShinriKiyaru", "Shinsaku", "Shinsui", "Shintaro", "Shinzaburo", "Shinzo", "Shirai", "Shiro", "Shirosama", "Shizue", "Sho", "Shoda", "Shogo", "Shohei", "Shoichi", "Shoin", "Shoji", "Shojiro", "Shoko", "Shoraku", "Shosuke", "Shotaro", "Shoyo", "Shozaburo", "Shozo", "Shuichi", "Shuji", "Shukishi", "Shuko", "Shumei", "Shumkichi", "Shun", "Shun’en", "Shuncho", "Shungyosai", "Shunichi", "Shunji", "Shunko", "Shunmyo", "Shunsen", "Shunsho", "Shunso", "Shunsuke", "Shusake", "Shusaku", "Shusui", "Shuzo", "Soetsu", "Sofu", "Soh", "Soichiro", "Sojuro", "Sorai", "Sosa", "Soseki", "Soshitsu", "Soshu", "Sosuke", "Sotan", "Sotaro", "Sotatsu", "Sozen", "Sozui", "Ssekien", "Subaru", "Suezo", "Sugimoto", "Sugita", "Sukejuro", "Sukenobu", "Suketsune", "Sukeyasu", "Sumio", "Sumiteru", "Sumitomo", "Susumu", "Suzu", "Suzu", "Tabito", "Tadahisa", "Tadakuni", "Tadamasa", "Tadamichi", "Tadao", "Tadashi", "Tadasu", "Tadasuke", "Tadataka", "Tadayoshi", "Tadayuki", "Tadiyuki", "Taheiji", "Taikan", "Taisho", "Taisuke", "Taji", "Takaaki", "Takafumi", "Takahashi", "Takahiro", "Takakazu", "Takamasa", "Takamori", "Takamuku", "Takanibu", "Takanobu", "Takanori", "Takao", "Takashi", "Takauji", "Takayuki", "Takechi", "Takehide", "Takeichi", "Takeji", "Takejiro", "Takenao", "Takeo", "Takeru", "Takeshi", "Takesi", "Taki", "Takiji", "Takuboku", "Takuji", "Takuma", "Takuro", "Takuya", "Tamasaburo", "Tamasine", "Tameyoshi", "Tamotsu", "Tamuramaro", "Tanak", "Tango", "Tanjiro", "Tanosuke", "Tanyu", "Tanzan", "Taro", "Taro", "Taroemon", "Tarozaemon", "Tashiaki", "Tashiro", "Tasuku", "Tatsui", "Tatsukichi", "Tatsuya", "Tatsuzo", "Taysuke", "Teiji", "Teijo", "Teika", "Teiljo", "Teinosuke", "Tekkan", "Tenshin", "Terao", "Teriuihi", "Terumoto", "Teruo", "Tessai", "Tetsu", "Tetsuhiko", "Tetsui", "Tetsunori", "Tetsuo", "Tetsuya", "Tetsuyuki", "Tetsuzan", "Thoki", "Tobei", "Togai", "Tohaku", "Toichi", "Toin", "Toju", "Tokaji", "Toki", "Tokichiro", "Tokimasa", "Tokimune", "Tokugawa", "Tokuhei", "Tokuma", "Tokutomi", "Tomeo", "Tomiichi", "Tomiji", "Tomoaki", "Tomohiko", "Tomokazu", "Tomomi", "Tomoyuki", "Ton", "Torajiro", "Torazo", "Torio", "Toru", "Toshi", "Toshiaki", "Toshiharu", "Toshikasu", "Toshikazu", "Toshiki", "Toshikuni", "Toshimichi", "Toshinobu", "Toshiro", "Toshitsugu", "Toshiyuki", "Toson", "Totoya", "Toyoaki", "Toyoharu", "Toyokazu", "Toyokuni", "Toyonobu", "Toyoshige", "Toyotomi", "Toyozo", "Tsugahara", "Tsugiharu", "Tsuginori", "Tsugumichi", "Tsukasa", "Tsumemasa", "Tsunayoshi", "Tsuneari", "Tsuneo", "Tsunesaburo", "Tsuneyo", "Tsuramatsu", "Tsurayaki", "Tsuruki", "Tsutomu", "Tsuyoshi", "Udo", "Ukon", "Ukyo", "Unkei", "Utaemon", "Utamara", "Utamuro", "Utemaro", "Waotaka", "Washi", "Washichi", "Yachi", "Yaichiro", "Yajirobei", "Yakamochi", "Yakumo", "Yamato", "Yasotaro", "Yasuhide", "Yasuhiko", "Yasuhiro", "Yasujiro", "Yasukazu", "Yasunari", "Yasunobu", "Yasuo", "Yasuoka", "Yasushi", "Yasutake", "Yasutoki", "Yasuyuki", "Yataro", "Yatsuhiro", "Yodo", "Yohachi", "Yoichi", "Yoichibei", "Yoriie", "Yorikane", "Yoringa", "Yoritoki", "Yoritomo", "Yoriyoshi", "Yoriyuki", "Yosai", "Yoshi", "Yoshiaga", "Yoshiaki", "Yoshida", "Yoshifumi", "Yoshifusa", "Yoshihide", "Yoshihiro", "Yoshihisa", "Yoshihito", "Yoshii", "Yoshiiku", "Yoshikazu", "Yoshiki", "Yoshimasa", "Yoshimatsu", "Yoshimi", "Yoshimitsu", "Yoshimochi", "Yoshimune", "Yoshinaka", "Yoshino", "Yoshinobu", "Yoshinori", "Yoshio", "Yoshisada", "Yoshitaka", "Yoshitake", "Yoshiteru", "Yoshitoki", "Yoshitomo", "Yoshitora", "Yoshitoshi", "Yoshitsune", "Yoshiyuki", "Yoson", "Yosuke", "Yozo", "Yugoro", "Yuichi", "Yuifum", "Yuji", "Yujiro", "Yuki", "Yukichi", "Yukinaga", "Yukio", "Yuko", "Yunosuke", "Yushiro", "Yusuke", "Yutaka", "Zenko", "Zeshin"];
                break;

            case 'AO':
            case 'BR':
            case 'CV':
            case 'GW':
            case 'MZ':
            case 'PT':
            case 'ST':
            case 'TL':
            case 'BR':
                $namesMale   = ["Álvaro", "Ângelo", "Érico", "Óscar", "Abílio", "Abel", "Abraão", "Adão", "Adalberto", "Adelmar", "Ademar", "Ademir", "Adriano", "Afonso", "Agostinho", "Alberto", "Albino", "Alcides", "Aldo", "Aleixo", "Alex", "Alexandre", "Alfredo", "Almir", "Almiro", "Aloísio", "Altair", "Américo", "Amílcar", "Amancio", "Amando", "Ambrósio", "Amor", "Aníbal", "Anacleto", "André", "Anselmo", "António", "Antônio", "Antelmo", "Aristides", "Armando", "Arsenio", "Artur", "Atílio", "Augusto", "Aurélio", "Balbino", "Balduíno", "Bartolomeu", "Benedito", "Benigno", "Benjamim", "Bento", "Bernardino", "Bernardo", "Bonifacio", "Brás", "Breno", "Brian", "Bruno", "Cândido", "César", "Cézar", "Caetano", "Caio", "Calisto", "Calixto", "Camilo", "Carlinhos", "Carlito", "Carlitos", "Carlos", "Carmo", "Casimiro", "Cecilio", "Celestino", "Celio", "Celso", "Cesário", "Cezário", "Cezar", "Chico", "Cipriano", "Ciríaco", "Cláudio", "Clemente", "Cleto", "Cornélio", "Cosme", "Cristóvão", "Cristiano", "Cruz", "Custódio", "Dário", "Dado", "Dan", "Daniel", "Danilo", "Davi", "David", "Demétrio", "Deodato", "Desidério", "Diego", "Dimas", "Dinis", "Diniz", "Diogo", "Dionísio", "Domingos", "Donato", "Du", "Duarte", "Duda", "Dudu", "Edgar", "Edmundo", "Edu", "Eduardo", "Egídio", "Elder", "Eleuterio", "Elias", "Elpidio", "Emanuel", "Emilio", "Enéas", "Enzo", "Erasmo", "Ernesto", "Estevão", "Eugênio", "Eusébio", "Eustaquio", "Eutímio", "Evaristo", "Ezequiel", "Fábio", "Félix", "Fúlvio", "Fabiano", "Fabricio", "Faustino", "Fausto", "Feliciano", "Felipe", "Felipinho", "Fernão", "Fernando", "Filipe", "Flávio", "Florencio", "Fortunato", "Francisco", "Fred", "Frederico", "Gabriel", "Gaspar", "Geraldo", "Germano", "Gervásio", "Gil", "Gilberto", "Gláucio", "Glauco", "Godofredo", "Gonçalo", "Graciano", "Guálter", "Gualberto", "Guilherme", "Guiomar", "Gustavo", "Hélder", "Haroldo", "Heitor", "Helder", "Heliodoro", "Henrique", "Herberto", "Heriberto", "Hermínio", "Hermenegildo", "Hipólito", "Horácio", "Hugo", "Iago", "Ian", "Igor", "Inácio", "Isaac", "Isac", "Ismael", "Ivan", "Ivo", "Ivo ", "Jônatas", "Jacó", "Jacinto", "Jaime", "Jerónimo", "Jerônimo", "Jeremias", "João", "Joãozinho", "Joaquim", "Joel", "Joel ", "Jordão", "Jorge", "Jorginho", "José", "Josué", "Julio", "Kévim", "Kevin", "Lúcio", "Leandro", "Leonardo", "Leonel", "Leopoldo", "Lino", "Lisandro", "Lourenço", "Luís", "Luca", "Lucas", "Luciano", "Luisinho", "Luiz", "Márcio", "Mário", "Manel ", "Manoel", "Manuel", "Marcelinho", "Marcelino", "Marcelo", "Marciano", "Marco", "Marcos", "Maria", "Mariano", "Marinho", "Marquinhos", "Martim", "Martinho", "Mateus", "Matheus", "Matias", "Maurício", "Mauro", "Maximiano", "Maximiliano", "Maximino", "Micael", "Miguel", "Miguelito", "Modesto", "Moisés", "Narciso", "Natanael", "Nataniel", "Nelinho", "Nelson", "Netuno", "Nico", "Nicodemo", "Nicolau", "Noé", "Noah ", "Norberto", "Nuno", "Octávio", "Odilon", "Olavo", "Olegário", "Oscar", "Osvaldo", "Otávio", "Ovídio", "Patrício", "Paulinho", "Paulino", "Paulo", "Pedrinho", "Pedro", "Pio", "Plácido", "Plínio", "Primo", "Quim", "Quirino", "Régulo", "Rúben", "Raúl", "Rafael", "Rafinha", "Raimundo", "Ramiro", "Raul", "Raymundo", "Reinaldo", "Remigio", "Renato", "Reynaldo", "Ricardo", "Roberto", "Rodolfo", "Rodrigo", "Rogério", "Rolando", "Roldão", "Ronaldo", "Roque", "Rubem", "Rubens", "Rubinho", "Rufino", "Rui", "Ruy", "Sérgio", "Salomão", "Salvador", "Samuel", "Sandro", "Santiago", "Saturnino", "Sebastião", "Severino", "Silvestre", "Silvio", "Simão", "Téo", "Túlio", "Tacito", "Tadeu", "Teófilo", "Telmo", "Teobaldo", "Teodósio", "Teodoro", "Thiago", "Tiago", "Tiburcio", "Timoteo", "Tito", "Tomás", "Tomé", "Toninho", "Tristão", "Ulisses", "Vítor", "Valério", "Valentin", "Valter", "Vasco", "Veríssimo", "Vicente", "Victor", "Victorino", "Vinícius", "Virgílio", "Viriato", "Wilson", "Xande", "Xandinho", "Xavier", "Zé", "Zeferino", "Zezé"];
                $namesFemale = ["Águeda", "Áurea", "Ângela", "Érica", "Íris", "Úrsula", "Adelaide", "Adelina", "Adriana", "Alícia", "Alberta", "Albertina", "Albina", "Alda", "Aldina", "Alex", "Alexandra", "Alexandrina", "Alice", "Aline", "Amália", "Amélia", "América", "Amanda", "Amor", "Ana", "Anabela", "Andréa", "Andréia", "Andreia", "Angélica", "Anita", "Antónia", "Antônia", "Apolónia", "Apolônia", "Ariana", "Assunção", "Augusta", "Aurora", "Bárbara", "Balbina", "Beatriz", "Belinha", "Benedita", "Benigna", "Bia", "Bianca", "Brígida", "Branca", "Bruna", "Brunilda", "Cátia", "Cândida", "Célia", "Cíntia", "Caetana", "Calista", "Calixta", "Camila", "Carina", "Carla", "Carlota", "Carminho", "Carmo", "Carolina", "Cassandra", "Catarina", "Cecília", "Cesária", "Chica", "Cláudia", "Clara", "Clarissa", "Clementina", "Cloé", "Clotilde", "Constância", "Constança", "Cristiana", "Cristina", "Cruz", "Custódia", "Débora", "Délia", "Daniela", "Desidéria", "Diana", "Dina", "Domitila", "Dores", "Dorotéia", "Doroteia", "Duda", "Dulce", "Edite", "Eduarda", "Efigénia", "Efigênia", "Eliana", "Elisa", "Elisabete", "Eliza", "Elvira", "Emília", "Ema", "Emiliana", "Eneida", "Esmeralda", "Estefânia", "Estela", "Ester", "Eufêmia", "Eugênia", "Eulália", "Eva", "Fábia", "Fátima", "Fabiana", "Felícia", "Felicidade", "Fernanda", "Filipa", "Filomena", "Flávia", "Florinda", "Fortunata", "Francisca", "Frederica", "Gabriela", "Genoveva", "Gertrudes", "Gilda", "Gisela", "Gláucia", "Gloria", "Graça", "Gracília", "Graciana", "Guiomar", "Helena", "Hermínia", "Iara", "Ida", "Imaculada", "Inês", "Iolanda", "Irene", "Iria", "Irina", "Isabel", "Isabela", "Isaura", "Isidora", "Isis", "Izabel", "Jéssica", "Júlia", "Jacinta", "Jaqueline", "Jessica", "Joana", "Joaninha", "Jordana", "Josefa", "Josefina", "Jovita", "Judite", "Juliana", "Julie", "Julinha", "Lídia", "Lígia", "Lílian", "Lívia", "Lúcia", "Lara", "Larissa", "Laura", "Leandra", "Lena", "Leocádia", "Leonor", "Letícia", "Lia", "Liana", "Liliana", "Lorena", "Luísa", "Luana", "Lucília", "Luciana", "Lucinda", "Luiza", "Luna", "Lurdes", "Luzia", "Lygia", "Márcia", "Mélanie", "Mónica", "Mônica", "Madalena", "Mafalda", "Magda", "Maia", "Maiara", "Manoela", "Manuela", "Mara", "Marciana", "Marciane", "Margarida", "Maria", "Mariana", "Mariazinha", "Marina", "Marisa", "Maristela", "Marta", "Matilde", "Melissa", "Mia", "Micaela", "Miguela", "Moema", "Monica", "Nádia", "Núria", "Naiara", "Narcisa", "Natália", "Natacha", "Nathália", "Nela", "Nelinha", "Neves", "Nicole", "Nilda", "Noêmia", "Noa", "Noemí", "Octávia", "Ofélia", "Olívia", "Olga", "Ondina", "Otávia", "Palmira", "Paloma", "Patrícia", "Paula", "Paulina", "Paulinha", "Perpétua", "Pilar", "Priscila", "Rafaela", "Raissa", "Raquel", "Rebeca", "Regina", "Renata", "Rita", "Rosália", "Rosário", "Rosa", "Rosalia", "Rosalina", "Rosana", "Rosinha", "Rute", "Sílvia", "Sónia", "Sabina", "Safira", "Salomé", "Sandra", "Sara", "Serafina", "Severina", "Silvia", "Sofia", "Sol", "Sonia", "Soraia", "Susana", "Suzana", "Tânia", "Taís", "Talita", "Tatiana", "Telma", "Teodora", "Teresa", "Teresinha", "Tereza", "Terezinha", "Thaís", "Thalita", "Valéria", "Valentina", "Valquíria", "Vanda", "Vanessa", "Verônica", "Vera", "Victória", "Violeta", "Virginia", "Vitória", "Yasmin", "Zita"];
                $lastNames   = ["Águas", "Álvares", "Ávila", "Abreu", "Abril", "Agostinho", "Aguiar", "Albuquerque", "Alcantara", "Almeida", "Alves", "Alvim", "Amaral", "Amorim", "Andrade", "Antunes", "Araújo", "Azevedo", "Bandeira", "Baptista", "Barbosa", "Barboza", "Barreto", "Barros", "Bastos", "Batista", "Bento", "Bettencourt", "Borges", "Botelho", "Braga", "Branco", "Brandão", "Brito", "Câmara", "Cabral", "Caetano", "Campos", "Cardoso", "Carneiro", "Carreira", "Carriço", "Carvalho", "Castro", "Cavaco", "Cerqueira", "Coelho", "Coimbra", "Cordeiro", "Correia", "Corte-Real", "Cortes", "Costa", "Coutinho", "Couto", "Cruz", "Cunha", "Dantas", "de Freitas", "de Lima", "de Sá", "Dias", "do Rosário", "Duarte", "Faria", "Fernandes", "Ferreira", "Fidalgo", "Florencio", "Fonseca", "Fontes", "Freire", "Freitas", "Furtado", "Góes", "Gama", "Garcia", "Gomes", "Gonçalves", "Gonsalves", "Gouveia", "Guerra", "Guimarães", "Gusmão", "Henriques", "Hernandes", "Leitão", "Leite", "Lima", "Lobo", "Lopes", "Luz", "Macedo", "Machado", "Maciel", "Magalhães", "Martins", "Mascarenhas", "Mata", "Matos", "Medeiros", "Melo", "Mendes", "Mendez", "Mendonça", "Menezes", "Miranda", "Moniz", "Monteiro", "Montenegro", "Morais", "Moreira", "Moreno", "Moura", "Nascimento", "Neves", "Nogueira", "Nunes", "Oliveira", "Pacheco", "Paiva", "Pascoal", "Passos", "Pereira", "Peres", "Pimentel", "Pinho", "Pinto", "Pires", "Queiros", "Queiroz", "Ramos", "Rebelo", "Rego", "Reis", "Resende", "Resendes", "Ribeiro", "Rocha", "Rodrigues", "Roque", "Rosa", "Sá", "Saldanha", "Salgado", "Santos", "Sapateiro", "Saraiva", "Seabra", "Seixas", "Sequeira", "Serra", "Silva", "Silveira", "Silvestre", "Simões", "Siqueira", "Soares", "Sousa", "Tavares", "Teixeira", "Tomás", "Torres", "Valente", "Varejão", "Varela", "Vasconcelos", "Vaz", "Venâncio", "Vidal", "Vieira", "Vila", "Vomlel"];
                break;

            case 'ZA':
            case 'AU':
            case 'BS':
            case 'BB':
            case 'CA':
            case 'US':
            case 'PH':
            case 'IN':
            case 'IE':
            case 'JM':
            case 'MT':
            case 'NG':
            case 'NZ':
            case 'GB':
            case 'SG':
            default:
                $namesFemale = ["Abigail", "Ada", "Addison", "Adeline", "Adriana", "Agnes", "Aimee", "Alana", "Alannah", "Alaya", "Alayna", "Alba", "Aleena", "Aleeza", "Aleksandra", "Alexa", "Alexandra", "Alexia", "Alexis", "Alice", "Alicia", "Alina", "Alisha", "Aliya", "Aliyah", "Aliza", "Alyssa", "Alyssia", "Amalia", "Amara", "Amaya", "Amayah", "Amber", "Amelia", "Amelia-Rose", "Amelie", "Amina", "Aminah", "Amira", "Amirah", "Amiyah", "Amy", "Ana", "Anastasia", "Anaya", "Anayah", "Angel", "Anika", "Anna", "Annabel", "Annabella", "Annabelle", "Annie", "Anya", "April", "Arabella", "Aria", "Ariana", "Arianna", "Ariella", "Ariya", "Arya", "Astrid", "Aubree", "Aubrey", "Audrey", "Aurelia", "Aurora", "Autumn", "Ava", "Aya", "Ayah", "Beatrice", "Beatrix", "Beau", "Bella", "Belle", "Bethany", "Betsy", "Betty", "Bianca", "Billie", "Blossom", "Bonnie", "Brooke", "Brooklyn", "Caitlin", "Callie", "Cara", "Catherine", "Charlotte", "Chloe", "Ciara", "Clara", "Claudia", "Clementine", "Cleo", "Connie", "Constance", "Cora", "Daisy", "Dakota", "Daniella", "Daphne", "Darcey", "Darcie", "Darcy", "Daria", "Delilah", "Demi", "Destiny", "Diana", "Dolcie", "Dolly", "Dorothy", "Dottie", "Eden", "Edith", "Eira", "Ela", "Eleanor", "Elena", "Eliana", "Elisa", "Elise", "Eliza", "Elizabeth", "Ella", "Ella-Rose", "Ellen", "Ellie", "Ellie-Mae", "Elodie", "Eloise", "Elsa", "Elsie", "Emelia", "Emilia", "Emilie", "Emily", "Emma", "Emmeline", "Emmie", "Erica", "Erika", "Erin", "Esmae", "Esme", "Esmee", "Esther", "Eva", "Evangeline", "Eve", "Evelyn", "Everly", "Evie", "Faith", "Faye", "Felicity", "Fern", "Flora", "Florence", "Frances", "Francesca", "Frankie", "Freya", "Gabriela", "Gabriella", "Gabrielle", "Genevieve", "Georgia", "Georgie", "Georgina", "Grace", "Gracie", "Gracie-Mae", "Halle", "Hallie", "Hana", "Hanna", "Hannah", "Harley", "Harlow", "Harmony", "Harper", "Harriet", "Hattie", "Hazel", "Heidi", "Helena", "Hollie", "Holly", "Honey", "Hope", "Iris", "Isabel", "Isabella", "Isabelle", "Isobel", "Ivy", "Ivy-Rose", "Izabella", "Jasmine", "Jemima", "Jennifer", "Jessica", "Jessie", "Joanna", "Jorgie", "Josephine", "Josie", "Julia", "Juliette", "Kaitlyn", "Kara", "Karina", "Kate", "Katherine", "Katie", "Kayla", "Keira", "Kiara", "Kiera", "Kira", "Klara", "Kyra", "Lacey", "Lacie", "Laila", "Lana", "Lara", "Laura", "Lauren", "Layla", "Leah", "Leia", "Leila", "Lena", "Lexi", "Lexie", "Leyla", "Lia", "Libby", "Lila", "Lilah", "Liliana", "Lillian", "Lillie", "Lilly", "Lily", "Lily-Mae", "Lily-Rose", "Lois", "Lola", "Lottie", "Louisa", "Lucia", "Lucie", "Lucy", "Luna", "Lydia", "Lyla", "Lyra", "Mabel", "Macey", "Macie", "Maddie", "Maddison", "Madeleine", "Madeline", "Madison", "Maggie", "Maia", "Maisie", "Maisy", "Margaret", "Margot", "Maria", "Mariam", "Marley", "Martha", "Mary", "Maryam", "Matilda", "Maya", "Megan", "Melissa", "Melody", "Meredith", "Mia", "Michelle", "Mila", "Milana", "Milena", "Miley", "Millie", "Minnie", "Miriam", "Mollie", "Molly", "Mya", "Myla", "Myra", "Nadia", "Nancy", "Natalia", "Natalie", "Nell", "Nellie", "Nevaeh", "Neve", "Nia", "Nicole", "Nina", "Nora", "Norah", "Nova", "Nyla", "Nylah", "Olive", "Olivia", "Olivia-Rose", "Ophelia", "Paige", "Paisley", "Pearl", "Penelope", "Penny", "Peyton", "Philippa", "Phoebe", "Piper", "Pippa", "Pola", "Polly", "Poppy", "Priya", "Quinn", "Rachel", "Rae", "Raya", "Rebecca", "Reeva", "Remi", "Renee", "Riley", "River", "Robyn", "Rosa", "Rosalie", "Rose", "Rosie", "Rowan", "Ruby", "Ruth", "Sabrina", "Sadie", "Samantha", "Sapphire", "Sara", "Sarah", "Sasha", "Savannah", "Scarlet", "Scarlett", "Serena", "Sia", "Sienna", "Skye", "Skyla", "Skylar", "Skyler", "Sofia", "Sophia", "Sophie", "Stella", "Summer", "Sydney", "Sylvie", "Talia", "Taylor", "Tia", "Tiana", "Tilly", "Vanessa", "Victoria", "Violet", "Vivienne", "Willow", "Winnie", "Winter", "Yasmin", "Zara", "Zoe", "Zofia"];
                $namesMale = ["Aadam", "Aarav", "Aaron", "Aaryan", "Abel", "Abraham", "Adam", "Adrian", "Aidan", "Aiden", "Alan", "Albert", "Albi", "Albie", "Alby", "Aleksander", "Alex", "Alexander", "Alfie", "Alfred", "Alistair", "Andre", "Andrei", "Andrew", "Angus", "Anthony", "Antonio", "Archer", "Archibald", "Archie", "Arlo", "Aron", "Arthur", "Aryan", "Asher", "Ashley", "Ashton", "Aston", "Austin", "Axel", "Ayaan", "Ayan", "Ayden", "Aydin", "Bailey", "Barnaby", "Barney", "Beau", "Ben", "Benedict", "Benjamin", "Bentley", "Bertie", "Billy", "Blake", "Bobby", "Bradley", "Brandon", "Brayden", "Brian", "Brodie", "Brody", "Brooklyn", "Bruno", "Buddy", "Caelan", "Caleb", "Callum", "Calvin", "Cameron", "Carson", "Carter", "Casey", "Casper", "Cassius", "Cayden", "Charles", "Charlie", "Chase", "Chester", "Christian", "Christopher", "Cian", "Cillian", "Clark", "Clayton", "Coby", "Cody", "Cohen", "Cole", "Connor", "Conor", "Cooper", "Corey", "Cruz", "Damian", "Daniel", "Danny", "Dante", "Darius", "David", "Deacon", "Declan", "Denis", "Dennis", "Dexter", "Diego", "Dillon", "Dominic", "Dominik", "Dougie", "Douglas", "Dylan", "Eddie", "Eden", "Edison", "Eduard", "Edward", "Edwin", "Eli", "Elias", "Elijah", "Elis", "Elliot", "Elliott", "Ellis", "Emmanuel", "Eric", "Erik", "Ernest", "Ernie", "Ethan", "Euan", "Evan", "Ewan", "Fabian", "Felix", "Filip", "Finlay", "Finley", "Finn", "Finnley", "Fletcher", "Flynn", "Francis", "Frank", "Frankie", "Franklin", "Fraser", "Freddie", "Freddy", "Frederick", "Gabriel", "George", "Grayson", "Greyson", "Haider", "Hamish", "Haris", "Harley", "Harris", "Harrison", "Harry", "Harvey", "Hayden", "Heath", "Hector", "Hendrix", "Henry", "Hudson", "Hugh", "Hugo", "Hunter", "Isa", "Isaac", "Issac", "Ivan", "Jack", "Jackson", "Jacob", "Jaden", "Jaiden", "Jake", "Jakub", "James", "Jamie", "Jan", "Jason", "Jasper", "Jax", "Jaxon", "Jaxson", "Jay", "Jayden", "Jensen", "Jenson", "Jeremiah", "Jesse", "Jimmy", "Joe", "Joel", "Joey", "John", "Johnny", "Jonah", "Jonas", "Jonathan", "Jordan", "Joseph", "Josh", "Joshua", "Josiah", "Jude", "Julian", "Junior", "Kacper", "Kai", "Kaiden", "Kairo", "Kaleb", "Kane", "Kasper", "Kayden", "Keegan", "Kevin", "Khalid", "Kian", "Kieran", "Kingsley", "Kit", "Kobi", "Koby", "Kyle", "Lachlan", "Laurence", "Lawrence", "Layton", "Leighton", "Lennie", "Lennon", "Lennox", "Lenny", "Leo", "Leon", "Leonard", "Leonardo", "Levi", "Lewis", "Liam", "Lincoln", "Lochlan", "Logan", "Lorenzo", "Louie", "Louis", "Luca", "Lucas", "Lucian", "Luis", "Luka", "Lukas", "Luke", "Maddox", "Magnus", "Marcel", "Marco", "Marcus", "Mario", "Mark", "Marley", "Marshall", "Martin", "Mason", "Mateo", "Matteo", "Matthew", "Max", "Maxim", "Maximilian", "Maximus", "Maxwell", "Micah", "Michael", "Michal", "Milan", "Miles", "Miller", "Milo", "Montgomery", "Monty", "Morgan", "Myles", "Mylo", "Natan", "Nate", "Nathan", "Nathaniel", "Nicholas", "Nico", "Nicolas", "Noah", "Noel", "Oakley", "Oliver", "Olivier", "Ollie", "Olly", "Orion", "Oscar", "Oskar", "Otis", "Otto", "Owen", "Parker", "Patrick", "Paul", "Percy", "Peter", "Philip", "Phoenix", "Preston", "Prince", "Quinn", "Ralph", "Ralphie", "Ralphy", "Raphael", "Ray", "Reece", "Regan", "Reggie", "Reginald", "Remy", "Reuben", "Rex", "Rhys", "Richard", "Riley", "Rio", "River", "Robbie", "Robert", "Robin", "Rocco", "Rohan", "Roman", "Romeo", "Ronan", "Ronnie", "Rory", "Rowan", "Ruben", "Rudy", "Rufus", "Rupert", "Ryan", "Sam", "Sami", "Samuel", "Sean", "Sebastian", "Seth", "Sidney", "Simon", "Solomon", "Sonny", "Spencer", "Stanley", "Stefan", "Stephen", "Steven", "Tate", "Taylor", "Ted", "Teddie", "Teddy", "Theo", "Theodore", "Thomas", "Timothy", "Tobias", "Toby", "Tom", "Tomas", "Tommy", "Travis", "Tristan", "Troy", "Tyler", "Victor", "Vincent", "Vinnie", "Walter", "Wilfred", "William", "Wyatt", "Xander", "Xavier", "Zac", "Zach", "Zachariah", "Zachary", "Zack", "Zain", "Zak", "Zakaria", "Zakariya", "Zane"];
                $lastNames = ["Adams", "Allen", "Anderson", "Andrews", "Armstrong", "Atkinson", "Austin", "Bailey", "Baker", "Ball", "Barker", "Barnes", "Barrett", "Bates", "Baxter", "Bell", "Bennett", "Berry", "Black", "Booth", "Bradley", "Brooks", "Brown", "Burke", "Burns", "Burton", "Butler", "Byrne", "Campbell", "Carr", "Carter", "Chambers", "Chapman", "Clark", "Clarke", "Cole", "Collins", "Cook", "Cooke", "Cooper", "Cox", "Cunningham", "Davidson", "Davies", "Davis", "Dawson", "Day", "Dean", "Dixon", "Doyle", "Duncan", "Edwards", "Elliott", "Ellis", "Evans", "Fisher", "Fletcher", "Foster", "Fox", "Francis", "Fraser", "Gallagher", "Gardner", "George", "Gibson", "Gill", "Gordon", "Graham", "Grant", "Gray", "Green", "Griffiths", "Hall", "Hamilton", "Harper", "Harris", "Harrison", "Hart", "Harvey", "Hawkins", "Hayes", "Henderson", "Hill", "Holland", "Holmes", "Hopkins", "Houghton", "Howard", "Hudson", "Hughes", "Hunt", "Hunter", "Hussain", "Jackson", "James", "Jenkins", "John", "Johnson", "Johnston", "Jones", "Jordan", "Kaur", "Kelly", "Kennedy", "Khan", "King", "Knight", "Lane", "Lawrence", "Lawson", "Lee", "Lewis", "Lloyd", "Lowe", "Macdonald", "Marsh", "Marshall", "Martin", "Mason", "Matthews", "May", "Mccarthy", "Mcdonald", "Miller", "Mills", "Mitchell", "Moore", "Morgan", "Morris", "Moss", "Murphy", "Murray", "Newman", "Nicholson", "Owen", "Palmer", "Parker", "Parry", "Patel", "Pearce", "Pearson", "Perry", "Phillips", "Poole", "Porter", "Powell", "Price", "Read", "Rees", "Reid", "Reynolds", "Richards", "Richardson", "Riley", "Roberts", "Robertson", "Robinson", "Rogers", "Rose", "Ross", "Russell", "Ryan", "Saunders", "Scott", "Sharp", "Shaw", "Simpson", "Smith", "Spencer", "Stevens", "Stewart", "Stone", "Sutton", "Taylor", "Thomas", "Thompson", "Thomson", "Turner", "Walker", "Wallace", "Walsh", "Ward", "Watson", "Watts", "Webb", "Wells", "West", "White", "Wilkinson", "Williams", "Williamson", "Willis", "Wilson", "Wood", "Woods", "Wright", "Young"];
                break;

        }

        $firstNames = ($sex) ? $namesMale : $namesFemale;

        $rnd   = rand(0, count($firstNames) - 1);
        $rnd1  = rand(0, count($lastNames) - 1);

        $name[] = $firstNames[$rnd];
        $name[] = $lastNames[$rnd1];

        return $name;
    }

    public static function getRandomDate($year)
    {
        $faker = Factory::create('pt-br');

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

        return date((date('Y') - $year) . '-' . $month . '-' . $day);
    }

    public static function getRandomForce($s)
    {
        $faker = Factory::create('pt-br');

        $force = 0;

        switch ($s) {
            case 3:
                for ($i = 0; $i < 5; $i++) {
                    $force += $faker->numberBetween(40, 75);
                }
                break;
            case 2:
                for ($i = 0; $i < 5; $i++) {
                    $force += $faker->numberBetween(20, 65);
                }
                break;
            case 1:
            default:
                for ($i = 0; $i < 5; $i++) {
                    $force += $faker->numberBetween(1, 40);
                }
                break;
        }

        return (int) ($force / 5);
    }

    public static function getRandomSalary($force, $mentor)
    {
        $faker = Factory::create('pt-br');

        if ($force > 70){
            $salary = $faker->randomFloat(2, 7000, 8000);
        }
        else if ($force > 60) {
            $salary = $faker->randomFloat(2, 6000, 7250);
        }
        else if ($force > 50) {
            $salary = $faker->randomFloat(2, 5000, 6250);
        }
        else if ($force > 40) {
            $salary = $faker->randomFloat(2, 4000, 5250);
        }
        else if ($force > 30) {
            $salary = $faker->randomFloat(2, 3000, 4250);
        }
        else
        {
            $salary = $faker->randomFloat(2, 2000, 3250);
        }

        if ($mentor)
        {
            $force  = $faker->numberBetween(60, 75);
            $salary = $faker->randomFloat(2, 6500, 8500);
        }

        $pass = $salary * $faker->randomFloat(2, 1, 3);

        return [
            round($salary, 0),
            round($pass, 0)
        ];
    }


    public static function formatSalary($value)
    {
        // first strip any formatting;
        $value = (0+str_replace(",", "", $value));

        // is this a number?
        if (!is_numeric($value)) return false;

        // now filter it;
        if ($value > 1000000) {
            return round(($value/1000000), 2).' M';
        } elseif ($value > 1000) {
            return round(($value/1000), 1).' mil';
        }

        return number_format($value);
    }
}
