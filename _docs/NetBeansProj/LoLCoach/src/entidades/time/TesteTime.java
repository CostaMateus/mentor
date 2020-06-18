package entidades.time;

import entidades.jogador.Jogador;
import entidades.tecnico.Tecnico;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

/*
 * @author Mateus L. Costa
 */
public class TesteTime {

    private static ArrayList<ArrayList<Jogador>> todosJogadores = new ArrayList<>();
    private static ArrayList<Tecnico> tecnicos = new ArrayList<>();
    private static ArrayList<Time> times = new ArrayList<>();

    public static void main(String[] args) {
        jogadores_objetos_todos();
        jogadores_objetos_times_e_tecnicos();

        for (int i = 0; i < times.size(); i++) {
            times.get(i).setTecnico(tecnicos.get(i));
            times.get(i).setElenco(todosJogadores.get(i));
            System.out.println(times.get(i).toString());
        }
    }

    public static void jogadores_objetos_todos() {
        String[] t = {"cnb", "intz", "keyd", "one", "pain", "pro", "red", "show"};
        ArrayList<Jogador> jogadores;
        for (String s : t) {
            jogadores = new ArrayList<>();
            try (FileReader fr = new FileReader("jogadores_objetos_" + s + ".txt"); 
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
            todosJogadores.add(jogadores);
        }
//        for (Jogador J : jogadores) {
//            System.out.println(J.toString());
//        }
    }

    public static void jogadores_objetos_times_e_tecnicos() {
        try (FileReader fr = new FileReader("jogadores_objetos_times_e_tecnicos.txt");
                BufferedReader br = new BufferedReader(fr)) {
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
        } catch (IOException ex) {
            ex.getMessage();
        }
//        for (int i = 0; i < times.size(); i++) {
//            System.out.println("Time: " + times.get(i));
//            System.out.println("Técinco: " + tecnicos.get(i).getNomeCompleto() + "\n");
//        }
    }
    
    public ArrayList<Time> getTimes() {
        jogadores_objetos_todos();
        jogadores_objetos_times_e_tecnicos();

        for (int i = 0; i < times.size(); i++) {
            times.get(i).setTecnico(tecnicos.get(i));
            times.get(i).setElenco(todosJogadores.get(i));
//            System.out.println(times.get(i).toString());
        }
        return times;
    }

}
