<?php

namespace App\Helpers;

use DateTime;

class Helper
{

    public static function formatRole($role)
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

    public static function formatRoleFull($role)
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

    public static function formatDate($date)
    {
        return (new DateTime($date))->format('d/m/Y');
    }

    public static function formatFinance($cat)
    {
        switch ($cat) {
            case 'in_awards':
                return 'Prêmios';
                break;
            case 'in_fines':
                return 'Juros';
                break;
            case 'in_loan':
                return 'Empréstimos';
                break;
            case 'in_selling_players':
                return 'Venda de jogadores';
                break;
            case 'in_several':
                return 'Diversos';
                break;
            case 'in_sponsorships':
                return 'Patrocínios';
                break;
            case 'in_supporter_partner':
                return 'Sócio torcedor';
                break;
            case 'in_last_month':
                return 'Mês anterior';
                break;

            case 'out_buying_players':
                return 'Compra de jogadores';
                break;
            case 'out_fines':
                return 'Juros';
                break;
            case 'out_loan':
                return 'Empréstimo';
                break;
            case 'out_salary':
                return 'Salários';
                break;
            case 'out_several':
                return 'Diversos';
                break;
            case 'out_last_month':
                return 'Mês anterior';
                break;

        }
    }

    public static function getYear($date)
    {
        return explode('-', $date)[0];
    }

