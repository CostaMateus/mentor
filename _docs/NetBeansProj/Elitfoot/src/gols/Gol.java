/*
 * Projeto Elifoot
 *
 * Tipo: Gol
 */

package gols;

import jogadores.Jogador;


/**
 * A classe Gol representa o um gol que acontece em uma determinada partida.
 * um objeto nada mais e que um par (jogador, tempo)
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public class Gol {

    // Autor do Gol
    private Jogador autor;

    // Tempo que ocorreu o gol
    private int tempo;

    /**
     * Construtor da classe Gol
     *
     * @param autor      o jogador que fez o gol
     * @param tempo      o minuto da partida em que o gol foi feito
     *
     * @see partidas.Jogador
     */
    public Gol(Jogador autor,int tempo) {
        this.autor = autor;
        this.tempo = tempo;

        //Se o jogador fez um gol, setGol() altera seu numero de gols marcados
        this.autor.setGol();
    }

    /**
     * Retorna uma string que descreve o objeto
     *
     * @return Uma string que contem informacoes sobre o gol
     *
     * @see partidas.Jogador
     */
    public String toString() {
        return ("Autor: " + autor.getNome() + "  "  + String.valueOf(tempo)+ "min" );
    }

    /**
     * Metodo para testar a classe
     */
    public static void main(String a[]) {

        Gol g;
        int tempo = 90;

        Jogador autor = new Jogador("Renato",9,10000,4);
        g = new Gol(autor,tempo);

        System.out.println(g.toString());
    }




}