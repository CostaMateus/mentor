<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("countries")->truncate();

        $data = [
            [
                "code"   => "AF",
                "code3"  => "AFG",
                "name"   => "Afeganistão",
                "formal" => "República Islâmica do Afeganistão"
            ],
            [
                "code"   => "AL",
                "code3"  => "ALB",
                "name"   => "Albânia",
                "formal" => "República da Albânia"
            ],
            [
                "code"   => "DZ",
                "code3"  => "DZA",
                "name"   => "Algéria",
                "formal" => "República Democrática Popular da Algéria"
            ],
            [
                "code"   => "AS",
                "code3"  => "ASM",
                "name"   => "Samoa Americana",
                "formal" => "Território de Samoa Americana"
            ],
            [
                "code"   => "AD",
                "code3"  => "AND",
                "name"   => "Andorra",
                "formal" => "Principado Andorra"
            ],
            [
                "code"   => "AO",
                "code3"  => "AGO",
                "name"   => "Angola",
                "formal" => "República de Angola"
            ],
            [
                "code"   => "AI",
                "code3"  => "AIA",
                "name"   => "Anguilla",
                "formal" => "Anguilla"
            ],
            [
                "code"   => "AQ",
                "code3"  => "ATA",
                "name"   => "Antártida",
                "formal" => "Antártida"
            ],
            [
                "code"   => "AG",
                "code3"  => "ATG",
                "name"   => "Antigua e Barbuda",
                "formal" => "Antigua e Barbuda"
            ],
            [
                "code"   => "AR",
                "code3"  => "ARG",
                "name"   => "Argentina",
                "formal" => "República Argentina"
            ],
            [
                "code"   => "AM",
                "code3"  => "ARM",
                "name"   => "Armênia",
                "formal" => "República da Armênia"
            ],
            [
                "code"   => "AW",
                "code3"  => "ABW",
                "name"   => "Aruba",
                "formal" => "Aruba"
            ],
            [
                "code"   => "AU",
                "code3"  => "AUS",
                "name"   => "Austrália",
                "formal" => "Comunidade da Austrália"
            ],
            [
                "code"   => "AT",
                "code3"  => "AUT",
                "name"   => "Áustria",
                "formal" => "República da Áustria"
            ],
            [
                "code"   => "AZ",
                "code3"  => "AZE",
                "name"   => "Azerbaijão",
                "formal" => "República do Azerbaijão"
            ],
            [
                "code"   => "BS",
                "code3"  => "BHS",
                "name"   => "Bahamas",
                "formal" => "Comunidade de Bahamas"
            ],
            [
                "code"   => "BH",
                "code3"  => "BHR",
                "name"   => "Bahrein",
                "formal" => "Reino do Bahrein"
            ],
            [
                "code"   => "BD",
                "code3"  => "BGD",
                "name"   => "Bangladesh",
                "formal" => "República Popular de Bangladesh"
            ],
            [
                "code"   => "BB",
                "code3"  => "BRB",
                "name"   => "Barbados",
                "formal" => "Barbados"
            ],
            [
                "code"   => "BY",
                "code3"  => "BLR",
                "name"   => "Bielorrússia",
                "formal" => "República da Bielorrússia"
            ],
            [
                "code"   => "BE",
                "code3"  => "BEL",
                "name"   => "Bélgica",
                "formal" => "Reino da Bélgica"
            ],
            [
                "code"   => "BZ",
                "code3"  => "BLZ",
                "name"   => "Belize",
                "formal" => "Belize"
            ],
            [
                "code"   => "BJ",
                "code3"  => "BEN",
                "name"   => "Benin",
                "formal" => "República do Benin"
            ],
            [
                "code"   => "BM",
                "code3"  => "BMU",
                "name"   => "Bermuda",
                "formal" => "Bermuda"
            ],
            [
                "code"   => "BT",
                "code3"  => "BTN",
                "name"   => "Butão",
                "formal" => "Reino do Butão"
            ],
            [
                "code"   => "BO",
                "code3"  => "BOL",
                "name"   => "Bolívia",
                "formal" => "Estado Plurinacional da Bolívia"
            ],
            [
                "code"   => "BA",
                "code3"  => "BIH",
                "name"   => "Bósnia e Herzegovina",
                "formal" => "Bósnia e Herzegovina"
            ],
            [
                "code"   => "BW",
                "code3"  => "BWA",
                "name"   => "Botswana",
                "formal" => "República da Botswana"
            ],
            [
                "code"   => "BV",
                "code3"  => "BVT",
                "name"   => "Ilha Bouvet",
                "formal" => "Ilha Bouvet"
            ],
            [
                "code"   => "BR",
                "code3"  => "BRA",
                "name"   => "Brasil",
                "formal" => "República Federativa do Brasil"
            ],
            [
                "code"   => "IO",
                "code3"  => "IOT",
                "name"   => "Território Britânico do Oceano Índico",
                "formal" => "Território Britânico do Oceano Índico"
            ],
            [
                "code"   => "BN",
                "code3"  => "BRN",
                "name"   => "Brunei",
                "formal" => "Estado do Brunei Darussalam"
            ],
            [
                "code"   => "BG",
                "code3"  => "BGR",
                "name"   => "Bulgária",
                "formal" => "República da Bulgária"
            ],
            [
                "code"   => "BF",
                "code3"  => "BFA",
                "name"   => "Burkina Faso",
                "formal" => "Burkina Faso"
            ],
            [
                "code"   => "BI",
                "code3"  => "BDI",
                "name"   => "Burundi",
                "formal" => "República do Burundi"
            ],
            [
                "code"   => "KH",
                "code3"  => "KHM",
                "name"   => "Camboja",
                "formal" => "Reino do Camboja"
            ],
            [
                "code"   => "CM",
                "code3"  => "CMR",
                "name"   => "Camarões",
                "formal" => "República de Camarões"
            ],
            [
                "code"   => "CA",
                "code3"  => "CAN",
                "name"   => "Canadá",
                "formal" => "Canadá"
            ],
            [
                "code"   => "CV",
                "code3"  => "CPV",
                "name"   => "Cabo Verde",
                "formal" => "República do Cabo Verde"
            ],
            [
                "code"   => "KY",
                "code3"  => "CYM",
                "name"   => "Ilhas Cayman",
                "formal" => "Ilhas Cayman"
            ],
            [
                "code"   => "CF",
                "code3"  => "CAF",
                "name"   => "República Centro-Africana",
                "formal" => "República Centro-Africana"
            ],
            [
                "code"   => "TD",
                "code3"  => "TCD",
                "name"   => "Chade",
                "formal" => "República do Chade"
            ],
            [
                "code"   => "CL",
                "code3"  => "CHL",
                "name"   => "Chile",
                "formal" => "República do Chile"
            ],
            [
                "code"   => "CN",
                "code3"  => "CHN",
                "name"   => "China",
                "formal" => "República Popular da China"
            ],
            [
                "code"   => "CX",
                "code3"  => "CXR",
                "name"   => "Ilha Christmas",
                "formal" => "Território da Ilha Christmas"
            ],
            [
                "code"   => "CC",
                "code3"  => "CCK",
                "name"   => "Ilhas Cocos (Keeling)",
                "formal" => "Território das Ilhas Cocos (Keeling)"
            ],
            [
                "code"   => "CO",
                "code3"  => "COL",
                "name"   => "Colômbia",
                "formal" => "República da Colômbia"
            ],
            [
                "code"   => "KM",
                "code3"  => "COM",
                "name"   => "Comores",
                "formal" => "União das Comores"
            ],
            [
                "code"   => "CG",
                "code3"  => "COG",
                "name"   => "Congo",
                "formal" => "República do Congo"
            ],
            [
                "code"   => "CD",
                "code3"  => "COD",
                "name"   => "Congo (DR)",
                "formal" => "República Democrática do Congo"
            ],
            [
                "code"   => "CK",
                "code3"  => "COK",
                "name"   => "Ilhas Cook",
                "formal" => "Ilhas Cook"
            ],
            [
                "code"   => "CR",
                "code3"  => "CRI",
                "name"   => "Costa Rica",
                "formal" => "República da Costa Rica"
            ],
            [
                "code"   => "CI",
                "code3"  => "CIV",
                "name"   => "Costa do Marfim",
                "formal" => "República da Costa do Marfim"
            ],
            [
                "code"   => "HR",
                "code3"  => "HRV",
                "name"   => "Croácia",
                "formal" => "República da Croácia"
            ],
            [
                "code"   => "CU",
                "code3"  => "CUB",
                "name"   => "Cuba",
                "formal" => "República de Cuba"
            ],
            [
                "code"   => "CY",
                "code3"  => "CYP",
                "name"   => "Chipre",
                "formal" => "República do Chipre"
            ],
            [
                "code"   => "CZ",
                "code3"  => "CZE",
                "name"   => "República Tcheca",
                "formal" => "República Tcheca"
            ],
            [
                "code"   => "DK",
                "code3"  => "DNK",
                "name"   => "Dinamarca",
                "formal" => "Reino da Dinamarca"
            ],
            [
                "code"   => "DJ",
                "code3"  => "DJI",
                "name"   => "Djibuti",
                "formal" => "República do Djibuti"
            ],
            [
                "code"   => "DM",
                "code3"  => "DMA",
                "name"   => "Dominica",
                "formal" => "Comunidade da Dominica"
            ],
            [
                "code"   => "DO",
                "code3"  => "DOM",
                "name"   => "República Dominicana",
                "formal" => "República Dominicana"
            ],
            [
                "code"   => "EC",
                "code3"  => "ECU",
                "name"   => "Equador",
                "formal" => "República do Equador"
            ],
            [
                "code"   => "EG",
                "code3"  => "EGY",
                "name"   => "Egito",
                "formal" => "República Árabe do Egito"
            ],
            [
                "code"   => "SV",
                "code3"  => "SLV",
                "name"   => "El Salvador",
                "formal" => "República El Salvador"
            ],
            [
                "code"   => "GQ",
                "code3"  => "GNQ",
                "name"   => "Guiné Equatorial",
                "formal" => "República do Guiné Equatorial"
            ],
            [
                "code"   => "ER",
                "code3"  => "ERI",
                "name"   => "Eritreia",
                "formal" => "Estado da Eritreia"
            ],
            [
                "code"   => "EE",
                "code3"  => "EST",
                "name"   => "Estônia",
                "formal" => "República da Estônia"
            ],
            [
                "code"   => "ET",
                "code3"  => "ETH",
                "name"   => "Etiópia",
                "formal" => "República Democrática Federal da Etiópia"
            ],
            [
                "code"   => "FK",
                "code3"  => "FLK",
                "name"   => "Ilhas Malvinas",
                "formal" => "Ilhas Malvinas"
            ],
            [
                "code"   => "FO",
                "code3"  => "FRO",
                "name"   => "Ilhas Faroe",
                "formal" => "Ilhas Faroe"
            ],
            [
                "code"   => "FJ",
                "code3"  => "FJI",
                "name"   => "Fiji",
                "formal" => "República do Fiji"
            ],
            [
                "code"   => "FI",
                "code3"  => "FIN",
                "name"   => "Finlândia",
                "formal" => "República da Finlândia"
            ],
            [
                "code"   => "FR",
                "code3"  => "FRA",
                "name"   => "França",
                "formal" => "República Francesa"
            ],
            [
                "code"   => "GF",
                "code3"  => "GUF",
                "name"   => "Guiana Francesa",
                "formal" => "Guiana Francesa"
            ],
            [
                "code"   => "PF",
                "code3"  => "PYF",
                "name"   => "Polinésia Francesa",
                "formal" => "Polinésia Francesa"
            ],
            [
                "code"   => "TF",
                "code3"  => "ATF",
                "name"   => "Terras Austrais e Antárticas Francesas",
                "formal" => "Território das Terras Austrais e Antárticas Francesas"
            ],
            [
                "code"   => "GA",
                "code3"  => "GAB",
                "name"   => "Gabão",
                "formal" => "República Gabonesa"
            ],
            [
                "code"   => "GM",
                "code3"  => "GMB",
                "name"   => "Gâmbia",
                "formal" => "República da Gâmbia"
            ],
            [
                "code"   => "GE",
                "code3"  => "GEO",
                "name"   => "Geórgia",
                "formal" => "Geórgia"
            ],
            [
                "code"   => "DE",
                "code3"  => "DEU",
                "name"   => "Alemanha",
                "formal" => "República Federal da Alemanha"
            ],
            [
                "code"   => "GH",
                "code3"  => "GHA",
                "name"   => "Gana",
                "formal" => "Repúblia de Gana"
            ],
            [
                "code"   => "GI",
                "code3"  => "GIB",
                "name"   => "Gibraltar",
                "formal" => "Gibraltar"
            ],
            [
                "code"   => "GR",
                "code3"  => "GRC",
                "name"   => "Grécia",
                "formal" => "República Helênica"
            ],
            [
                "code"   => "GL",
                "code3"  => "GRL",
                "name"   => "Groelândia",
                "formal" => "Groelândia"
            ],
            [
                "code"   => "GD",
                "code3"  => "GRD",
                "name"   => "Granada",
                "formal" => "Granada"
            ],
            [
                "code"   => "GP",
                "code3"  => "GLP",
                "name"   => "Guadalupe",
                "formal" => "Guadalupe"
            ],
            [
                "code"   => "GU",
                "code3"  => "GUM",
                "name"   => "Guão",
                "formal" => "Território do Guão"
            ],
            [
                "code"   => "GT",
                "code3"  => "GTM",
                "name"   => "Guatemala",
                "formal" => "República da Guatemala"
            ],
            [
                "code"   => "GN",
                "code3"  => "GIN",
                "name"   => "Guiné",
                "formal" => "República do Guiné"
            ],
            [
                "code"   => "GW",
                "code3"  => "GNB",
                "name"   => "Guiné-Bissau",
                "formal" => "República da Guiné-Bissau"
            ],
            [
                "code"   => "GY",
                "code3"  => "GUY",
                "name"   => "Guiana",
                "formal" => "República Cooperativa da Guiana"
            ],
            [
                "code"   => "HT",
                "code3"  => "HTI",
                "name"   => "Haiti",
                "formal" => "República do Haiti"
            ],
            [
                "code"   => "HM",
                "code3"  => "HMD",
                "name"   => "Ilhas Heard e McDonald",
                "formal" => "Território das Ilhas Heard e McDonald"
            ],
            [
                "code"   => "VA",
                "code3"  => "VAT",
                "name"   => "Vaticano",
                "formal" => "Estado da Cidade do Vaticano"
            ],
            [
                "code"   => "HN",
                "code3"  => "HND",
                "name"   => "Honduras",
                "formal" => "República de Honduras"
            ],
            [
                "code"   => "HK",
                "code3"  => "HKG",
                "name"   => "Hong Kong",
                "formal" => "Região Administrativa Especial de Hong Kong da República Popular da China"
            ],
            [
                "code"   => "HU",
                "code3"  => "HUN",
                "name"   => "Hungria",
                "formal" => "Hungria"
            ],
            [
                "code"   => "IS",
                "code3"  => "ISL",
                "name"   => "Islândia",
                "formal" => "Islândia"
            ],
            [
                "code"   => "IN",
                "code3"  => "IND",
                "name"   => "Índia",
                "formal" => "República da Índia"
            ],
            [
                "code"   => "ID",
                "code3"  => "IDN",
                "name"   => "Indonésia",
                "formal" => "República da Indonésia"
            ],
            [
                "code"   => "IR",
                "code3"  => "IRN",
                "name"   => "Iran",
                "formal" => "República Islâmica do Iran"
            ],
            [
                "code"   => "IQ",
                "code3"  => "IRQ",
                "name"   => "Iraque",
                "formal" => "República do Iraque"
            ],
            [
                "code"   => "IE",
                "code3"  => "IRL",
                "name"   => "Irlanda",
                "formal" => "Irlanda"
            ],
            [
                "code"   => "IL",
                "code3"  => "ISR",
                "name"   => "Israel",
                "formal" => "Estado de Israel"
            ],
            [
                "code"   => "IT",
                "code3"  => "ITA",
                "name"   => "Itália",
                "formal" => "República Italiana"
            ],
            [
                "code"   => "JM",
                "code3"  => "JAM",
                "name"   => "Jamaica",
                "formal" => "Jamaica"
            ],
            [
                "code"   => "JP",
                "code3"  => "JPN",
                "name"   => "Japão",
                "formal" => "Japão"
            ],
            [
                "code"   => "JO",
                "code3"  => "JOR",
                "name"   => "Jordânia",
                "formal" => "Reino Hachemita da Jordânia"
            ],
            [
                "code"   => "KZ",
                "code3"  => "KAZ",
                "name"   => "Cazaquistão",
                "formal" => "República do Cazaquistão"
            ],
            [
                "code"   => "KE",
                "code3"  => "KEN",
                "name"   => "Quênia",
                "formal" => "República do Quênia"
            ],
            [
                "code"   => "KI",
                "code3"  => "KIR",
                "name"   => "Kiribati",
                "formal" => "República do Kiribati"
            ],
            [
                "code"   => "KP",
                "code3"  => "PRK",
                "name"   => "Coreia do Norte",
                "formal" => "República Democrática Popular da Coreia"
            ],
            [
                "code"   => "KR",
                "code3"  => "KOR",
                "name"   => "Coreia do Sul",
                "formal" => "República da Coreia"
            ],
            [
                "code"   => "KW",
                "code3"  => "KWT",
                "name"   => "Kuwait",
                "formal" => "Estado do Kuwait"
            ],
            [
                "code"   => "KG",
                "code3"  => "KGZ",
                "name"   => "Quirguistão",
                "formal" => "República Quirguiz"
            ],
            [
                "code"   => "LA",
                "code3"  => "LAO",
                "name"   => "Laos",
                "formal" => "República Democrática Popular Lau"
            ],
            [
                "code"   => "LV",
                "code3"  => "LVA",
                "name"   => "Letônia",
                "formal" => "República da Letônia"
            ],
            [
                "code"   => "LB",
                "code3"  => "LBN",
                "name"   => "Líbano",
                "formal" => "República Libanesa"
            ],
            [
                "code"   => "LS",
                "code3"  => "LSO",
                "name"   => "Lesoto",
                "formal" => "Reino do Lesoto"
            ],
            [
                "code"   => "LR",
                "code3"  => "LBR",
                "name"   => "Libéria",
                "formal" => "República da Libéria"
            ],
            [
                "code"   => "LY",
                "code3"  => "LBY",
                "name"   => "Líbia",
                "formal" => "Líbia"
            ],
            [
                "code"   => "LI",
                "code3"  => "LIE",
                "name"   => "Liechtenstein",
                "formal" => "Principado de Liechtenstein"
            ],
            [
                "code"   => "LT",
                "code3"  => "LTU",
                "name"   => "Lituânia",
                "formal" => "República da Lituânia"
            ],
            [
                "code"   => "LU",
                "code3"  => "LUX",
                "name"   => "Luxemburgo",
                "formal" => "Grão-Ducado do Luxemburgo"
            ],
            [
                "code"   => "MO",
                "code3"  => "MAC",
                "name"   => "Macao",
                "formal" => "Macao"
            ],
            [
                "code"   => "MK",
                "code3"  => "MKD",
                "name"   => "Macedônia",
                "formal" => "República da Macedônia"
            ],
            [
                "code"   => "MG",
                "code3"  => "MDG",
                "name"   => "Madagascar",
                "formal" => "República de Madagascar"
            ],
            [
                "code"   => "MW",
                "code3"  => "MWI",
                "name"   => "Malawi",
                "formal" => "República de Malawi"
            ],
            [
                "code"   => "MY",
                "code3"  => "MYS",
                "name"   => "Malásia",
                "formal" => "Malásia"
            ],
            [
                "code"   => "MV",
                "code3"  => "MDV",
                "name"   => "Maldivas",
                "formal" => "Reública de Maldivas"
            ],
            [
                "code"   => "ML",
                "code3"  => "MLI",
                "name"   => "Mali",
                "formal" => "República do Mali"
            ],
            [
                "code"   => "MT",
                "code3"  => "MLT",
                "name"   => "Malta",
                "formal" => "República de Malta"
            ],
            [
                "code"   => "MH",
                "code3"  => "MHL",
                "name"   => "Ilhas Marshall",
                "formal" => "República das Ilhas Marshall"
            ],
            [
                "code"   => "MQ",
                "code3"  => "MTQ",
                "name"   => "Martinica",
                "formal" => "Martinica"
            ],
            [
                "code"   => "MR",
                "code3"  => "MRT",
                "name"   => "Mauritânia",
                "formal" => "República Islâmica da Mauritânia"
            ],
            [
                "code"   => "MU",
                "code3"  => "MUS",
                "name"   => "Maurício",
                "formal" => "República de Maurício"
            ],
            [
                "code"   => "YT",
                "code3"  => "MYT",
                "name"   => "Mayotte",
                "formal" => "Departamento de Mayotte"
            ],
            [
                "code"   => "MX",
                "code3"  => "MEX",
                "name"   => "México",
                "formal" => "Estados Unidos Mexicanos"
            ],
            [
                "code"   => "FM",
                "code3"  => "FSM",
                "name"   => "Micronésia",
                "formal" => "Estados Federados da Micronesia"
            ],
            [
                "code"   => "MD",
                "code3"  => "MDA",
                "name"   => "Moldova",
                "formal" => "República de Moldova"
            ],
            [
                "code"   => "MC",
                "code3"  => "MCO",
                "name"   => "Mônaco",
                "formal" => "Principado de Mônaco"
            ],
            [
                "code"   => "MN",
                "code3"  => "MNG",
                "name"   => "Mongólia",
                "formal" => "Mongólia"
            ],
            [
                "code"   => "MS",
                "code3"  => "MSR",
                "name"   => "Montserrat",
                "formal" => "Montserrat"
            ],
            [
                "code"   => "MA",
                "code3"  => "MAR",
                "name"   => "Marrocos",
                "formal" => "Reino de Marrocos"
            ],
            [
                "code"   => "MZ",
                "code3"  => "MOZ",
                "name"   => "Moçambique",
                "formal" => "República de Moçambique"
            ],
            [
                "code"   => "MM",
                "code3"  => "MMR",
                "name"   => "Birmânia",
                "formal" => "República da União de Myanmar"
            ],
            [
                "code"   => "NA",
                "code3"  => "NAM",
                "name"   => "Namíbia",
                "formal" => "República da Namíbia"
            ],
            [
                "code"   => "NR",
                "code3"  => "NRU",
                "name"   => "Nauru",
                "formal" => "República de Nauru"
            ],
            [
                "code"   => "NP",
                "code3"  => "NPL",
                "name"   => "Nepal",
                "formal" => "República Democrática Federativa do Nepal"
            ],
            [
                "code"   => "NL",
                "code3"  => "NLD",
                "name"   => "Holanda",
                "formal" => "Holanda"
            ],
            [
                "code"   => "AN",
                "code3"  => "ANT",
                "name"   => "Antilhas Holandesas",
                "formal" => "Antilhas Holandesas"
            ],
            [
                "code"   => "NC",
                "code3"  => "NCL",
                "name"   => "Nova Caledônia",
                "formal" => "Nova Caledônia"
            ],
            [
                "code"   => "NZ",
                "code3"  => "NZL",
                "name"   => "Nova Zelândia",
                "formal" => "Nova Zelândia"
            ],
            [
                "code"   => "NI",
                "code3"  => "NIC",
                "name"   => "Nicarágua",
                "formal" => "República da Nicarágua"
            ],
            [
                "code"   => "NE",
                "code3"  => "NER",
                "name"   => "Niger",
                "formal" => "República do Niger"
            ],
            [
                "code"   => "NG",
                "code3"  => "NGA",
                "name"   => "Nigéria",
                "formal" => "República Federativa da Nigéria"
            ],
            [
                "code"   => "NU",
                "code3"  => "NIU",
                "name"   => "Niue",
                "formal" => "Niue"
            ],
            [
                "code"   => "NF",
                "code3"  => "NFK",
                "name"   => "Ilha Norfolk",
                "formal" => "Território da Ilha Norfolk"
            ],
            [
                "code"   => "MP",
                "code3"  => "MNP",
                "name"   => "Ilhas Marianas do Norte",
                "formal" => "Comunidade das Ilhas Marianas do Norte"
            ],
            [
                "code"   => "NO",
                "code3"  => "NOR",
                "name"   => "Noruega",
                "formal" => "Reino da Noruega"
            ],
            [
                "code"   => "OM",
                "code3"  => "OMN",
                "name"   => "Omã",
                "formal" => "Sultanato de Omã"
            ],
            [
                "code"   => "PK",
                "code3"  => "PAK",
                "name"   => "Paquistão",
                "formal" => "República Islâmica do Paquistão"
            ],
            [
                "code"   => "PW",
                "code3"  => "PLW",
                "name"   => "Palau",
                "formal" => "República de Palau"
            ],
            [
                "code"   => "PS",
                "code3"  => "PSE",
                "name"   => "Palestina",
                "formal" => "Estado da Palestina"
            ],
            [
                "code"   => "PA",
                "code3"  => "PAN",
                "name"   => "Panamá",
                "formal" => "República do Panamá"
            ],
            [
                "code"   => "PG",
                "code3"  => "PNG",
                "name"   => "Papua-Nova Guiné",
                "formal" => "Estado Independente da Papua-Nova Guiné"
            ],
            [
                "code"   => "PY",
                "code3"  => "PRY",
                "name"   => "Paraguai",
                "formal" => "República do Paraguai"
            ],
            [
                "code"   => "PE",
                "code3"  => "PER",
                "name"   => "Peru",
                "formal" => "República do Peru"
            ],
            [
                "code"   => "PH",
                "code3"  => "PHL",
                "name"   => "Filipinas",
                "formal" => "República das Filipinas"
            ],
            [
                "code"   => "PN",
                "code3"  => "PCN",
                "name"   => "Ilhas Picárnia",
                "formal" => "Ilhas Picárnia"
            ],
            [
                "code"   => "PL",
                "code3"  => "POL",
                "name"   => "Polônia",
                "formal" => "República da Polônia"
            ],
            [
                "code"   => "PT",
                "code3"  => "PRT",
                "name"   => "Portugal",
                "formal" => "República Portuguesa"
            ],
            [
                "code"   => "PR",
                "code3"  => "PRI",
                "name"   => "Porto Rico",
                "formal" => "Comunidade do Porto Rico"
            ],
            [
                "code"   => "QA",
                "code3"  => "QAT",
                "name"   => "Catar",
                "formal" => "Estado do Catar"
            ],
            [
                "code"   => "RE",
                "code3"  => "REU",
                "name"   => "Reunião",
                "formal" => "Polônia"
            ],
            [
                "code"   => "RO",
                "code3"  => "ROM",
                "name"   => "Romênia",
                "formal" => "Romênia"
            ],
            [
                "code"   => "RU",
                "code3"  => "RUS",
                "name"   => "Rússia",
                "formal" => "Federação Russa"
            ],
            [
                "code"   => "RW",
                "code3"  => "RWA",
                "name"   => "Ruanda",
                "formal" => "República da Ruanda"
            ],
            [
                "code"   => "SH",
                "code3"  => "SHN",
                "name"   => "Santa Helena",
                "formal" => "Saint Helena"
            ],
            [
                "code"   => "KN",
                "code3"  => "KNA",
                "name"   => "São Cristóvão",
                "formal" => "São Cristóvão"
            ],
            [
                "code"   => "LC",
                "code3"  => "LCA",
                "name"   => "Santa Lúcia",
                "formal" => "Santa Lúcia"
            ],
            [
                "code"   => "PM",
                "code3"  => "SPM",
                "name"   => "São Pedro e Miquelon",
                "formal" => "Coletividade Territorial de São Pedro e Miquelon"
            ],
            [
                "code"   => "VC",
                "code3"  => "VCT",
                "name"   => "São Vicente e Granadinas",
                "formal" => "São Vicente e Granadinas"
            ],
            [
                "code"   => "WS",
                "code3"  => "WSM",
                "name"   => "Samoa",
                "formal" => "Estado Independente de Samoa"
            ],
            [
                "code"   => "SM",
                "code3"  => "SMR",
                "name"   => "São Marino",
                "formal" => "República de São Marino"
            ],
            [
                "code"   => "ST",
                "code3"  => "STP",
                "name"   => "Sao Tomé e Príncipe",
                "formal" => "República Democrática de Sao Tomé e Príncipe"
            ],
            [
                "code"   => "SA",
                "code3"  => "SAU",
                "name"   => "Arábia Saudita",
                "formal" => "Reino da Arábia Saudita"
            ],
            [
                "code"   => "SN",
                "code3"  => "SEN",
                "name"   => "Senegal",
                "formal" => "República do Senegal"
            ],
            [
                "code"   => "RS",
                "code3"  => "SRB",
                "name"   => "Sérvia e Montenegro",
                "formal" => "União Estatal de Sérvia e Montenegro"
            ],
            [
                "code"   => "SC",
                "code3"  => "SYC",
                "name"   => "Seicheles",
                "formal" => "República das Seicheles"
            ],
            [
                "code"   => "SL",
                "code3"  => "SLE",
                "name"   => "República da Serra Leoa",
                "formal" => "República da Serra Leoa"
            ],
            [
                "code"   => "SG",
                "code3"  => "SGP",
                "name"   => "Singapura",
                "formal" => "República da Singapura"
            ],
            [
                "code"   => "SK",
                "code3"  => "SVK",
                "name"   => "Eslováquia",
                "formal" => "República Eslovaca"
            ],
            [
                "code"   => "SI",
                "code3"  => "SVN",
                "name"   => "Eslovênia",
                "formal" => "República da Eslovênia"
            ],
            [
                "code"   => "SB",
                "code3"  => "SLB",
                "name"   => "Ilhas Salomão",
                "formal" => "Ilhas Salomão"
            ],
            [
                "code"   => "SO",
                "code3"  => "SOM",
                "name"   => "Somália",
                "formal" => "República da Somália"
            ],
            [
                "code"   => "ZA",
                "code3"  => "ZAF",
                "name"   => "África do Sul",
                "formal" => "República da África do Sul"
            ],
            [
                "code"   => "GS",
                "code3"  => "SGS",
                "name"   => "Ilhas Geórgia do Sul e Sandwich do Sul",
                "formal" => "Ilhas Geórgia do Sul e Sandwich do Sul"
            ],
            [
                "code"   => "ES",
                "code3"  => "ESP",
                "name"   => "Espanha",
                "formal" => "Reino da Espanha"
            ],
            [
                "code"   => "LK",
                "code3"  => "LKA",
                "name"   => "Sri Lanka",
                "formal" => "República Democrática Socialista do Sri Lanka"
            ],
            [
                "code"   => "SD",
                "code3"  => "SDN",
                "name"   => "Sudão",
                "formal" => "República do Sudão"
            ],
            [
                "code"   => "SR",
                "code3"  => "SUR",
                "name"   => "Suriname",
                "formal" => "República do Suriname"
            ],
            [
                "code"   => "SJ",
                "code3"  => "SJM",
                "name"   => "Esvalbarde",
                "formal" => "Esvalbarde"
            ],
            [
                "code"   => "SZ",
                "code3"  => "SWZ",
                "name"   => "Suazilândia",
                "formal" => "Reino da Suazilândia"
            ],
            [
                "code"   => "SE",
                "code3"  => "SWE",
                "name"   => "Suécia",
                "formal" => "Reino da Suécia"
            ],
            [
                "code"   => "CH",
                "code3"  => "CHE",
                "name"   => "Suiça",
                "formal" => "Confederação Suiça"
            ],
            [
                "code"   => "SY",
                "code3"  => "SYR",
                "name"   => "Síria",
                "formal" => "República Árabe Síria"
            ],
            [
                "code"   => "TW",
                "code3"  => "TWN",
                "name"   => "Taiwan",
                "formal" => "Taiwan"
            ],
            [
                "code"   => "TJ",
                "code3"  => "TJK",
                "name"   => "Tajiquistão",
                "formal" => "República do Tajiquistão"
            ],
            [
                "code"   => "TZ",
                "code3"  => "TZA",
                "name"   => "Tanzânia",
                "formal" => "República Unida da Tanzânia"
            ],
            [
                "code"   => "TH",
                "code3"  => "THA",
                "name"   => "Tailândia",
                "formal" => "Reino da Tailândia"
            ],
            [
                "code"   => "TL",
                "code3"  => "TLS",
                "name"   => "Timor-Leste",
                "formal" => "República Democrática de Timor-Leste"
            ],
            [
                "code"   => "TG",
                "code3"  => "TGO",
                "name"   => "Togo",
                "formal" => "República Togolesa"
            ],
            [
                "code"   => "TK",
                "code3"  => "TKL",
                "name"   => "Toquelau",
                "formal" => "Toquelau"
            ],
            [
                "code"   => "TO",
                "code3"  => "TON",
                "name"   => "Tonga",
                "formal" => "Reino de Tonga"
            ],
            [
                "code"   => "TT",
                "code3"  => "TTO",
                "name"   => "Trinidad e Tobago",
                "formal" => "República da Trinidad e Tobago"
            ],
            [
                "code"   => "TN",
                "code3"  => "TUN",
                "name"   => "Tunísia",
                "formal" => "República da Tunísia"
            ],
            [
                "code"   => "TR",
                "code3"  => "TUR",
                "name"   => "Turquia",
                "formal" => "República da Turquia"
            ],
            [
                "code"   => "TM",
                "code3"  => "TKM",
                "name"   => "Turcomenistão",
                "formal" => "Turcomenistão"
            ],
            [
                "code"   => "TC",
                "code3"  => "TCA",
                "name"   => "Ilhas Turks e Caicos",
                "formal" => "Ilhas Turks e Caicos"
            ],
            [
                "code"   => "TV",
                "code3"  => "TUV",
                "name"   => "Tuvalu",
                "formal" => "Tuvalu"
            ],
            [
                "code"   => "UG",
                "code3"  => "UGA",
                "name"   => "Uganda",
                "formal" => "República de Uganda"
            ],
            [
                "code"   => "UA",
                "code3"  => "UKR",
                "name"   => "Ucrânia",
                "formal" => "Ucrânia"
            ],
            [
                "code"   => "AE",
                "code3"  => "ARE",
                "name"   => "Emirados Árabes",
                "formal" => "Emirados Árabes Unidos"
            ],
            [
                "code"   => "GB",
                "code3"  => "GBR",
                "name"   => "Reino Unido",
                "formal" => "Reino Unido da Grã-Bretanha e Irlanda do Norte"
            ],
            [
                "code"   => "US",
                "code3"  => "USA",
                "name"   => "Estados Unidos",
                "formal" => "Estados Unidos da América"
            ],
            [
                "code"   => "UM",
                "code3"  => "UMI",
                "name"   => "Ilhas Menores Distantes dos Estados Unidos",
                "formal" => "Ilhas Menores Distantes dos Estados Unidos"
            ],
            [
                "code"   => "UY",
                "code3"  => "URY",
                "name"   => "Uruguai",
                "formal" => "República Oriental do Uruguai"
            ],
            [
                "code"   => "UZ",
                "code3"  => "UZB",
                "name"   => "Uzbequistão",
                "formal" => "República do Uzbequistão"
            ],
            [
                "code"   => "VU",
                "code3"  => "VUT",
                "name"   => "Vanuatu",
                "formal" => "República de Vanuatu"
            ],
            [
                "code"   => "VE",
                "code3"  => "VEN",
                "name"   => "Venezuela",
                "formal" => "República Bolivariana da Venezuela"
            ],
            [
                "code"   => "VN",
                "code3"  => "VNM",
                "name"   => "Vietnam",
                "formal" => "República Socialista do Vietnam"
            ],
            [
                "code"   => "VG",
                "code3"  => "VGB",
                "name"   => "Ilhas Virgens Inglesas",
                "formal" => "Ilhas Virgens"
            ],
            [
                "code"   => "VI",
                "code3"  => "VIR",
                "name"   => "Ilhas Virgens (USA)",
                "formal" => "Ilhas Virgens dos Estados Unidos"
            ],
            [
                "code"   => "WF",
                "code3"  => "WLF",
                "name"   => "Wallis e Futuna",
                "formal" => "Wallis e Futuna"
            ],
            [
                "code"   => "EH",
                "code3"  => "ESH",
                "name"   => "Saara Ocidental",
                "formal" => "Saara Ocidental"
            ],
            [
                "code"   => "YE",
                "code3"  => "YEM",
                "name"   => "Iêmen",
                "formal" => "República do Iêmen"
            ],
            [
                "code"   => "ZM",
                "code3"  => "ZMB",
                "name"   => "Zâmbia",
                "formal" => "República do Zâmbia"
            ],
            [
                "code"   => "ZW",
                "code3"  => "ZWE",
                "name"   => "Zimbábue",
                "formal" => "República do Zimbábue"
            ]
        ];

        DB::table("countries")->insert($data);
    }
}
