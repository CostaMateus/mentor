/**
 * Projeto LoLCoah LC
 *
 * Tipo: Partida
 */
package entidades.partida;

import entidades.time.Time;
import java.util.Random;

/**
 * Partida é a classe que representa um jogo entre dois times League of Legends.
 * Com os seguintes atributos:
 *
 * @author Mateus Costa, Filipe Lucas
 */
public class Partida {

    private Time azul;      //Time que jogará do lado azul
    private Time vermelho;  //Time que jogará do lado vermelho
    private int publico;    //Total de viewers simultâneos 

    /**
     * Construtor padrão.
     */
    public Partida() {
        this.azul = null;
        this.vermelho = null;
        this.publico = 0;
    }

    /**
     * Construtor completo.
     *
     * @param a Time que jogará do lado azul do mapa
     * @param v Time que jogará do lado vermelho do mapa
     */
    public Partida(Time a, Time v) {
        this.azul = a;
        this.vermelho = v;
        this.publico = getPublico(a.getMoral(), v.getMoral());
    }
    
    public int getPublico() {
        return this.publico;
    }

    private static int getPublico(int a, int v) {
        int p;

        if (a <= 4 && v <= 4) {
            p = ((a * (new Random().nextInt(15) + 1))
                    + (v * (new Random().nextInt(15) + 1)));
        } else if (a <= 4 || v <= 4) {
            p = ((a * (new Random().nextInt(25) + 1))
                    + (v * (new Random().nextInt(25) + 1)));
        } else if (a <= 7 && v <= 7) {
            p = ((a * (new Random().nextInt(40) + 1))
                    + (v * (new Random().nextInt(40) + 1)));
        } else if (a <= 7 || v <= 7) {
            p = ((a * (new Random().nextInt(50) + 1))
                    + (v * (new Random().nextInt(50) + 1)));
        } else {
            p = ((a * (new Random().nextInt(100) + 1))
                    + (v * (new Random().nextInt(100) + 1)));
        }
        return p * 100;
    }

    /**
     * Executa a partida.
     */
    public void jogar() {
        //
    }
    
    @Override
    public String toString() {
        return "Lado Azul:\n" + azul.toString() + "\n"
                + "Lado Vermelho:\n" + vermelho.toString();
    }

}
