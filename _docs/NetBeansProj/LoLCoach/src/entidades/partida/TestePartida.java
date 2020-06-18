package entidades.partida;

import entidades.time.TesteTime;
import entidades.time.Time;
import java.util.ArrayList;

/*
 * @author Eu
 */
public class TestePartida {

    public static void main(String[] args) {

//        Time tA = new Time("Mack e-Sports");
//        tA.setMoral(10);
//        Time tV = new Time("Mack e-Sports Junior");
//        int i = 0;
//        int p = tA.getMoral() * 1000 + tV.getMoral() * 1000;
//        while (i < 10) {
//            System.out.println(new Random().nextInt(p));
//            i++;
//        }
//==============================================================================

        TesteTime tt = new TesteTime();
        ArrayList<Time> times = tt.getTimes();
        
        Time tA = times.get(1);
        tA.setMoral(10);
        Time tV = times.get(0);
        tV.setMoral(10);
        
        Partida part = new Partida(tA, tV);
        System.out.println(part.toString());
        System.out.println(part.getPublico());
    }
}
