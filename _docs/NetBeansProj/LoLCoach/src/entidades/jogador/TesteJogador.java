package entidades.jogador;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

/*
 * @author Mateus L. Costa
 */
public class TesteJogador {

    public static void main(String[] args) {
        //Teste Jogador.
//        Jogador j = new Jogador("Mateus", "Costa", "kemns", 22, 100, 2950.76, 
//                29500.6, Jogador.PosicaoEnum.ATIRADOR);
//        System.out.println(j.toString());
//        System.out.println("==========================");
        jogadores_objetos_intz();

    }

    public static void jogadores_objetos_intz() {
        ArrayList<Jogador> jogadores = new ArrayList<>();

        // pega os dados dos jogadores e monta os objetos, teste com a INTZ
        try (FileReader fr = new FileReader("jogadores_objetos_intz.txt"); 
                BufferedReader br = new BufferedReader(fr)) {
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

        } catch (IOException ex) {
            ex.getMessage();
        }

        for (Jogador J : jogadores) {
            System.out.println(J.toString()+"\n");
        }
    }

}
