package entidades.campeao;

import entidades.campeao.Campeao.FuncaoEnum;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.Random;

/*
 * @author Eu
 */
public class TesteCampeao {

    public static void main(String[] args) {
//        campeoes_1_objetos();
//        campeoes_2_chance_vitoria();
//        campeoes_3_sinergia();
//        chance2();
    }

    public static void campeoes_1_objetos() {
        ArrayList<Campeao> champs = new ArrayList<>();

        // pega os dados dos campeoes e monta os objetos 
        try (FileReader fr = new FileReader("campeoes_1_objetos.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            while ((linha = br.readLine()) != null) {
                String champ[] = linha.split(" ");
                String n = champ[0];
                FuncaoEnum f1 = FuncaoEnum.valueOf(champ[1].toUpperCase());
                FuncaoEnum f2;
                if (champ[2].equals("NA")) {
                    f2 = FuncaoEnum.NA;
                } else {
                    f2 = FuncaoEnum.valueOf(champ[2].toUpperCase());
                }
                int at = Integer.parseInt(champ[3]);
                int de = Integer.parseInt(champ[4]);
                int ma = Integer.parseInt(champ[5]);
                int di = Integer.parseInt(champ[6]);
//                int pe = (di * 1000);
                String dt = champ[7];
                int ip = Integer.parseInt(champ[8]);
                int rp = Integer.parseInt(champ[9]);
                Campeao c = new Campeao(n, f1, f2, at, de, ma, di, dt, ip, rp);
                champs.add(c);
            }

        } catch (IOException ex) {
            ex.getMessage();
        }

        for (Campeao c : champs) {
            if (c.getF1().equals("SUPORTE")) {
                System.out.println(c.getNome() + ": " + c.getF1() + " " + c.getF2());
            }
        }
//        System.out.println(champs.get(11).toString());
    }

    public static void campeoes_2_chance_vitoria() {
        // pega a lista de nomes 
        String nomes[] = new String[136];
        try (FileReader fr = new FileReader("campeoes_0_nomes.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ = linha;
                nomes[i++] = champ;
            }
        } catch (IOException ex) {
            ex.getMessage();
        }

        // pega a chance de vitoria de um campeao contra outro 
        String chance[][] = new String[136][136];
        try (FileReader fr = new FileReader("campeoes_2_chance_vitoria.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ[] = linha.split(" ");
                for (int j = 0; j < chance.length; j++) {
                    chance[i][j] = champ[j];
                }
                i++;
            }
        } catch (IOException ex) {
            ex.getMessage();
        }

        String s = "";
        for (int i = 0; i < chance.length; i++) {
            for (int j = 0; j < chance.length; j++) {
                s += chance[i][j] + " ";
            }
            s += "\n";
        }
        System.out.println(s);
        // chance de vitoria de aatrox sobre anivia 
        System.out.println(nomes[0] + " : " + chance[0][5] + " : " + nomes[5]);

        // chance de vitoria de aatrox sobre darius 
        System.out.println(nomes[0] + " : " + chance[0][19] + " : " + nomes[19]);
    }

    public static void campeoes_3_sinergia() {
        // pega a lista de nomes 
        String nomes[] = new String[136];
        try (FileReader fr = new FileReader("campeoes_0_nomes.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ = linha;
                nomes[i++] = champ;
            }
        } catch (IOException ex) {
            ex.getMessage();
        }

        // pega a combinação entre os campeoes 
        String ffb[][] = new String[136][136];
        try (FileReader fr = new FileReader("campeoes_3_sinergia.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ[] = linha.split(" ");
                for (int j = 0; j < ffb.length; j++) {
                    ffb[i][j] = champ[j];
                }
                i++;
            }
        } catch (IOException ex) {
            ex.getMessage();
        }
        String s = "";
        for (int i = 0; i < ffb.length; i++) {
            for (int j = 0; j < ffb.length; j++) {
                s += ffb[i][j] + " ";
            }
            s += "\n";
        }
        System.out.println(s);
        // aatroz nao funciona bem com camille 
        System.out.println(nomes[0] + " : " + ffb[0][15] + " : " + nomes[15]);

        // camille funciona bem com aatrox 
        System.out.println(nomes[68] + " : " + ffb[68][132] + " : " + nomes[132]);

//        //lEITURA DO ARQUIVO COM AS COMBINAÇÕES
//        String zz[][] = new String[136][7];
//        try (FileReader fr = new FileReader("zz.txt")) {
//            BufferedReader br = new BufferedReader(fr);
//            String linha;
//            int i = 0;
//            while ((linha = br.readLine()) != null) {
//                String champ[] = linha.split(" ");
//                for (int j = 0; j < zz[0].length; j++) {
//                    zz[i][j] = champ[j];
//                }
//                i++;
//            }
//            br.close();
//        } catch (IOException ex) {
//            Logger.getLogger(TesteCampeao.class.getName()).log(Level.SEVERE, null, ex);
//        }
//
//        for (int lin = 1; lin < ffb.length; lin++) {
//            for (int col = 1; col < ffb[0].length; col++) {
//                int i = 1;
//                while (i < 7) {
//                    if (ffb[0][col].equals(zz[lin - 1][i])) {
//                        ffb[lin][col] = "true";
//                    }
//                    i++;
//                }
//            }
//        }
//
//        //REESCRITA DO ARQUIVO COM OS NOVOS TRUE
//        File arquivo = new File("novo_funciona_bem.txt");
//        try {
//            FileWriter fw = new FileWriter(arquivo);
//            BufferedWriter bw = new BufferedWriter(fw);
//
//            for (int lin = 0; lin < ffb.length; lin++) {
//                for (int col = 0; col < ffb[0].length; col++) {
//                    bw.write(ffb[lin][col] + " ");
//                }
//                bw.newLine();
//            }
//            bw.close();
//            fw.close();
//
//        } catch (IOException ex) {
//        }
    }

