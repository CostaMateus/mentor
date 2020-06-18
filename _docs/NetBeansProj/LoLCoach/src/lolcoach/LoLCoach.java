package lolcoach;

import entidades.jogador.Jogador;
import entidades.tecnico.Tecnico;
import entidades.time.Time;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import static java.lang.Thread.sleep;
import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.util.ArrayList;
import java.util.Locale;
import java.util.Random;

/**
 *
 * @author Mateus Costa
 */
public class LoLCoach {
    //Tops
    private static String topAssassino[]
            = {"Fiora", "Irelia", "Jax", "Pantheon", "Riven", "Teemo",
                "Tryndamere"};
    private static String topLutador[]
            = {"Aatrox", "Camille", "Darius", "Dr_Mundo", "Fiora", "Gangplank",
                "Garen", "Gnar", "Illaoi", "Irelia", "Jax", "Jayce", "Kayle",
                "Kled", "Malphite", "Mordekaiser", "Nasus", "Nautilus", "Olaf",
                "Pantheon", "Poppy", "Quinn", "Renekton", "Riven", "Rumble",
                "Singed", "Sion", "Swain", "Trundle", "Tryndamere", "Urgot",
                "Wukong", "Yorick"};
    private static String topMago[]
            = {"Cho'Gath", "Galio", "Heimerdinger", "Kennen", "Maokai",
                "Rumble", "Swain"};
    private static String topTank[]
            = {"Aatrox", "Camille", "Cho'Gath", "Darius", "Dr_Mundo", "Galio",
                "Garen", "Gnar", "Illaoi", "Kled", "Malphite", "Maokai",
                "Nasus", "Nautilus", "Olaf", "Poppy", "Renekton", "Shen",
                "Singed", "Sion", "Trundle", "Wukong", "Yorick"};
    private static String topAtirador[]
            = {"Jayce", "Kennen", "Quinn", "Teemo", "Urgot"};

    //Jungles
    private static String jungAssassino[]
            = {"Evelynn", "Kha'Zix", "Lee_Sin", "Master_Yi", "Nidalee",
                "Nocturne", "Rengar", "Shaco", "Vi", "Xin_Zhao"};
    private static String jungLutador[]
            = {"Elise", "Gragas", "Hecarim", "Jarvan_IV", "Kha'Zix", "Lee_Sin",
                "Master_Yi", "Nidalee", "Nocturne", "Nunu", "Rammus", "Rek'Sai",
                "Rengar", "Sejuani", "Shyvana", "Skarner", "Udyr", "Vi",
                "Volibear", "Warwick", "Xin_Zhao", "Zac"};
    private static String jungMago[]
            = {"Amumu", "Elise", "Evelynn", "Fiddlesticks", "Gragas", "Ivern"};
    private static String jungTank[]
            = {"Amumu", "Hecarim", "Jarvan_IV", "Rammus", "Sejuani", "Shyvana",
                "Skarner", "Udyr", "Volibear", "Warwick", "Zac"};
    private static String jungAtirador[]
            = {"Graves", "Kindred"};

    //Mids
    private static String midAssassino[]
            = {"Ahri", "Akali", "Ekko", "Fizz", "Kassadin", "Katarina",
                "LeBlanc", "Talon", "Xerath", "Yasuo", "Zed"};
    private static String midLutador[]
            = {"Aurelion_Sol", "Diana", "Ekko", "Fizz", "Ryze", "Talon",
                "Yasuo", "Zed"};
    private static String midMago[]
            = {"Ahri", "Anivia", "Annie", "Aurelion_Sol", "Azir", "Cassiopeia",
                "Corki", "Diana", "Karthus", "Karma", "Kassadin", "Katarina",
                "LeBlanc", "Lissandra", "Lux", "Morgana", "Orianna", "Ryze",
                "Syndra", "Taliyah", "Twisted_Fate", "Veigar", "Vel'Koz",
                "Viktor", "Vladimir", "Xerath", "Ziggs"};

    //Atiradores 
    private static String adcNormal[]
            = {"Caitlyn", "Draven", "Ezreal", "Kog'Maw", "Lucian",
                "Miss_Fortune", "Xayah"};
    private static String adcUtilidade[]
            = {"Ashe", "Kalista", "Sivir", "Varus"};
    private static String adcHyper[]
            = {"Jhin", "Jinx", "Tristana", "Twitch", "Vayne"};

