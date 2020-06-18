package lolcoach;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.Random;

/**
 *
 * @author Mateus Costa
 */
public class zz {

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

    private static String midAssassino[]
            = {"Ahri, Akali", "Ekko", "Fizz", "Kassadin", "Katarina", "LeBlanc",
                "Talon", "Xerath", "Yasuo", "Zed"};
    private static String midLutador[]
            = {"Aurelion_Sol", "Diana", "Ekko", "Fizz", "Ryze", "Talon",
                "Yasuo", "Zed"};
    private static String midMago[]
            = {"Ahri", "Anivia", "Annie", "Aurelion_Sol", "Azir", "Cassiopeia",
                "Corki", "Diana", "Karthus", "Kassadin", "Katarina", "LeBlanc",
                "Lissandra", "Lux", "Orianna", "Ryze", "Syndra", "Taliyah",
                "Twisted_Fate", "Veigar", "Vel'Koz", "Viktor", "Vladimir",
                "Xerath", "Ziggs"};

    private static String adcNormal[]
            = {"Caitlyn", "Draven", "Ezreal", "Kog'Maw", "Lucian",
                "Miss_Fortune", "Xayah"};
    private static String adcUtilidade[]
            = {"Ashe", "Kalista", "Sivir", "Varus"};
    private static String adcHyper[]
            = {"Jhin", "Jinx", "Tristana", "Twitch", "Vayne"};

    private static String suppTank[]
            = {"Alistar", "Blitzcrank", "Braum", "Leona", "Nautilus", "Poppy", "Rakan",
                "Shen", "Tahm_Kench", "Taric", "Thresh"};
    private static String suppUtilidade[]
            = {"Bardo", "Brand", "Janna", "Karma", "Lulu", "Malzahar", "Morgana",
                "Nami", "Sona", "Soraka", "Zilean", "Zyra"};

    private static String meta;

    private static String topA = "";

    private static String topV = "";

    private static String nomesArq[] = new String[136];
    private static String chancesArq[][] = new String[136][136];

    public static void main(String[] args) {
        getNomesArq();
        getChancesArq();

        String m[] = {"assassino", "lutador", "mago", "tank"};
        meta = m[new Random().nextInt(m.length)];

        String ld1 = "azul";
        String ld2 = "vermelho";
        picksTop(ld1);
        picksTop(ld2);

        System.out.println("Meta: " + meta + "\n"
                + "\nTIME AZUL\n"
                + "\tTop: " + topA + "\n"
                + "vs\n"
                + "TIME VERMELHO\n"
                + "\tTop: " + topV + "\n\n"
                + "CHANCE DE VITORIA POR ROTA:");
        System.out.println(calculaChance(topA, topV));
    }

    public static void picksTop(String lado) {
        switch (lado) {
            case "azul":
                topA = chooseTop();
                break;
            case "vermelho":
                do {
                    topV = chooseTop();
                } while (topV.equals(topA));
                break;
            default:
                topA = "Lado inválido!";
                topV = topA;
                break;
        }
    }

    private static String chooseTop() {
        String top;
        double a = Math.random();
        Random r = new Random();
        int i;
        
        switch (meta) {
            case "assassino":
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
            case "lutador":
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
            case "mago":
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
            case "tank":
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

    private static void getNomesArq() {
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

    private static String calculaChance(String azul, String vermelho) {
        int c1 = getIndiceChamp(azul);
        int c2 = getIndiceChamp(vermelho);

        if (c1 == -1 || c2 == -1) {
            return "champ invalido!";
        }

        String s = "";
        if (Double.parseDouble(chancesArq[c1][c2])
                > Double.parseDouble(chancesArq[c2][c1])) {
            s = nomesArq[c1] + " : + " + chancesArq[c1][c2] + " - : " + nomesArq[c2];
        } else if (Double.parseDouble(chancesArq[c1][c2])
                == Double.parseDouble(chancesArq[c2][c1])) {
            s = nomesArq[c2] + " : = " + chancesArq[c2][c1] + " = : " + nomesArq[c1];
        } else {
            s = nomesArq[c2] + " : - " + chancesArq[c2][c1] + " + : " + nomesArq[c1];
        }
        return s;
    }

    private static int getIndiceChamp(String nome) {
        for (int i = 0; i < nomesArq.length; i++) {
            if (nomesArq[i].equals(nome)) {
                return i;
            }
        }
        return -1;
    }
}
