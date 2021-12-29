<script>
    var syll2 = ["ba", "be", "bi", "bo", "bu", "ca", "ce", "ci", "co", "cu", "da", "de", "di", "do", "du", "fa", "fe", "fi", "fo", "fu", "ga", "ge", "gi", "go", "gu", "ha", "he", "hi", "ho", "hu", "ka", "ke", "ki", "ko", "ku", "la", "le", "li", "lo", "lu", "ma", "me", "mi", "mo", "mu", "na", "ne", "ni", "no", "nu", "pa", "pe", "pi", "po", "pu", "ra", "re", "ri", "ro", "ru", "sa", "se", "si", "so", "su", "ta", "te", "ti", "to", "tu", "va", "ve", "vi", "vo", "vu", "xa", "xe", "xi", "xo", "xu", "za", "ze", "zi", "zo", "zu", "wa", "we", "wi", "wo", "wu", "ar", "as", "an", "al", "er", "es", "en", "el", "ir", "is", "in", "is", "or", "os", "on", "ol", "ur", "us", "un", "us", "ba", "be", "bi", "bo", "bu", "ca", "ce", "ci", "co", "cu", "da", "de", "di", "do", "du", "fa", "fe", "fi", "fo", "fu", "ga", "ge", "gi", "go", "gu", "ha", "he", "hi", "ho", "hu", "ka", "ke", "ki", "ko", "ku", "la", "le", "li", "lo", "lu", "ma", "me", "mi", "mo", "mu", "na", "ne", "ni", "no", "nu", "pa", "pe", "pi", "po", "pu", "ra", "re", "ri", "ro", "ru", "sa", "se", "si", "so", "su", "ta", "te", "ti", "to", "tu", "va", "ve", "vi", "vo", "vu", "xa", "xe", "xi", "xo", "xu", "za", "ze", "zi", "zo", "zu", "wa", "we", "wi", "wo", "wu", "ar", "as", "an", "al", "er", "es", "en", "el", "ir", "is", "in", "is", "or", "os", "on", "ol", "ur", "us", "un", "us", "ba", "be", "bi", "bo", "bu", "ca", "ce", "ci", "co", "cu", "da", "de", "di", "do", "du", "fa", "fe", "fi", "fo", "fu", "ga", "ge", "gi", "go", "gu", "ha", "he", "hi", "ho", "hu", "ka", "ke", "ki", "ko", "ku", "la", "le", "li", "lo", "lu", "ma", "me", "mi", "mo", "mu", "na", "ne", "ni", "no", "nu", "pa", "pe", "pi", "po", "pu", "ra", "re", "ri", "ro", "ru", "sa", "se", "si", "so", "su", "ta", "te", "ti", "to", "tu", "va", "ve", "vi", "vo", "vu", "xa", "xe", "xi", "xo", "xu", "za", "ze", "zi", "zo", "zu", "wa", "we", "wi", "wo", "wu", "ar", "as", "an", "al", "er", "es", "en", "el", "ir", "is", "in", "is", "or", "os", "on", "ol", "ur", "us", "un", "us", "ba", "be", "bi", "bo", "bu", "ca", "ce", "ci", "co", "cu", "da", "de", "di", "do", "du", "fa", "fe", "fi", "fo", "fu", "ga", "ge", "gi", "go", "gu", "ha", "he", "hi", "ho", "hu", "ka", "ke", "ki", "ko", "ku", "la", "le", "li", "lo", "lu", "ma", "me", "mi", "mo", "mu", "na", "ne", "ni", "no", "nu", "pa", "pe", "pi", "po", "pu", "ra", "re", "ri", "ro", "ru", "sa", "se", "si", "so", "su", "ta", "te", "ti", "to", "tu", "va", "ve", "vi", "vo", "vu", "xa", "xe", "xi", "xo", "xu", "za", "ze", "zi", "zo", "zu", "wa", "we", "wi", "wo", "wu", "ar", "as", "an", "al", "er", "es", "en", "el", "ir", "is", "in", "is", "or", "os", "on", "ol", "ur", "us", "un", "us", "ba", "be", "bi", "bo", "bu", "ca", "ce", "ci", "co", "cu", "da", "de", "di", "do", "du", "fa", "fe", "fi", "fo", "fu", "ga", "ge", "gi", "go", "gu", "ha", "he", "hi", "ho", "hu", "ka", "ke", "ki", "ko", "ku", "la", "le", "li", "lo", "lu", "ma", "me", "mi", "mo", "mu", "na", "ne", "ni", "no", "nu", "pa", "pe", "pi", "po", "pu", "ra", "re", "ri", "ro", "ru", "sa", "se", "si", "so", "su", "ta", "te", "ti", "to", "tu", "va", "ve", "vi", "vo", "vu", "xa", "xe", "xi", "xo", "xu", "za", "ze", "zi", "zo", "zu", "wa", "we", "wi", "wo", "wu", "ar", "as", "an", "al", "er", "es", "en", "el", "ir", "is", "in", "is", "or", "os", "on", "ol", "ur", "us", "un", "us", "ba", "be", "bi", "bo", "bu", "ca", "ce", "ci", "co", "cu", "da", "de", "di", "do", "du", "fa", "fe", "fi", "fo", "fu", "ga", "ge", "gi", "go", "gu", "ha", "he", "hi", "ho", "hu", "ka", "ke", "ki", "ko", "ku", "la", "le", "li", "lo", "lu", "ma", "me", "mi", "mo", "mu", "na", "ne", "ni", "no", "nu", "pa", "pe", "pi", "po", "pu", "ra", "re", "ri", "ro", "ru", "sa", "se", "si", "so", "su", "ta", "te", "ti", "to", "tu", "va", "ve", "vi", "vo", "vu", "xa", "xe", "xi", "xo", "xu", "za", "ze", "zi", "zo", "zu", "wa", "we", "wi", "wo", "wu", "ar", "as", "an", "al", "er", "es", "en", "el", "ir", "is", "in", "is", "or", "os", "on", "ol", "ur", "us", "un", "us"],
        syll3 = ["bae", "bai", "bao", "bau", "cae", "cai", "cao", "cau", "dae", "dai", "dao", "dau", "fae", "fai", "fao", "fau", "gae", "gai", "gao", "gau", "hae", "hai", "hao", "hau", "kae", "kai", "kao", "kau", "lae", "lai", "lao", "lau", "mae", "mai", "mao", "mau", "nae", "nai", "nao", "nau", "pae", "pai", "pao", "pau", "rae", "rai", "rao", "rau", "sae", "sai", "sao", "sau", "tae", "tai", "tao", "tau", "vae", "vai", "vao", "vau", "xae", "xai", "xao", "xau", "zae", "zai", "zao", "zau", "wae", "wai", "wao", "wau", "bea", "bei", "beo", "beu", "cea", "cei", "ceo", "ceu", "dea", "dei", "deo", "deu", "fea", "fei", "feo", "feu", "gea", "gei", "geo", "geu", "hea", "hei", "heo", "heu", "kea", "kei", "keo", "keu", "lea", "lei", "leo", "leu", "mea", "mei", "meo", "meu", "nea", "nei", "neo", "neu", "pea", "pei", "peo", "peu", "rea", "rei", "reo", "reu", "sea", "sei", "seo", "seu", "tea", "tei", "teo", "teu", "vea", "vei", "veo", "veu", "xea", "xei", "xeo", "xeu", "zea", "zei", "zeo", "zeu", "wea", "wei", "weo", "weu", "bia", "bie", "bio", "biu", "cia", "cie", "cio", "ciu", "dia", "die", "dio", "diu", "fia", "fie", "fio", "fiu", "gia", "gie", "gio", "giu", "hia", "hie", "hio", "hiu", "kia", "kie", "kio", "kiu", "lia", "lie", "lio", "liu", "mia", "mie", "mio", "miu", "nia", "nie", "nio", "niu", "pia", "pie", "pio", "piu", "ria", "rie", "rio", "riu", "sia", "sie", "sio", "siu", "tia", "tie", "tio", "tiu", "via", "vie", "vio", "viu", "xia", "xie", "xio", "xiu", "zia", "zie", "zio", "ziu", "wia", "wie", "wio", "wiu", "boa", "boe", "boi", "bou", "coa", "coe", "coi", "cou", "doa", "doe", "doi", "dou", "foa", "foe", "foi", "fou", "goa", "goe", "goi", "gou", "hoa", "hoe", "hoi", "hou", "koa", "koe", "koi", "kou", "loa", "loe", "loi", "lou", "moa", "moe", "moi", "mou", "noa", "noe", "noi", "nou", "poa", "poe", "poi", "pou", "roa", "roe", "roi", "rou", "soa", "soe", "soi", "sou", "toa", "toe", "toi", "tou", "voa", "voe", "voi", "vou", "xoa", "xoe", "xoi", "xou", "zoa", "zoe", "zoi", "zou", "woa", "woe", "woi", "wou", "bua", "bue", "bui", "buo", "cua", "cue", "cui", "cuo", "dua", "due", "dui", "duo", "fua", "fue", "fui", "fuo", "gua", "gue", "gui", "guo", "hua", "hue", "hui", "huo", "kua", "kue", "kui", "kuo", "lua", "lue", "lui", "luo", "mua", "mue", "mui", "muo", "nua", "nue", "nui", "nuo", "pua", "pue", "pui", "puo", "rua", "rue", "rui", "ruo", "sua", "sue", "sui", "suo", "tua", "tue", "tui", "tuo", "vua", "vue", "vui", "vuo", "xua", "xue", "xui", "xuo", "zua", "zue", "zui", "zuo", "wua", "wue", "wui", "wuo", "bay", "cay", "day", "fay", "gay", "hay", "kay", "lay", "may", "nay", "pay", "ray", "say", "tay", "vay", "xay", "zay", "way", "bey", "cey", "dey", "fey", "gey", "hey", "key", "ley", "mey", "ney", "pey", "rey", "sey", "tey", "vey", "xey", "zey", "wey", "bya", "bye", "byo", "byu", "cya", "cye", "cyo", "cyu", "dya", "dye", "dyo", "dyu", "fya", "fye", "fyo", "fyu", "gya", "gye", "gyo", "gyu", "hya", "hye", "hyo", "hyu", "kya", "kye", "kyo", "kyu", "lya", "lye", "lyo", "lyu", "mya", "mye", "myo", "myu", "nya", "nye", "nyo", "nyu", "pya", "pye", "pyo", "pyu", "rya", "rye", "ryo", "ryu", "sya", "sye", "syo", "syu", "tya", "tye", "tyo", "tyu", "vya", "vye", "vyo", "vyu", "xya", "xye", "xyo", "xyu", "zya", "zye", "zyo", "zyu", "wya", "wye", "wyo", "wyu", "boy", "coy", "doy", "foy", "goy", "gou", "hoy", "koy", "loy", "moy", "noy", "poy", "roy", "soy", "toy", "voy", "xoy", "zoy", "woy", "buy", "cuy", "duy", "fuy", "guy", "huy", "kuy", "luy", "muy", "nuy", "puy", "ruy", "suy", "tuy", "vuy", "xuy", "zuy", "wuy", "wuo", "qua", "que", "qui", "quo", "bla", "ble", "bli", "blo", "blu", "cla", "cle", "cli", "clo", "clu", "fla", "fle", "fli", "flo", "flu", "pla", "ple", "pli", "plo", "plu", "bra", "bre", "bri", "bro", "bru"],
        syll4 = ["ncia", "ncie", "ncio", "nciu", "nsia", "nsie", "nsio", "nsiu"],
        auxletters = ["r", "s", "n", "l"],
        semivogalsA = ["ea", "ia", "oa", "ua"],
        semivogalsE = ["ae", "ie", "oe", "ue"],
        semivogalsI = ["ai", "ei", "oi", "ui"],
        semivogalsO = ["ao", "eo", "io", "uo"],
        semivogalsU = ["au", "eu", "iu", "ou"],
        nouns = ["bo", "pop", "egg", "eek", "bow", "air", "map", "huh", "leo", "ben", "baa", "bam", "gus", "jax", "tux", "rip", "ugh", "boo", "ice", "ritz", "yoda", "kiva", "jake", "ally", "boom", "meow", "bear", "hack", "dora", "hoot", "zero", "ping", "lexi", "sign", "zeke", "gene", "coco", "hawk", "sand", "body", "cody", "eric", "loki", "tori", "tess", "davy", "mona", "lava", "joni", "fire", "baby", "rojo", "tiki", "zone", "fern", "lady", "ella", "dirt", "oink", "parp", "howl", "echo", "cleo", "burp", "dare", "woof", "hiss", "zing", "kali", "glug", "snap", "riot", "kona", "honk", "ahem", "skye", "plop", "bonk", "whip", "phew", "lila", "ajax", "beep", "ouch", "snip", "demi", "itch", "nova", "bawl", "vain", "peso", "yelp", "jess", "diva", "bong", "buzz", "drip", "obie", "jojo", "haley", "addie", "nikki", "tease", "brody", "oscar", "henry", "chloe", "chili", "champ", "kenzi", "holly", "elvis", "sasha", "crush", "bubba", "tyson", "teddy", "benji", "katie", "benny", "anvil", "snort", "vroom", "croak", "shush", "growl", "cluck", "miaow", "grunt", "flick", "munch", "cheep", "plunk", "achoo", "neigh", "whizz", "boink", "blare", "clunk", "clink", "whack", "plink", "smash", "yikes", "plonk", "chirp", "whirr", "creak", "lever", "vines", "flint", "apple", "wheat", "sugar", "angel", "adele", "spark", "misty", "sadie", "melon", "clock", "belch", "clang", "snarl", "snore", "splat", "chomp", "tweet", "chaos", "torch", "rails", "stick", "lacie", "rumor", "pluto", "gator", "bandy", "tango", "adios", "justy", "harry", "bodhi", "jewel", "aspen", "maple", "ginny", "chico", "flash", "scout", "hondo", "saint", "zante", "edora", "milly", "cigar", "comet", "mocha", "ribot", "rowdy", "woody", "salsa", "beast", "jack", "josie", "money", "crisp", "rosie", "heidi", "strut", "kelso", "arkle", "potato", "gravel", "ladder", "string", "cheval", "dallas", "tinkle", "sponge", "gailee", "shears", "lucera", "vinney", "nevada", "felise", "rascal", "victor", "fizzle", "gurgle", "regret", "jangle", "splash", "murmer", "squeak", "curlin", "alydar", "squawk", "waffle", "giggle", "guffaw", "sardar", "splosh", "mariah", "birdie", "portal", "bogart", "goldie", "hollie", "dexter", "sabino", "mutter", "cuckoo", "ribbit", "squish", "patter", "banter", "saddle", "bandit", "harley", "scotty", "daphne", "copper", "sporty", "spanky", "dakota", "dustin", "brutus", "jasper", "fiddle", "molson", "buster", "harvey", "apollo", "millie", "boomer", "dillon", "wapiti", "stumpy", "autumn", "gunner", "hattie", "watson", "beamer", "aurora", "maggie", "bailey", "shadow", "mickey", "peanut", "shiloh", "sunline", "vincent", "galileo", "ruffian", "atticus", "frankel", "carbine", "chester", "kincsem", "corizon", "varenne", "chortle", "slither", "durango", "thunder", "assault", "shergar", "needles", "lottery", "snuffle", "jasmine", "trickle", "barbaro", "godfrey", "natacha", "crackle", "chelsea", "screech", "eclipse", "paprika", "icefall", "cyandye", "smartie", "furnace", "trucker", "jukebox", "counsel", "coalore", "sulphur", "carrots", "mildred", "lilypad", "queball", "emerald", "patches", "cruiser", "flutter", "catdisc", "clatter", "leather", "bedrock", "splatter", "iroquois", "obsidian", "affirmed", "redstone", "hyperion", "minecart", "cauldron", "gloaming", "blazerod", "snowball", "zenyatta", "sherlock", "niatross", "bonemeal", "scarlett", "rhiannan", "mycelium", "trapdoor", "signpost", "midnight", "tripwire", "charcoal", "potatoes", "clipclop", "dingdong", "fletcher", "theodore", "callaway", "napoleon", "skewball", "citation", "nijinsky", "lexington", "nasrullah", "jefferson", "albatross", "remington", "aristides", "dispenser", "slimeball", "sandstone", "beethoven", "dandelion", "hickstead", "flowerpot", "sugarcane", "greyhound", "bookshelf", "broderick", "churchill", "birchwood", "buckpasser", "strawberry", "seabiscuit", "flyingbolt", "longfellow", "huckleberry", "secretariat", "bernborough", "clayticktock", "gainsborough", "exterminator", "kindergarten", "whistlejacket"],
        adjectives = ["wry", "lewd", "meek", "keen", "icky", "mere", "wary", "zoic", "zany", "wiry", "gamy", "lush", "sable", "elite", "sassy", "woozy", "amuck", "jaded", "utter", "daffy", "elfin", "raspy", "gaudy", "tacit", "quack", "wacky", "tangy", "kaput", "taboo", "ultra", "jazzy", "zippy", "yummy", "zesty", "testy", "ritzy", "bawdy", "ruddy", "nippy", "cagey", "yappy", "trite", "nappy", "zazzy", "earthy", "rampat", "fierce", "uppity", "knotty", "feeble", "shaggy", "elated", "quirky", "quaint", "torpid", "oafish", "plucky", "xenial", "paltry", "cooing", "sedate", "smoggy", "nimble", "zonked", "shrill", "ablaze", "zoetic", "somber", "sordid", "tawdry", "swanky", "lavish", "vulgar", "wiggly", "placid", "spiffy", "savory", "acidic", "versed", "idiotic", "hulking", "humdrum", "knowing", "melodic", "mammoth", "piquant", "parched", "optimal", "noxious", "oceanic", "onerous", "macabre", "lyrical", "aquatic", "jumbled", "jittery", "profuse", "languid", "prickly", "loutish", "longing", "immense", "furtive", "dynamic", "verdant", "hissing", "eatable", "elastic", "erratic", "damaged", "direful", "waggish", "wistful", "cynical", "deadpan", "defiant", "demonic", "wakeful", "warlike", "utopian", "vacuous", "zealous", "tedious", "frantic", "fretful", "berserk", "gainful", "billowy", "tenuous", "hideous", "callous", "boorish", "hellish", "hapless", "feigned", "squalid", "obeisant", "abrasive", "abnormal", "yielding", "ossified", "wretched", "penitent", "vigorous", "quixotic", "unwieldy", "rabbid", "resolute", "spurious", "succinct", "vagabond", "vengeful", "alluring", "wrathful", "probable", "volatile", "venomous", "picayune", "maniacal", "deranged", "hypnotic", "holistic", "devilish", "ethereal", "decisive", "colossal", "infamous", "debonair", "didactic", "hallowed", "flagrant", "fearless", "fabulous", "exultant", "fumbling", "diligent", "habitual", "guttural", "gruesome", "juvenile", "immenent", "coherent", "nebulous", "bustling", "merciful", "chemical", "grandiose", "voracious", "grotesque", "momentous", "miscreant", "guiltless", "ceaseless", "voiceless", "steadfast", "axiomatic", "enchanted", "brainless", "exuberant", "endurable", "truculent", "draconian", "vivacious", "divergent", "fanatical", "garrulous", "ambiguous", "recondite", "perpetual", "woebegone", "deafening", "insidious", "judicious", "combative", "quizzical", "ludicrous", "apathetic", "maddening", "barbarous", "luxuriant", "whimsical", "defective", "delerious", "abhorrent", "cloistered", "xenophilic", "bewildered", "victorious", "whispering", "capricious", "chivalrous", "disastrous", "cumbersome", "glistening", "hysterical", "evanescent", "scandalous", "harmonious", "statuesque", "rhetorical", "invincible", "obsequious", "omniscient", "nonchalant", "lamentable", "stupendous", "auspicious", "thundering", "ubiquitous", "fluttering", "numberless", "sweltering", "fallacious", "efficacious", "domineering", "nondescript", "quarrelsome", "calculating", "psychedelic", "tightfisted", "highfalutin", "dispensable", "belligerent", "illustrious", "industrious", "overwrought", "inquisitive", "earsplitting", "rambunctious", "incandescent", "parsimonious", "questionable", "scintillating", "lackadaisical", "disillusioned"];

    function generateSemiVogal(e) {
        var a, i = Math.floor(4 * Math.random());
        switch (e) {
            case "a":
                a = semivogalsA[i];
                break;
            case "e":
                a = semivogalsE[i];
                break;
            case "i":
                a = semivogalsI[i];
                break;
            case "o":
                a = semivogalsO[i];
                break;
            case "u":
                a = semivogalsU[i];
                break;
            default:
                a = semivogalsO[i]
        }
        return a
    }

    function generate2Letters() {
        var e = Math.floor(Math.random() * syll2.length);
        return syll2[e]
    }

    function generate4Letters() {
        var e = Math.floor(Math.random() * (syll2.length + syll3.length + syll4.length));
        return e < syll2.length ? syll2[e] : e < syll3.length + syll2.length ? (e -= syll2.length, syll3[e]) : (e -= syll2.length + syll3.length, syll4[e])
    }

    function generate3Letters() {
        var e = Math.floor(Math.random() * (syll2.length + syll3.length));
        return e < syll2.length ? syll2[e] : (e -= syll2.length, syll3[e])
    }

    function generateLetter() {
        var e = Math.floor(Math.random() * auxletters.length);
        return auxletters[e]
    }

    function generateRandomName(e) {
        var a = "";
        return (e < 4 || 8 < e) && (e = 5), a += generate3Letters(), 4 === e ? 2 === a.length ? a += generate2Letters() : a += generateLetter() : 5 === e ? (2 === a.length && (a += generate3Letters()), 3 === a.length ? a += generate2Letters() : 4 === a.length && (a += generateLetter())) : 6 === e ? (5 === (a += generate3Letters()).length && (a += generateLetter()), 4 === a.length && (a += generate2Letters())) : 7 === e ? (4 === (a += generate4Letters()).length && (a += generate3Letters()), 5 === a.length && (a += generate2Letters()), 6 === a.length && (a += generateLetter())) : 8 === e && (4 === (a += generate4Letters()).length && (a += generate4Letters()), 5 === a.length && (a += generate3Letters()), 6 === a.length && (a += generate2Letters()), 7 === a.length && (a += generateLetter())), -1 !== a.indexOf("aa") ? a = a.replace("aa", generateSemiVogal("a")) : -1 !== a.indexOf("ee") ? a = a.replace("ee", generateSemiVogal("e")) : -1 !== a.indexOf("ii") ? a = a.replace("ii", generateSemiVogal("i")) : -1 !== a.indexOf("oo") ? a = a.replace("oo", generateSemiVogal("o")) : -1 !== a.indexOf("uu") && (a = a.replace("uu", generateSemiVogal("u"))), capitalize(a)
    }

    function generateNounName() {
        var e = Math.floor(Math.random() * nouns.length),
            a = Math.floor(Math.random() * adjectives.length),
            i = nouns[e];
        return capitalize(adjectives[a]) + capitalize(i)
    }

    function generatePersonalName() {
        var e = [],
            a = document.getElementById("first_name").value.trim(),
            i = document.getElementById("last_name").value.trim();
        "" === a && (a = nouns[Math.floor(Math.random() * nouns.length)]), "" === i && (i = adjectives[Math.floor(Math.random() * adjectives.length)]), "function" == typeof a.normalize && (a = a.normalize("NFD").replace(/[\u0300-\u036f]/g, ""), i = i.normalize("NFD").replace(/[\u0300-\u036f]/g, ""));
        var o = a.substr(a.length - 2),
            t = i.substr(0, 3),
            n = a.substr(0, 3),
            l = i.substr(i.length - 2);
        return e.push(capitalize(t + o) + capitalize(n + l)), e.push(capitalize(t + n) + capitalize(o + l)), e.push(toL33t(capitalize(t + o) + capitalize(n + l))), e.push(toL33t(a + i)), e.push(capitalize(adjectives[Math.floor(Math.random() * adjectives.length)]) + capitalize(a)), e.push(capitalize(adjectives[Math.floor(Math.random() * adjectives.length)]) + capitalize(i)), e.push(capitalize(a) + "The" + capitalize(adjectives[Math.floor(Math.random() * adjectives.length)])), e.push("The" + capitalize(adjectives[Math.floor(Math.random() * adjectives.length)]) + capitalize(i)), e.push(capitalize(t + o) + generateRandomName(5)), e.push(capitalize(a) + syll3[Math.floor(Math.random() * syll3.length)]), e.push(capitalize(i) + syll3[Math.floor(Math.random() * syll3.length)]), e.push(capitalize(syll3[Math.floor(Math.random() * syll3.length)]) + a), e.push(capitalize(syll3[Math.floor(Math.random() * syll3.length)]) + i), e.push(capitalize(nouns[Math.floor(Math.random() * nouns.length)]) + capitalize(a)), e.push(capitalize(a) + "Of" + capitalize(nouns[Math.floor(Math.random() * nouns.length)])), e.push((capitalize(a) + "san").replace("ssan", "san")), e.push((capitalize(i) + "sama").replace("ssama", "sama")), e.push((capitalize(a) + "desu").replace("ddesu", "desu")), e.push((capitalize(a) + "kun").replace("kkun", "kun")), e.push((capitalize(i) + "mann").replace("mmann", "mann")), e.push((capitalize(a) + "off").replace("oo", generateSemiVogal("o"))), e.push((capitalize(a) + "ovski").replace("oo", "o")), e.push((capitalize(i) + "sson").replace("ssson", "sson")), e.push((capitalize(i) + "strom").replace("sstrom", "strom")), e.push((capitalize(i) + "chenko").replace("cchenko", "chenko")), e.push((capitalize(i) + "litz").replace("llitz", "litz")), e.push((capitalize(i) + "stein").replace("sstein", "stein")), e.push("Van" + capitalize(i)), e.push("Von" + capitalize(i)), e.push("Das" + capitalize(i)), shuffle(e)
    }

    function generateName(e, a) {
        switch (e) {
            case "noun":
                return generateNounName();
            default:
            case "random":
                return generateRandomName(a)
        }
    }
    var alphabets = {
        a: "4",
        b: "8",
        e: "3",
        g: "6",
        i: "1",
        o: "0",
        p: "9",
        s: "5",
        t: "7",
        z: "2"
    };

    function toL33t(e) {
        for (var a = 1; a < e.length; a++) alphabets[e[a]] && (e = e.replace(e[a], alphabets[e[a]]).replace(" ", ""));
        return e
    }
    var isMobile = !1;

    function _displayError(e) {
        var a = document.getElementById("errorMessage"),
            i = document.getElementById("nicks");
        null === a && (i.innerHTML = '<div id="errorMessage"><span style="color:red">' + e + "</span></div>")
    }

    function displayNew() {
        var e = parseInt(document.getElementById("limit").value, 10),
            a = document.getElementById("quantity"),
            i = parseInt(a.value, 10),
            o = document.getElementById("method").value;
        300 < i && (i = document.getElementById("quantity").value = 300);
        var t = [];
        if ("personal" !== o && 0 < i)
            for (var n = 0; n < i; n++) t.push(generateName(o, e));
        else "personal" !== o && i <= 0 ? _displayError("Por favor coloque um número entre 1 e 300 no <strong>Nº de links a gerar</strong>") : t = generatePersonalName();
        if ("personal" !== o && i <= 0);
        else {
            for (var l = "<ul>", u = 0; u < t.length; u++) l += '<li><span class="generated-nick">' + t[u] + ' <span class="clipboard-copy"></span></span></li>';
            document.getElementById("nicks").innerHTML = l + "</ol>", "object" == typeof fourdevs && fourdevs.attachCopy()
        }
    }

    function shuffle(e) {
        var a, i, o;
        for (o = e.length - 1; 0 < o; o--) a = Math.floor(Math.random() * (o + 1)), i = e[o], e[o] = e[a], e[a] = i;
        return e
    }

    function capitalize(e) {
        return e.charAt(0).toUpperCase() + e.slice(1)
    }

    function displayOptions() {
        for (var e = document.getElementsByClassName("option"), a = 0; a < e.length; a++) e[a].style.display = "none";
        switch (document.getElementById("method").value) {
            case "noun":
                document.getElementById("number-nicks").style.display = "block";
                break;
            case "personal":
                document.getElementById("name-input").style.display = "block", document.getElementById("surname-input").style.display = "block";
                break;
            default:
            case "random":
                document.getElementById("max-letters").style.display = "block", document.getElementById("number-nicks").style.display = "block"
        }
        displayNew()
    }

    function sendEvent(e) {
        "function" == typeof ga && ga("send", "event", "NickGenerator", "generate", e)
    }(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) && (isMobile = !0), document.getElementById("bt_gerar_nick").addEventListener("click", function() {
        switch (displayNew(), document.getElementById("method").value) {
            case "noun":
                sendEvent("Nome + Adjectivo");
                break;
            case "personal":
                sendEvent("A partir do nome");
                break;
            default:
            case "random":
                sendEvent("Aleatório")
        }
    }), document.getElementById("method").addEventListener("change", function() {
        displayOptions()
    }), displayOptions();
</script>