    //Suportes
    private static String suppTank[]
            = {"Alistar", "Blitzcrank", "Braum", "Leona", "Nautilus", "Poppy",
                "Rakan", "Shen", "Tahm_Kench", "Taric", "Thresh"};
    private static String suppUtilidade[]
            = {"Bardo", "Brand", "Janna", "Karma", "Lulu", "Malzahar",
                "Morgana", "Nami", "Sona", "Soraka", "Zilean", "Zyra"};

    private static ArrayList<String> banidosA = new ArrayList<>();
    private static ArrayList<String> banidosV = new ArrayList<>();

    private static ArrayList<Time> times = new ArrayList<>();

    private static Meta metas;

    //time azul
    private static String topA = "";
    private static String junA = "";
    private static String midA = "";
    private static String adcA = "";
    private static String suppA = "";
    //time vermelho
    private static String topV = "";
    private static String junV = "";
    private static String midV = "";
    private static String adcV = "";
    private static String suppV = "";

    private static String nomesArq[] = new String[136];
    private static String chancesArq[][] = new String[136][136];

    public static void main(String[] args) throws InterruptedException, IOException {
        getTimesArq();

        getNomesChampsArq();
        getChancesArq();

        metas = new Meta();

        String ld1 = "azul";
        String ld2 = "vermelho";

        getBansFase1("azul", "vermelho");
        getPicksFase1("azul", "vermelho");

        getBansFase2("azul", "vermelho");
        getPicksFase2("azul", "vermelho");

        //printa
//        System.out.println("Metas propostos\n"
//                + "T:" + metas.getTop() + "  "
//                + "J:" + metas.getJun() + "  "
//                + "M:" + metas.getMid() + "  "
//                + "A:" + metas.getAdc() + "  "
//                + "S:" + metas.getSup() + "\n"
//                + "\nCHANCE DE VITÓRIA POR ROTA:"
//                + calculaChanceRota(topA, topV) + "\n"
//                + calculaChanceRota(junA, junV) + "\n"
//                + calculaChanceRota(midA, midV) + "\n"
//                + calculaChanceRota(adcA, adcV) + "\n"
//                + calculaChanceRota(suppA, suppV) + "\n"
//                + "\nCHANCE DE VITÓRIA DO TIME:" + "\n"
//                + calculaChancePartida(topA, junA, midA, adcA, suppA,
//                        topV, junV, midV, adcV, suppV)
//                + "\n=================================================================\n"
//        );


        imprimePicksBans();
    }

    public static void imprimePicksBans() throws InterruptedException {
        int temp = 500;//1000
        Time intz = times.get(1);
        String intzP[] = formataPlayers("a", intz);
        Time keyd = times.get(2);
        String keydP[] = formataPlayers("v", keyd);
        
        String bA[];
        String bV[];

        String t = "TIME AZUL                                                                   TIME VERMELHO" + "\n";
        t +=       "PLAYER      BANS           PICKS                         PICKS           BANS      PLAYER" + "\n";
        System.out.println(t);

        bA = formataBans("a");
        bV = formataBans("v");
        formataPicks();

        // fase 1 ==============================================================
        sleep(temp);
        t = intzP[0] + bA[0] + topA + "  -  " + topV + bV[0] + keydP[0];
        System.out.println(t);

        sleep(temp);
        t = intzP[1] + bA[1] + junA + "  -  " + junV + bV[1] + keydP[1];
        System.out.println(t);

        sleep(temp);
        t = intzP[2] + bA[2] + midA + "  -  " + midV + bV[2] + keydP[2];
        System.out.println(t);
        System.out.println();

        // fase 2 ==============================================================
        sleep(temp);
        t = intzP[3] + bA[3] + adcA + "  -  " + adcV + bV[3] + keydP[3];
        System.out.println(t);

        sleep(temp);
        t = intzP[4] + bA[4] + suppA + "  -  " + suppV + bV[4] + keydP[4];
        System.out.println(t);
    }

