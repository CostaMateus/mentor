package entidades.tecnico;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;

/*
 * @author Mateus L. Costa
 */
public class TesteTecnico {

    private static ArrayList<String> nome_times = new ArrayList<>();

    public static void main(String[] args) {
        jogadores_objetos_times_e_tecnicos();
    }

    public static void jogadores_objetos_times_e_tecnicos() {
        ArrayList<Tecnico> tecnicos = new ArrayList<>();
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

                nome_times.add(time);
            }

        } catch (IOException ex) {
            ex.getMessage();
        }

        for (int i = 0; i < nome_times.size(); i++) {
            System.out.println("Time: " + nome_times.get(i));
            System.out.println("Técinco: " + tecnicos.get(i).getNomeCompleto() + "\n");
        }
    }

}