    public static function getQuotas($n)
    {
        $quotas = [
            "'A dor é temporária, a vitória é eterna.' – Aatrox",
            "'Se você quiser jogar comigo, é melhor conhecer bem o jogo.' – Ahri",
            "'Não confunda piedade com fraqueza.' – Ashe",
            "'Um coração gelado só precisa de um coração caloroso.' – Braum",
            "'Quanto mais negra a noite, mais brilhantes são as estrelas.' – Braum",
            "'Não importa quanto tempo você tem, mas como você o usa.' - Ekko",
            "'Ei, olhe, estou abrindo a minha caixa de preocupações! Um momento. Está vazia!' - Jinx",
            "'A escalada é longa, mas a vista vale a pena!' - Taric",
            "'Posso falhar, mas não vou desistir.' - Ryze",
            "'Se estiverem esperando que eu desista, é bom esperarem sentados.' - Poppy",
            "'O ego sempre deixa todos de joelhos.' – Camille",
            "'Regras foram feitas para serem quebradas...como prédios ou pessoas!' - Jinx",
            "'A lua nova está nascendo.' - Diana",
            "'Fique sabendo que se a situação fosse outra, eu não teria piedade de você.' - Veigar",
            "'A violência resolve tudo.' - Katarina",
            "'Bata primeiro, faça perguntas enquanto espanca.' - Vi",
            "'Precisão é a diferença entre um açougueiro e um cirurgião.' - Camille",
            "'Capitão Teemo no comando.' - Teemo",
            "'Só você pode me ouvir invocador, que obra-prima devemos tocar hoje?' - Sona",
            "'Shurima, seu imperador retornou!' - Azir",
            "'Bem-Vindos à League of Draven.' - Draven",
            "'Achei que nunca fosse me escolher.' - Amumu",
            "'Nunca um....Sem o outro.' - Kindred",
            "'Coração é o músculo mais forte.' - Braum",
            "'Minha cor favorita é Primavera.' - Ivern",
            "'Se é você que vai pagar eu tô dentro!' - Gragas",
            "'Minha espada à seu dispor.' - Master Yi",
            "'Tudo o que está quebrado, pode ser reforjado.' - Riven",
            "'Uma para cortar, uma para selar.' - Yone",
            "'Somente a aranha está à salvo em sua teia.' - Elise",
            "'Que tal um truque de mágica?' - Shaco",
            "'A sorte não está a favor dos tolos.' - Miss Fortune",
            "'Quem atira por Bandópolis, atira para sempre.' - Tristana",
            "'Duro como pedra.' - Malphite",
            "'Eu sempre cobro minha parte, seja com ouro...ou sangue!' - Sivir",
            "'Deixe a escuridão tomar conta de você.' - Nocturne",
            "'Tanto poder irrestrito!' - Syndra",
            "'Eu decido o que a maré trará!' - Nami",
            "'Qualquer aventura é melhor com amigo WUURR. Hehe.' - Nunu & Willump",
            "'Eu cuido do caso.' - Caitlyn",
            "'Pronto para incendiar o mundo.' - Brand",
            "'Não sou uma heroína...só uma Yordle com um martelo.' - Poppy",
            "'Lute pelas primeiras terras.' - Irelia",
            "'Eba! Vai ser divertido, né?' - Zoe",
            "'Meu ferrão trará uma morte hedionda.' - Skarner",
            "'Eu enterrarei o mundo em gelo.' - Lissandra",
            "'Enquanto eu viver, ninguém há de sofrer.' - Soraka",
            "'Tema o poder que você não pode ver.' - Swain",
            "'Hora de trollar.' - Trundle",
            "'O mundo todo em uma flecha.' - Ashe",
            "'Se acha esperto não é mesmo?' - Ahri",
            "'Vamos dançar meu povo!' - Rakan",
            "'Me chame de rei, me chame de demônio, a água esquece o nome dos afogados.' - Tahm Kench",
            "'A morte é como o vento, sempre ao meu lado.' - Yasuo",
            "'O poder do vento está sob seu comando.' - Janna",
            "'Vivemos e morremos pela lâmina.' - Talon",
            "'Vamos à caça daqueles que caíram na escuridão.' - Vayne",
            "'Vê aquele brilho de esperança? Sou eu!' - Taric",
            "'Temam a assassina sem mestre.' - Akali",
            "'Você quer brincar também? Vai ser divertido!' - Annie",
            "'Os rios ficarão vermelhos.' - Vladimir",
            "'Vamos iluminar isso aqui!' - Lux",
            "'Esta noite, nós caçaremos!' - Rengar",
            "'Conheça o tear, seja a pedra.' - Taliyah",
            "'Um passo a frente do cataclisma!' - Ryze",
            "'Agora vocês podem me adorar.' - Qiyana",
            "'Que tal um drink?' - Singed",
            "'Descansar é para os vivos.' - Sion",
            "'A lâmina que não se vê é a mais mortífera.' - Zed",
            "'O lance não é quanto tempo você tem, é como você usa.' - Ekko",
            "'Vamos eliminar seus inimigos. Isso vai ser divertido.' - Orianna",
            "'Sinta o aconchego dos espinhos.' - Zyra",
            "'Tenho correntes, mas remo contra elas.' - Morgana",
            "'Eu nunca resisto a um convite pra dançar.' - Xayah",
            "'Meu coração e espada, sempre por Demácia!' - Garen",
            "'Aceito a missão! Pera, pra onde a gente vai?' - Ezreal",
            "'A rosa negra irá desabrochar novamente.' - LeBlanc",
            "'Você provará seu valor? Provavelmente não.' - Kayn",
            "'No massacre, floresço! Como uma flor no amanhecer.' - Jhin",
            "'Isso vai ser um estouro.' - Ziggs",
            "'Energizado e pronto para servir.' - Blitzcrank",
            "'Você sabe que me quer.' - Evelynn",
            "'Em minhas asas.' - Anivia",
            "'Não há antídoto para mim.' - Cassiopeia",
            "'Somente eu posso nos levar a vitória!' - Darius",
            "'A demonstração de um julgamento superior.' - Shen",
            "'Agonia, Êxtase, Paz....cada passagem tem sua própria beleza.' - Karthus",
            "'Mudar faz bem.' - Kha'Zix",
            "'Eu fui criado pra isso...literalmente.' - Zac",
            "'Vamos à arena.' - Xin Zhao",
            "'Ninguém luta sozinho na névoa.' - Senna",
            "'Anseio por um adversário à altura.' - Fiora",
            "'Contemple o poder da Ilha das Sombras.' - Hecarim",
            "'Os olhos nunca mentem.' - Kennen",
            "'Coragem pra mim é imprevisível! É na insanidade, à todo vapor que você pode confiar!' - Kled",
            "'Sentirão o terror da natureza.' - Nidalee",
            "'Você é a caça ou o caçador?' - Kai'sa",
            "'O ciclo da vida e da morte continua. Nós viveremos, eles morrerão.' - Nasus",
            "'Não seremos enjaulados.' - Sylas",
            "'Não sou muito fã de sermões, ossos quebrados ensinam melhor.' - Illaoi",
            "'Unam-se á gloriosa revoluçao.' - Viktor",
            "'Que deleite de agonia vamos inflingir?' - Thresh",
            "'Conhecimento através da desintegração.' - Vel'Koz",
            "'Afundemos a todos!' - Pyke",
            "'Nada pode me impedir.' - Alistar",
            "'A sorte sempre me sorri.' - Twisted Fate",
            "'Pronto para voar ao seu lado.' - Corki",
            "'Meu coração já estava partido.' - Viego",
            "'Em batalha, nós renascemos.' - Pantheon",
            "'Não tem pra ninguém!' - Sett",
            "'Sua vontade, minhas mãos.' - Lee Sin",
            "'Um sonho que virou realidade.' - Lillia",
            "'A aurora chegou.' - Leona",
            "'Hora da comida.' - Kog'maw",
            "'Todo mundo morre, alguns só precisam de uma ajudinha.' - Lucian",
            "'Você desejou que o mundo que conhece acabe? SIM!' - Cho'gath",
            "'Temam as profundezas.' - Nautilus",
            "'A justiça ganha asas.' - Quinn e Valor",
            "'Eu serei o melhor!' - Wukong",
            "'Eu luto por um futuro iluminado.' - Jayce",
            "'As ilhas florescerão novamente.' - Maokai",
            "'Vão tremer diante da minha perfeição.' - Kayle",
            "'Morte a todos os traidores.' - Kalista",
            "'Eu sou o terror de todos que se opõem à mim.' - Shyvana",
            "'Vamos encarar o perigo.' - Graves",
            "'O oblivion o aguarda.' - Malzahar",
            "'Eu acabo com eles!' - Fizz",
            "'Ouçam...o silêncio depois da aniquilação.' - Aatrox",
            "'Prazer em conhecer você.' - Lulu",
            "'O equilíbrio do poder deve ser preservado.' - Kassadin",
            "'Eu serei livre.' - Xerath",
            "'Destino. Dominação. Desonra.' - Mordekaiser",
            "'Vamos mudar o mundo!' - Seraphine",
            "'Sempre confie em seu espírito.' - Karma",
            "'Nem mesmo as chamas ou as profundezas poderão clamar por mim.' - Gangplank",
            "'Sabia que você faria isso.' - Zilean",
            "'De fato, uma sábia escolha.' - Heimerdinger",
            "'Que a tempestade nos guie em meu despertar.' - Volibear",
            "'Enquanto eu viver, todos morrerão.' - Renekton",
            "'Ninguém entra, ninguém sai.' - Rell",
            "'Não deixe nada para trás.' - Olaf",
            "'Isso vai ser um grande massacre.' - Tryndamere",
            "'Vamos lá.' - Jax",
            "'Os culpados conhecerão a agonia.' - Varus",
            "'Naturalmente.' - Aurelion Sol",
            "'A força só se revela quando se é destroçado.' - Urgot",
            "'Não tema, farei bom uso de seu cadáver.' - Yorick",
            "'É estilo que você quer? Toma!' - Samira",
            "'Ugh, o que você quer?' - Twitch",
            "'É hora de fazer a diferença.' - Galio",
            "'É meu dever dar um fim à isso.' - Jarvan IV",
            "'Nossa ira está além do seu controle.' - Udyr",
            "'Vamos à luta.' - Rumble",
            "'Não confie em nada além da sua força.' - Sejuani",
            "'O sangue corre...assim como todos!' - Warwick",
            "'Tá bom, vamos...' - Ornn",
        ];

        shuffle($quotas);

        return array_slice($quotas, 0, $n);
    }
}