    public static String[] formataPlayers(String lado, Time t) {
        if (lado.equalsIgnoreCase("a")) {
            String pA[] = new String[5];
            for (int i = 0; i < 5; i++) {
                pA[i] = t.getElenco().get(i).getNick();
            }
            for (int i = 0; i < pA.length; i++) {
                pA[i] = preencheEsp(pA[i], pA[i].length(), 12, "a");
            }
            return pA;
            
        } else {
            String pV[] = new String[5];
            for (int i = 0; i < 5; i++) {
                pV[i] = t.getElenco().get(i).getNick();
            }
            for (int i = 0; i < pV.length; i++) {
                pV[i] = preencheEsp(pV[i], pV[i].length(), 12, "v");
            }
            return pV;
        }
    }    
    
    public static String[] formataBans(String lado) {
        if (lado.equalsIgnoreCase("a")) {
            String bA[] = new String[5];
            for (int i = 0; i < banidosA.size(); i++) {
                bA[i] = banidosA.get(i);
            }

            for (int i = 0; i < bA.length; i++) {
                int esp = 15;
                int vlr = bA[i].length();
                bA[i] = preencheEsp(bA[i], vlr, esp, "a");
            }
            return bA;
        } else {
            String bV[] = new String[5];
            for (int i = 0; i < banidosV.size(); i++) {
                bV[i] = banidosV.get(i);
            }
            for (int i = 0; i < bV.length; i++) {
                int esp = 15;
                int vlr = bV[i].length();
                bV[i] = preencheEsp(bV[i], vlr, esp, "v");
            }
            return bV;
        }
    }

    public static void formataPicks() {
        topA = preencheEsp(topA, topA.length(), 15, "a");
        junA = preencheEsp(junA, junA.length(), 15, "a");
        midA = preencheEsp(midA, midA.length(), 15, "a");
        adcA = preencheEsp(adcA, adcA.length(), 15, "a");
        suppA = preencheEsp(suppA, suppA.length(), 15, "a");

        topV = preencheEsp(topV, topV.length(), 15, "v");
        junV = preencheEsp(junV, junV.length(), 15, "v");
        midV = preencheEsp(midV, midV.length(), 15, "v");
        adcV = preencheEsp(adcV, adcV.length(), 15, "v");
        suppV = preencheEsp(suppV, suppV.length(), 15, "v");
    }

    private static String preencheEsp(String camp, int vlr, int esp, String lado) {
        int resto;
        if (lado.equalsIgnoreCase("a")) {
            if (vlr < esp) {
                resto = esp - vlr;
                for (int j = resto; j > 0; j--) {
                    camp += " ";
                }
            }
        } else if (lado.equalsIgnoreCase("v")) {
            if (vlr < esp) {
                resto = esp - vlr;
                for (int j = resto; j > 0; j--) {
                    camp = " " + camp;
                }
            }
        }
        return camp;
    }

    public static void getBansFase1(String ld1, String ld2) {
        bans1(ld1);
            bans1(ld2);
        bans1(ld1);
            bans1(ld2);
        bans1(ld1);
            bans1(ld2);
    }

    private static void bans1(String lado) {
        Random r = new Random();
        String ban;
        if (lado.equals("azul")) {
            do {
                ban = nomesArq[r.nextInt(nomesArq.length)];
            } while (isBan(ban));
            banidosA.add(ban);
        } else {
            do {
                ban = nomesArq[r.nextInt(nomesArq.length)];
            } while (isBan(ban));
            banidosV.add(ban);
        }
    }

    public static void getBansFase2(String ld1, String ld2) {
            bans2(ld2);
        bans2(ld1);
            bans2(ld2);
        bans2(ld1);
    }

    private static void bans2(String lado) {
        Random r = new Random();
        String ban;
        if (lado.equals("azul")) {
            do {
                ban = nomesArq[r.nextInt(nomesArq.length)];
            } while (isBan(ban));
            banidosA.add(ban);
        } else {
            do {
                ban = nomesArq[r.nextInt(nomesArq.length)];
            } while (isBan(ban));
            banidosV.add(ban);
        }
    }

    private static boolean isBan(String campeao) {
        boolean t = false;
        for (String c : banidosA) {
            if (campeao.equals(c)) {
                t = true;
            }
        }
        for (String c : banidosV) {
            if (campeao.equals(c)) {
                t = true;
            }
        }
        return t;
    }

    public static void getPicksFase1(String ld1, String ld2) {
        picksTop(ld1);
            picksTop(ld2);
            picksJungle(ld2);
        picksJungle(ld1);
        picksMid(ld1);
            picksMid(ld2);
    }

