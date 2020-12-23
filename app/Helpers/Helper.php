<?php

namespace App\Helpers;

use Faker\Factory;

class Helper
{
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

    public static function getNames($type, $sex)
    {
        switch ($type) {
            case 'real':
                return self::nameReal($sex);
                break;

            default:
                # code...
                break;
        }
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
    protected static function nameReal($sex = true)
    {
        $namesMale   = ["Álvaro", "Ângelo", "Érico", "Óscar", "Abílio", "Abel", "Abraão", "Adão", "Adalberto", "Adelmar", "Ademar", "Ademir", "Adriano", "Afonso", "Agostinho", "Alberto", "Albino", "Alcides", "Aldo", "Aleixo", "Alex", "Alexandre", "Alfredo", "Almir", "Almiro", "Aloísio", "Altair", "Américo", "Amílcar", "Amancio", "Amando", "Ambrósio", "Amor", "Aníbal", "Anacleto", "André", "Anselmo", "António", "Antônio", "Antelmo", "Aristides", "Armando", "Arsenio", "Artur", "Atílio", "Augusto", "Aurélio", "Balbino", "Balduíno", "Bartolomeu", "Benedito", "Benigno", "Benjamim", "Bento", "Bernardino", "Bernardo", "Bonifacio", "Brás", "Breno", "Brian", "Bruno", "Cândido", "César", "Cézar", "Caetano", "Caio", "Calisto", "Calixto", "Camilo", "Carlinhos", "Carlito", "Carlitos", "Carlos", "Carmo", "Casimiro", "Cecilio", "Celestino", "Celio", "Celso", "Cesário", "Cezário", "Cezar", "Chico", "Cipriano", "Ciríaco", "Cláudio", "Clemente", "Cleto", "Cornélio", "Cosme", "Cristóvão", "Cristiano", "Cruz", "Custódio", "Dário", "Dado", "Dan", "Daniel", "Danilo", "Davi", "David", "Demétrio", "Deodato", "Desidério", "Diego", "Dimas", "Dinis", "Diniz", "Diogo", "Dionísio", "Domingos", "Donato", "Du", "Duarte", "Duda", "Dudu", "Edgar", "Edmundo", "Edu", "Eduardo", "Egídio", "Elder", "Eleuterio", "Elias", "Elpidio", "Emanuel", "Emilio", "Enéas", "Enzo", "Erasmo", "Ernesto", "Estevão", "Eugênio", "Eusébio", "Eustaquio", "Eutímio", "Evaristo", "Ezequiel", "Fábio", "Félix", "Fúlvio", "Fabiano", "Fabricio", "Faustino", "Fausto", "Feliciano", "Felipe", "Felipinho", "Fernão", "Fernando", "Filipe", "Flávio", "Florencio", "Fortunato", "Francisco", "Fred", "Frederico", "Gabriel", "Gaspar", "Geraldo", "Germano", "Gervásio", "Gil", "Gilberto", "Gláucio", "Glauco", "Godofredo", "Gonçalo", "Graciano", "Guálter", "Gualberto", "Guilherme", "Guiomar", "Gustavo", "Hélder", "Haroldo", "Heitor", "Helder", "Heliodoro", "Henrique", "Herberto", "Heriberto", "Hermínio", "Hermenegildo", "Hipólito", "Horácio", "Hugo", "Iago", "Ian", "Igor", "Inácio", "Isaac", "Isac", "Ismael", "Ivan", "Ivo", "Ivo ", "Jônatas", "Jacó", "Jacinto", "Jaime", "Jerónimo", "Jerônimo", "Jeremias", "João", "Joãozinho", "Joaquim", "Joel", "Joel ", "Jordão", "Jorge", "Jorginho", "José", "Josué", "Julio", "Kévim", "Kevin", "Lúcio", "Leandro", "Leonardo", "Leonel", "Leopoldo", "Lino", "Lisandro", "Lourenço", "Luís", "Luca", "Lucas", "Luciano", "Luisinho", "Luiz", "Márcio", "Mário", "Manel ", "Manoel", "Manuel", "Marcelinho", "Marcelino", "Marcelo", "Marciano", "Marco", "Marcos", "Maria", "Mariano", "Marinho", "Marquinhos", "Martim", "Martinho", "Mateus", "Matheus", "Matias", "Maurício", "Mauro", "Maximiano", "Maximiliano", "Maximino", "Micael", "Miguel", "Miguelito", "Modesto", "Moisés", "Narciso", "Natanael", "Nataniel", "Nelinho", "Nelson", "Netuno", "Nico", "Nicodemo", "Nicolau", "Noé", "Noah ", "Norberto", "Nuno", "Octávio", "Odilon", "Olavo", "Olegário", "Oscar", "Osvaldo", "Otávio", "Ovídio", "Patrício", "Paulinho", "Paulino", "Paulo", "Pedrinho", "Pedro", "Pio", "Plácido", "Plínio", "Primo", "Quim", "Quirino", "Régulo", "Rúben", "Raúl", "Rafael", "Rafinha", "Raimundo", "Ramiro", "Raul", "Raymundo", "Reinaldo", "Remigio", "Renato", "Reynaldo", "Ricardo", "Roberto", "Rodolfo", "Rodrigo", "Rogério", "Rolando", "Roldão", "Ronaldo", "Roque", "Rubem", "Rubens", "Rubinho", "Rufino", "Rui", "Ruy", "Sérgio", "Salomão", "Salvador", "Samuel", "Sandro", "Santiago", "Saturnino", "Sebastião", "Severino", "Silvestre", "Silvio", "Simão", "Téo", "Túlio", "Tacito", "Tadeu", "Teófilo", "Telmo", "Teobaldo", "Teodósio", "Teodoro", "Thiago", "Tiago", "Tiburcio", "Timoteo", "Tito", "Tomás", "Tomé", "Toninho", "Tristão", "Ulisses", "Vítor", "Valério", "Valentin", "Valter", "Vasco", "Veríssimo", "Vicente", "Victor", "Victorino", "Vinícius", "Virgílio", "Viriato", "Wilson", "Xande", "Xandinho", "Xavier", "Zé", "Zeferino", "Zezé"];
        $namesFemale = ["Águeda", "Áurea", "Ângela", "Érica", "Íris", "Úrsula", "Adelaide", "Adelina", "Adriana", "Alícia", "Alberta", "Albertina", "Albina", "Alda", "Aldina", "Alex", "Alexandra", "Alexandrina", "Alice", "Aline", "Amália", "Amélia", "América", "Amanda", "Amor", "Ana", "Anabela", "Andréa", "Andréia", "Andreia", "Angélica", "Anita", "Antónia", "Antônia", "Apolónia", "Apolônia", "Ariana", "Assunção", "Augusta", "Aurora", "Bárbara", "Balbina", "Beatriz", "Belinha", "Benedita", "Benigna", "Bia", "Bianca", "Brígida", "Branca", "Bruna", "Brunilda", "Cátia", "Cândida", "Célia", "Cíntia", "Caetana", "Calista", "Calixta", "Camila", "Carina", "Carla", "Carlota", "Carminho", "Carmo", "Carolina", "Cassandra", "Catarina", "Cecília", "Cesária", "Chica", "Cláudia", "Clara", "Clarissa", "Clementina", "Cloé", "Clotilde", "Constância", "Constança", "Cristiana", "Cristina", "Cruz", "Custódia", "Débora", "Délia", "Daniela", "Desidéria", "Diana", "Dina", "Domitila", "Dores", "Dorotéia", "Doroteia", "Duda", "Dulce", "Edite", "Eduarda", "Efigénia", "Efigênia", "Eliana", "Elisa", "Elisabete", "Eliza", "Elvira", "Emília", "Ema", "Emiliana", "Eneida", "Esmeralda", "Estefânia", "Estela", "Ester", "Eufêmia", "Eugênia", "Eulália", "Eva", "Fábia", "Fátima", "Fabiana", "Felícia", "Felicidade", "Fernanda", "Filipa", "Filomena", "Flávia", "Florinda", "Fortunata", "Francisca", "Frederica", "Gabriela", "Genoveva", "Gertrudes", "Gilda", "Gisela", "Gláucia", "Gloria", "Graça", "Gracília", "Graciana", "Guiomar", "Helena", "Hermínia", "Iara", "Ida", "Imaculada", "Inês", "Iolanda", "Irene", "Iria", "Irina", "Isabel", "Isabela", "Isaura", "Isidora", "Isis", "Izabel", "Jéssica", "Júlia", "Jacinta", "Jaqueline", "Jessica", "Joana", "Joaninha", "Jordana", "Josefa", "Josefina", "Jovita", "Judite", "Juliana", "Julie", "Julinha", "Lídia", "Lígia", "Lílian", "Lívia", "Lúcia", "Lara", "Larissa", "Laura", "Leandra", "Lena", "Leocádia", "Leonor", "Letícia", "Lia", "Liana", "Liliana", "Lorena", "Luísa", "Luana", "Lucília", "Luciana", "Lucinda", "Luiza", "Luna", "Lurdes", "Luzia", "Lygia", "Márcia", "Mélanie", "Mónica", "Mônica", "Madalena", "Mafalda", "Magda", "Maia", "Maiara", "Manoela", "Manuela", "Mara", "Marciana", "Marciane", "Margarida", "Maria", "Mariana", "Mariazinha", "Marina", "Marisa", "Maristela", "Marta", "Matilde", "Melissa", "Mia", "Micaela", "Miguela", "Moema", "Monica", "Nádia", "Núria", "Naiara", "Narcisa", "Natália", "Natacha", "Nathália", "Nela", "Nelinha", "Neves", "Nicole", "Nilda", "Noêmia", "Noa", "Noemí", "Octávia", "Ofélia", "Olívia", "Olga", "Ondina", "Otávia", "Palmira", "Paloma", "Patrícia", "Paula", "Paulina", "Paulinha", "Perpétua", "Pilar", "Priscila", "Rafaela", "Raissa", "Raquel", "Rebeca", "Regina", "Renata", "Rita", "Rosália", "Rosário", "Rosa", "Rosalia", "Rosalina", "Rosana", "Rosinha", "Rute", "Sílvia", "Sónia", "Sabina", "Safira", "Salomé", "Sandra", "Sara", "Serafina", "Severina", "Silvia", "Sofia", "Sol", "Sonia", "Soraia", "Susana", "Suzana", "Tânia", "Taís", "Talita", "Tatiana", "Telma", "Teodora", "Teresa", "Teresinha", "Tereza", "Terezinha", "Thaís", "Thalita", "Valéria", "Valentina", "Valquíria", "Vanda", "Vanessa", "Verônica", "Vera", "Victória", "Violeta", "Virginia", "Vitória", "Yasmin", "Zita"];
        $lastNames   = ["Águas", "Álvares", "Ávila", "Abreu", "Abril", "Agostinho", "Aguiar", "Albuquerque", "Alcantara", "Almeida", "Alves", "Alvim", "Amaral", "Amorim", "Andrade", "Antunes", "Araújo", "Azevedo", "Bandeira", "Baptista", "Barbosa", "Barboza", "Barreto", "Barros", "Bastos", "Batista", "Bento", "Bettencourt", "Borges", "Botelho", "Braga", "Branco", "Brandão", "Brito", "Câmara", "Cabral", "Caetano", "Campos", "Cardoso", "Carneiro", "Carreira", "Carriço", "Carvalho", "Castro", "Cavaco", "Cerqueira", "Coelho", "Coimbra", "Cordeiro", "Correia", "Corte-Real", "Cortes", "Costa", "Coutinho", "Couto", "Cruz", "Cunha", "Dantas", "de Freitas", "de Lima", "de Sá", "Dias", "do Rosário", "Duarte", "Faria", "Fernandes", "Ferreira", "Fidalgo", "Florencio", "Fonseca", "Fontes", "Freire", "Freitas", "Furtado", "Góes", "Gama", "Garcia", "Gomes", "Gonçalves", "Gonsalves", "Gouveia", "Guerra", "Guimarães", "Gusmão", "Henriques", "Hernandes", "Leitão", "Leite", "Lima", "Lobo", "Lopes", "Luz", "Macedo", "Machado", "Maciel", "Magalhães", "Martins", "Mascarenhas", "Mata", "Matos", "Medeiros", "Melo", "Mendes", "Mendez", "Mendonça", "Menezes", "Miranda", "Moniz", "Monteiro", "Montenegro", "Morais", "Moreira", "Moreno", "Moura", "Nascimento", "Neves", "Nogueira", "Nunes", "Oliveira", "Pacheco", "Paiva", "Pascoal", "Passos", "Pereira", "Peres", "Pimentel", "Pinho", "Pinto", "Pires", "Queiros", "Queiroz", "Ramos", "Rebelo", "Rego", "Reis", "Resende", "Resendes", "Ribeiro", "Rocha", "Rodrigues", "Roque", "Rosa", "Sá", "Saldanha", "Salgado", "Santos", "Sapateiro", "Saraiva", "Seabra", "Seixas", "Sequeira", "Serra", "Silva", "Silveira", "Silvestre", "Simões", "Siqueira", "Soares", "Sousa", "Tavares", "Teixeira", "Tomás", "Torres", "Valente", "Varejão", "Varela", "Vasconcelos", "Vaz", "Venâncio", "Vidal", "Vieira", "Vila", "Vomlel"];

        if ($sex)
        {
            $firstNames = $namesMale;
        }
        else
        {
            $firstNames = $namesFemale;
        }

        $rnd   = rand(0, count($firstNames) - 1);
        $rnd1  = rand(0, count($lastNames) - 1);
        $name[] = $firstNames[$rnd];
        $name[] = $lastNames[$rnd1];

        return $name;
    }
}