    public static void chance2() {
        // pega a lista de nomes 
        String nomes[] = new String[136];
        try (FileReader fr = new FileReader("campeoes_0_nomes.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ = linha;
                nomes[i++] = champ;
            }
        } catch (IOException ex) {
            ex.getMessage();
        }

        // LEITURA DO ARQUIVO ATUAL COM AS CHANCES
        String cVelha[][] = new String[136][136];
        try (FileReader fr = new FileReader("campeoes_2_chance_vitoria.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ[] = linha.split(" ");
                for (int j = 0; j < cVelha.length; j++) {
                    cVelha[i][j] = champ[j];
                }
                i++;
            }
        } catch (IOException ex) {
            ex.getMessage();
        }
//
//        String s = "";
//        for (int i = 0; i < cVelha.length; i++) {
//            for (int j = 0; j < cVelha.length; j++) {
//                s += cVelha[i][j] + " ";
//            }
//            s += "\n";
//        }
//        System.out.println(s);
//
        //LEITURA DO ARQUIVO COM AS CHAMPS/CHANCE
        String zzNova[][] = new String[136][18];
        try (FileReader fr = new FileReader("zz_chance_v.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
            String linha;
            int i = 0;
            while ((linha = br.readLine()) != null) {
                String champ[] = linha.split(" ");
                for (int j = 0; j < zzNova[0].length; j++) {
                    zzNova[i][j] = champ[j];
                }
                i++;
            }
        } catch (IOException ex) {
            ex.getMessage();
        }

//        s = "";
//        for (int i = 0; i < zzNova.length; i++) {
//            for (int j = 0; j < zzNova[0].length; j++) {
//                s += zzNova[i][j] + " ";
//            }
//            s += "\n";
//        }
//        System.out.println(s);
//
        DecimalFormat df = new DecimalFormat("0.00");
        Random r = new Random();
        for (int lin = 0; lin < cVelha.length; lin++) {
            for (int col = 0; col < cVelha[0].length; col++) {
                int i = 1;
                while (i < zzNova[0].length) {
                    if (i < 7 && zzNova[lin][i].equals(nomes[col])) {
                        cVelha[lin][col] = "0.25";
                        cVelha[col][lin] = "0.75";
                    } else if (i < 13 && zzNova[lin][i].equals(nomes[col])) {
                        cVelha[lin][col] = "0.75";
                        cVelha[col][lin] = "0.25";
                    } else if (zzNova[lin][i].equals(nomes[col])) {
                        if (cVelha[lin][col].equals("0.25")) {
                            cVelha[lin][col] = "0.35";
                            cVelha[col][lin] = "0.65";
                        } else if (cVelha[lin][col].equals("0.75")) {
                            cVelha[lin][col] = "0.65";
                            cVelha[col][lin] = "0.35";
                        } else {
                            cVelha[lin][col] = "0.50";
                            cVelha[col][lin] = "0.50";
                        }
                    }
                    i++;
                }
                if (!(cVelha[lin][col].equals("-1.0"))) {
                    double d = (0.40 + ((0.60 - 0.40) * r.nextDouble()));
                    cVelha[lin][col] = (df.format(d)).replace(",", ".");
                    cVelha[col][lin] = (df.format(1.0 - d)).replace(",", ".");
                }
            }
        }

        String s = "";
        for (int i = 0; i < cVelha.length; i++) {
            for (int j = 0; j < cVelha.length; j++) {
                s += cVelha[i][j] + " ";
            }
            s += "\n";
        }
        System.out.println(s);

        //REESCRITA DO ARQUIVO COM OS NOVOS TRUE
        File arquivo = new File("novo_chance_vitoria.txt");
        try (FileWriter fw = new FileWriter(arquivo); 
                BufferedWriter bw = new BufferedWriter(fw)) {

            for (int lin = 0; lin < cVelha.length; lin++) {
                for (int col = 0; col < cVelha[0].length; col++) {
                    bw.write(cVelha[lin][col] + " ");
                }
                bw.newLine();
            }

        } catch (IOException ex) {
            ex.getMessage();
        }
    }
}