    public static void getPicksFase2(String ld1, String ld2) {
            picksAdc(ld2);
        picksAdc(ld1);
        picksSupp(ld1);
            picksSupp(ld2);
    }

    // inicio --- metodos dos picks com validacao ----------------- 
    private static void picksTop(String lado) {
        switch (lado) {
            case "azul":
                do {
                    topA = escolheTop();
                } while (topA.equals(topV) || isBan(topA)
                        || topA.equals(junA) || topA.equals(junV)
                        || topA.equals(midA) || topA.equals(midV));
                break;
            case "vermelho":
                do {
                    topV = escolheTop();
                } while (topV.equals(topA) || isBan(topV)
                        || topV.equals(junA) || topV.equals(junV)
                        || topV.equals(midA) || topV.equals(midV));
                break;
            default:
                topA = "Lado inválido!";
                topV = topA;
                break;
        }
    }

    private static void picksJungle(String lado) {
        switch (lado) {
            case "azul":
                do {
                    junA = escolheJungle();
                } while (junA.equals(junV) || isBan(junA)
                        || junA.equals(topA) || junA.equals(topV)
                        || junA.equals(midA) || junA.equals(midV));
                break;
            case "vermelho":
                do {
                    junV = escolheJungle();
                } while (junV.equals(junA) || isBan(junV)
                        || junV.equals(topA) || junV.equals(topV)
                        || junV.equals(midA) || junV.equals(midV));
                break;
            default:
                junA = "Lado inválido!";
                junV = junA;
                break;
        }
    }

    private static void picksMid(String lado) {
        switch (lado) {
            case "azul":
                do {
                    midA = escolheMid();
                } while (midA.equals(midV) || isBan(midA)
                        || midA.equals(topA) || midA.equals(topV)
                        || midA.equals(junA) || midA.equals(junV));
                break;
            case "vermelho":
                do {
                    midV = escolheMid();
                } while (midV.equals(midA) || isBan(midV)
                        || midV.equals(topA) || midV.equals(topV)
                        || midV.equals(junA) || midV.equals(junV));
                break;
            default:
                midA = "Lado inválido!";
                midV = midA;
                break;
        }
    }

    private static void picksAdc(String lado) {
        switch (lado) {
            case "azul":
                do {
                    adcA = escolheAdc();
                } while (adcA.equals(adcV) || isBan(adcA));
                break;
            case "vermelho":
                do {
                    adcV = escolheAdc();
                } while (adcV.equals(adcA) || isBan(adcA));
                break;
            default:
                adcA = "Lado inválido!";
                adcV = adcA;
                break;
        }
    }

    private static void picksSupp(String lado) {
        switch (lado) {
            case "azul":
                do {
                    suppA = escolheSupp();
                } while (suppA.equals(suppV) || isBan(suppA)
                        || suppA.equals(topA) || suppA.equals(topV)
                        || suppA.equals(junA) || suppA.equals(junV)
                        || suppA.equals(midA) || suppA.equals(midV));
                break;
            case "vermelho":
                do {
                    suppV = escolheSupp();
                } while (suppV.equals(suppA) || isBan(suppV)
                        || suppV.equals(topA) || suppV.equals(topV)
                        || suppV.equals(junA) || suppV.equals(junV)
                        || suppV.equals(midA) || suppV.equals(midV));
                break;
            default:
                suppA = "Lado inválido!";
                suppV = suppA;
                break;
        }
    }
    // fim ------ metodos dos picks com validacao -----------------

    // inicio --- metodos de escolha pras posicoes ---------------- 
    private static String escolheTop() {
        String top;
        double a = Math.random();
        Random r = new Random();
        int i;
        switch (metas.getTop()) {
            case "ASSASSINO":
                if (a <= 0.50) {
                    i = r.nextInt(topAssassino.length);
                    top = topAssassino[i];
                    //topAssassino;
                } else if (a <= 0.70) {
                    i = r.nextInt(topMago.length);
                    top = topMago[i];
                    //topMago;
                } else if (a <= 0.85) {
                    i = r.nextInt(topLutador.length);
                    top = topLutador[i];
                    //topLutador;
                } else if (a <= 0.95) {
                    i = r.nextInt(topTank.length);
                    top = topTank[i];
                    //topTank;
                } else {
                    i = r.nextInt(topAtirador.length);
                    top = topAtirador[i];
                    //topAtirador;
                }
                break;
            case "LUTADOR":
                if (a <= 0.50) {
                    i = r.nextInt(topLutador.length);
                    top = topLutador[i];
                    //topLutador;
                } else if (a <= 0.70) {
                    i = r.nextInt(topTank.length);
                    top = topTank[i];
                    //topTank;
                } else if (a <= 0.85) {
                    i = r.nextInt(topMago.length);
                    top = topMago[i];
                    //topMago;
                } else if (a <= 0.95) {
                    i = r.nextInt(topAssassino.length);
                    top = topAssassino[i];
                    //topAssassino;
                } else {
                    i = r.nextInt(topAtirador.length);
                    top = topAtirador[i];
                    //topAtirador;
                }
                break;
            case "MAGO":
                if (a <= 0.50) {
                    i = r.nextInt(topMago.length);
                    top = topMago[i];
                    //topMago;
                } else if (a <= 0.70) {
                    i = r.nextInt(topAssassino.length);
                    top = topAssassino[i];
                    //topAssassino;
                } else if (a <= 0.85) {
                    i = r.nextInt(topTank.length);
                    top = topTank[i];
                    //topTank;
                } else if (a <= 0.95) {
                    i = r.nextInt(topLutador.length);
                    top = topLutador[i];
                    //topLutador;
                } else {
                    i = r.nextInt(topAtirador.length);
                    top = topAtirador[i];
                    //topAtirador;
                }
                break;
            case "TANK":
                if (a <= 0.50) {
                    i = r.nextInt(topTank.length);
                    top = topTank[i];
                    //topTank;
                } else if (a <= 0.70) {
                    i = r.nextInt(topLutador.length);
                    top = topLutador[i];
                    //topLutador;
                } else if (a <= 0.85) {
                    i = r.nextInt(topAssassino.length);
                    top = topAssassino[i];
                    //topAssassino;
                } else if (a <= 0.95) {
                    i = r.nextInt(topMago.length);
                    top = topMago[i];
                    //topMago;
                } else {
                    i = r.nextInt(topAtirador.length);
                    top = topAtirador[i];
                    //topAtirador;
                }
                break;
            default:
                top = "Meta inválido!";
                break;
        }
        return top;
    }

    private static String escolheJungle() {
        String jungle;
        double a = Math.random();
        Random r = new Random();
        int i;
        switch (metas.getJun()) {
            case "ASSASSINOS":
                if (a <= 0.50) {
                    i = r.nextInt(jungAssassino.length);
                    jungle = jungAssassino[i];
                    //jungleAssassino;
                } else if (a <= 0.70) {
                    i = r.nextInt(jungMago.length);
                    jungle = jungMago[i];
                    //jungleMago;
                } else if (a <= 0.85) {
                    i = r.nextInt(jungLutador.length);
                    jungle = jungLutador[i];
                    //jungleLutador;
                } else if (a <= 0.95) {
                    i = r.nextInt(jungTank.length);
                    jungle = jungTank[i];
                    //jungleTank;
                } else {
                    i = r.nextInt(jungAtirador.length);
                    jungle = jungAtirador[i];
                    //jungleAtirador;
                }
                break;
            case "LUTADOR":
                if (a <= 0.50) {
                    i = r.nextInt(jungLutador.length);
                    jungle = jungLutador[i];
                    //jungleLutador;
                } else if (a <= 0.70) {
                    i = r.nextInt(jungTank.length);
                    jungle = jungTank[i];
                    //jungleTank;
                } else if (a <= 0.85) {
                    i = r.nextInt(jungMago.length);
                    jungle = jungMago[i];
                    //jungleMago;
                } else if (a <= 0.95) {
                    i = r.nextInt(jungAssassino.length);
                    jungle = jungAssassino[i];
                    //jungleAssassino;
                } else {
                    i = r.nextInt(jungAtirador.length);
                    jungle = jungAtirador[i];
                    //jungleAtirador;
                }
                break;
            case "MAGO":
                if (a <= 0.50) {
                    i = r.nextInt(jungMago.length);
                    jungle = jungMago[i];
                    //jungleMago;
                } else if (a <= 0.70) {
                    i = r.nextInt(jungAssassino.length);
                    jungle = jungAssassino[i];
                    //jungleAssassino;
                } else if (a <= 0.85) {
                    i = r.nextInt(jungTank.length);
                    jungle = jungTank[i];
                    //jungleTank;
                } else if (a <= 0.95) {
                    i = r.nextInt(jungLutador.length);
                    jungle = jungLutador[i];
                    //jungleLutador;
                } else {
                    i = r.nextInt(jungAtirador.length);
                    jungle = jungAtirador[i];
                    //jungleAtirador;
                }
                break;
            case "TANK":
                if (a <= 0.50) {
                    i = r.nextInt(jungTank.length);
                    jungle = jungTank[i];
                    //jungleTank;
                } else if (a <= 0.70) {
                    i = r.nextInt(jungLutador.length);
                    jungle = jungLutador[i];
                    //jungleLutador;
                } else if (a <= 0.85) {
                    i = r.nextInt(jungAssassino.length);
                    jungle = jungAssassino[i];
                    //jungleAssassino;
                } else if (a <= 0.95) {
                    i = r.nextInt(jungMago.length);
                    jungle = jungMago[i];
                    //jungleMago;
                } else {
                    i = r.nextInt(jungAtirador.length);
                    jungle = jungAtirador[i];
                    //jungleAtirador;
                }
                break;
            case "ATIRADOR":
                if (a <= 0.50) {
                    i = r.nextInt(jungAtirador.length);
                    jungle = jungAtirador[i];
                    //jungleAtirador;
                } else if (a <= 0.70) {
                    i = r.nextInt(jungAssassino.length);
                    jungle = jungAssassino[i];
                    //jungleAssassino;
                } else if (a <= 0.85) {
                    i = r.nextInt(jungMago.length);
                    jungle = jungMago[i];
                    //jungleMago;
                } else if (a <= 0.95) {
                    i = r.nextInt(jungLutador.length);
                    jungle = jungLutador[i];
                    //jungleLutador;
                } else {
                    i = r.nextInt(jungTank.length);
                    jungle = jungTank[i];
                    //jungleTank;
                }
                break;
            default:
                jungle = "Meta inválido!";
                break;
        }
        return jungle;
    }

    private static String escolheMid() {
        String meio;
        double a = Math.random();
        Random r = new Random();
        int i;
        switch (metas.getMid()) {
            case "ASSASSINO":
                if (a <= 0.65) {
                    i = r.nextInt(midAssassino.length);
                    meio = midAssassino[i];
                    //midAssassino;
                } else if (a <= 0.85) {
                    i = r.nextInt(midMago.length);
                    meio = midMago[i];
                    //midMago;
                } else {
                    i = r.nextInt(midLutador.length);
                    meio = midLutador[i];
                    //midLutador;
                }
                break;
            case "LUTADOR":
                if (a <= 0.65) {
                    i = r.nextInt(midLutador.length);
                    meio = midLutador[i];
                    //midLutador;
                } else if (a <= 0.85) {
                    i = r.nextInt(midMago.length);
                    meio = midMago[i];
                    //midMago;
                } else {
                    i = r.nextInt(midAssassino.length);
                    meio = midAssassino[i];
                    //midAssassino;
                }
                break;
            case "MAGO":
                if (a <= 0.65) {
                    i = r.nextInt(midMago.length);
                    meio = midMago[i];
                    //midMago;
                } else if (a <= 0.85) {
                    i = r.nextInt(midAssassino.length);
                    meio = midAssassino[i];
                    //midAssassino;
                } else {
                    i = r.nextInt(midLutador.length);
                    meio = midLutador[i];
                    //midLutador;
                }
                break;
            default:
                meio = "Meta inválido!";
                break;
        }
        return meio;
    }

    private static String escolheAdc() {
        String adc;
        double a = Math.random();
        Random r = new Random();
        int i;
        switch (metas.getAdc()) {
            case "NORMAL":
                if (a <= 0.65) {
                    i = r.nextInt(adcNormal.length);
                    adc = adcNormal[i];
                    //adcNormal;
                } else if (a <= 0.85) {
                    i = r.nextInt(adcHyper.length);
                    adc = adcHyper[i];
                    //adcHyper;
                } else {
                    i = r.nextInt(adcUtilidade.length);
                    adc = adcUtilidade[i];
                    //adcUtilidade;
                }
                break;
            case "UTIL":
                if (a <= 0.65) {
                    i = r.nextInt(adcUtilidade.length);
                    adc = adcUtilidade[i];
                    //adcUtilidade;
                } else if (a <= 0.85) {
                    i = r.nextInt(adcHyper.length);
                    adc = adcHyper[i];
                    //adcHyper;
                } else {
                    i = r.nextInt(adcNormal.length);
                    adc = adcNormal[i];
                    //adcNormal;
                }
                break;
            case "HYPER":
                if (a <= 0.65) {
                    i = r.nextInt(adcHyper.length);
                    adc = adcHyper[i];
                    //adcHyper;
                } else if (a <= 0.85) {
                    i = r.nextInt(adcUtilidade.length);
                    adc = adcUtilidade[i];
                    //adcUtilidade;
                } else {
                    i = r.nextInt(adcNormal.length);
                    adc = adcNormal[i];
                    //adcNormal;
                }
                break;
            default:
                adc = "Meta inválido!";
                break;
        }
        return adc;
    }

    private static String escolheSupp() {
        String sup;
        double a = Math.random();
        Random r = new Random();
        int i;
        switch (metas.getSup()) {
            case "TANK":
                if (a <= 0.70) {
                    i = r.nextInt(suppTank.length);
                    sup = suppTank[i];
                    //suppTank;
                } else {
                    i = r.nextInt(suppUtilidade.length);
                    sup = suppUtilidade[i];
                    //suppUtilidade;
                }
                break;
            case "UTIL":
                if (a <= 0.70) {
                    i = r.nextInt(suppUtilidade.length);
                    sup = suppUtilidade[i];
                    //suppUtilidade;
                } else {
                    i = r.nextInt(suppTank.length);
                    sup = suppTank[i];
                    //suppTank;
                }
                break;
            default:
                sup = "Meta inválido!";
                break;
        }
        return sup;
    }
    // fim ------ metodos de escolha pras posicoes ---------------- 

    /**
     * Recupera os nomes dos campeos do arquivo.
     */
    private static void getNomesChampsArq() {
        try (FileReader fr = new FileReader("campeoes_0_nomes.txt");
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ = linha;
                nomesArq[i++] = champ;
            }
        } catch (IOException ex) {

        }
    }

    /**
     * Recupera as chances de vitória do arquvio.
     */
    private static void getChancesArq() {
        try (FileReader fr = new FileReader("campeoes_2_chance_vitoria.txt");
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ[] = linha.split(" ");
                for (int j = 0; j < chancesArq.length; j++) {
                    chancesArq[i][j] = champ[j];
                }
                i++;
            }
        } catch (IOException ex) {

        }
    }

    /**
     * Busca o indice do campeao no vetor de nomes.
     *
     * @param nome Nome do campeao a ser buscado
     * @return Indice/Id do campeao
     */
    private static int getIndiceChamp(String nome) {
        if (!nome.equals("")) {
            for (int i = 0; i < nomesArq.length; i++) {
                if (nomesArq[i].equals(nome)) {
                    return i;
                }
            }
        }
        return -1;
    }

    private static String calculaChanceRota(String azul, String vermelho) {
        int c1 = getIndiceChamp(azul);
        int c2 = getIndiceChamp(vermelho);

        if (c1 == -1 || c2 == -1) {

            return "Campeâo inválido! c1=\"" + azul + "\" / c2=\"" + vermelho + "\"";
        }

        azul = azul.replace("_", " ");
        vermelho = vermelho.replace("_", " ");

        String s;
        if (Double.parseDouble(chancesArq[c1][c2])
                > Double.parseDouble(chancesArq[c2][c1])) {
            s = azul + " : + " + chancesArq[c1][c2] + "/" + chancesArq[c2][c1] + " - : " + vermelho;
        } else if (Double.parseDouble(chancesArq[c1][c2])
                == Double.parseDouble(chancesArq[c2][c1])) {
            s = azul + " : = " + chancesArq[c1][c2] + "/" + chancesArq[c2][c1] + " = : " + vermelho;
        } else {
            s = azul + " : - " + chancesArq[c1][c2] + "/" + chancesArq[c2][c1] + " + : " + vermelho;
        }
        return s;
    }

    private static String calculaChancePartida(
            String azulT, String azulJ, String azulM,
            String azulA, String azulS,
            String vermelhoT, String vermelhoJ, String vermelhoM,
            String vermelhoA, String vermelhoS) {
        DecimalFormat meuFormt = new DecimalFormat("0.000", new DecimalFormatSymbols(new Locale("en", "US")));

        int t1 = getIndiceChamp(azulT);
        int t2 = getIndiceChamp(vermelhoT);
        int j1 = getIndiceChamp(azulJ);
        int j2 = getIndiceChamp(vermelhoJ);
        int m1 = getIndiceChamp(azulM);
        int m2 = getIndiceChamp(vermelhoM);
        int a1 = getIndiceChamp(azulA);
        int a2 = getIndiceChamp(vermelhoA);
        int s1 = getIndiceChamp(azulS);
        int s2 = getIndiceChamp(vermelhoS);

        double azul = 0;
        azul += Double.parseDouble(chancesArq[t1][t2]);
        azul += Double.parseDouble(chancesArq[j1][j2]);
        azul += Double.parseDouble(chancesArq[m1][m2]);
        azul += Double.parseDouble(chancesArq[a1][a2]);
        azul += Double.parseDouble(chancesArq[s1][s2]);
        azul /= 5;

        double vermelho = 0;
        vermelho += Double.parseDouble(chancesArq[t2][t1]);
        vermelho += Double.parseDouble(chancesArq[j2][j1]);
        vermelho += Double.parseDouble(chancesArq[m2][m1]);
        vermelho += Double.parseDouble(chancesArq[a2][a1]);
        vermelho += Double.parseDouble(chancesArq[s2][s1]);
        vermelho /= 5;

        String s;
        if (azul > vermelho) {
            s = "Time Azul : + " + meuFormt.format(azul) + "/" + meuFormt.format(vermelho) + " - : Time Vermelho";
        } else if (azul == vermelho) {
            s = "Time Azul : = " + meuFormt.format(azul) + "/" + meuFormt.format(vermelho) + " = : Time Vermelho";
        } else {
            s = "Time Azul : - " + meuFormt.format(azul) + "/" + meuFormt.format(vermelho) + " + : Time Vermelho";
        }
        return s;
    }

    private static void getTimesArq() {
        ArrayList<ArrayList<Jogador>> todosJogadores = new ArrayList<>();
        ArrayList<Tecnico> tecnicos = new ArrayList<>();

        // Leitura dos jogadores 
        String[] ts = {"cnb", "intz", "keyd", "one", "pain", "pro", "red", "show"};
        ArrayList<Jogador> jogadores;
        for (String s : ts) {
            jogadores = new ArrayList<>();
            try (final FileReader fr = new FileReader("jogadores_objetos_" + s + ".txt")) {
                BufferedReader br = new BufferedReader(fr);
                String linha;
                while ((linha = br.readLine()) != null) {
                    String jogador[] = linha.split(" ");
                    String nom = jogador[0];
                    String sbn = jogador[1];
                    String nik = jogador[2];
                    int idd = Integer.parseInt(jogador[3]);
                    int hab = Integer.parseInt(jogador[4]);
                    double sal = Double.parseDouble(jogador[5]);
                    double pas = Double.parseDouble(jogador[6]);
                    Jogador.PosicaoEnum pos = Jogador.PosicaoEnum.valueOf(jogador[7].toUpperCase());

                    Jogador j = new Jogador(nom, sbn, nik, idd, hab, sal, pas, pos);
                    jogadores.add(j);
                }
                br.close();
            } catch (IOException ex) {
                ex.printStackTrace();
            }
            todosJogadores.add(jogadores);
        }

        // Leitura dos tecnicos 
        try (FileReader fr = new FileReader("jogadores_objetos_times_e_tecnicos.txt")) {
            BufferedReader br = new BufferedReader(fr);
            String linha;
            while ((linha = br.readLine()) != null) {
                String tecnico[] = linha.split(" ");
                String time = tecnico[0].replace("_", " ");
                String nom = tecnico[1];
                String sbn = tecnico[2];
                String nik = tecnico[3];
                int idd = Integer.parseInt(tecnico[4]);

                Tecnico t = new Tecnico(nom, sbn, nik, idd);
                tecnicos.add(t);

                times.add(new Time(time));
            }
            br.close();
        } catch (IOException ex) {
            ex.printStackTrace();
        }

        // Formação dos times
        for (int i = 0; i < times.size(); i++) {
            times.get(i).setTecnico(tecnicos.get(i));
            times.get(i).setElenco(todosJogadores.get(i));
//            System.out.println(times.get(i).toString());
        }
    }
}
