/*
 * Projeto Elifoot
 *
 * Tipo: Rodada
 */

package partidas;

import clubes.Clube;
import estadios.Estadio;
import jogadores.Elenco;

/**
 * Tipo abastrato que representa uma modela de um campeonato
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 */
public class Rodada {


    //Conjunto de partidas de uma rodada
    private RepositorioPartidas conjunto;

    /**
     * Construtor default da Classe Rodada
     */
    public Rodada() {
    	conjunto = new ConjuntoPartidas();
    }

    /**
     * Insere uma partida na Rodada
     *
     * @param p           Uma partida
     */
    public void inserir(Partida p) {
        if ( p == null ) {
           throw new NullPointerException("Nao foram passados clubes");
        }//if ( p == null )
        
        else if ( !conjunto.pertence(p) ) {
           conjunto.inserir(p);
        }//else if ( !conjunto.pertence(p) )
        
        else {
           throw new NullPointerException("Clube ja tem seus jogos marcados");
        }
    }

    /**
     * Retorna a en�sima partida da rodada
     *
     * @param n               A posi��o da partida
     * @return                A partida na posi��o n da rodada
     */
    public Partida getPartida(int n) {
        Partida p = conjunto.getPartida(n);

    	return p;
    }

    public RepositorioPartidas getRepositorio() {
    	 return this.conjunto;
    }
    /**
     * Verifica a exist�ncia de uma partida na rodada
     *
     * @param p                Uma partida.
     * @return                true se a partida existe;
     *                        false caso contr�rio
     */
    public boolean pertence(Partida p) {
    	return conjunto.pertence(p);
    }

    public void executar() {
        for (int i = 0 ; i < this.conjunto.numeroElementos();  i = i + 1) {
            conjunto.getPartida(i).gerarResultado();
        }
    }

    public int numeroElementos() {
    	return this.conjunto.numeroElementos();
    }

    /**
     * Retorna uma String que informa o resultado de uma rodada
     *
     * @return Uma String com as informacoes da rodada
     */
    public String toString() {
        int numeroPartidas;
        StringBuffer buf = new StringBuffer();
        String ret;

        numeroPartidas = this.conjunto.numeroElementos();

        for (int i = 0 ; i < numeroPartidas ; i = i + 1) {

             buf.append(conjunto.getPartida(i).toString() + "\n");
        } // fim do for

        ret = new String(buf);

        return ret;
    }
    
    /**
     * Metodo teste da classe
     */
    public static void main(String args[]) {
        Rodada r = new Rodada();
       

        Clube time1 = new Clube("SAO PAULO",new Estadio(70000),new Elenco(),8);
        Clube time2 = new Clube("FLAMENGO",new Estadio(15000),new Elenco(),7);

        System.out.println("As partidas da rodada sao: "+r.conjunto.toString()+"\n");

        System.out.println("As rodadas do Campeonato sao:"+"\n");
        for (int i = 1;i <= 5; i++ ) {
             Partida p = new Partida(time1,time2,100);
             r.inserir(p);
//             System.out.println(r.toString());
        }
        System.out.println("O numero de partidas da rodada eh: "+r.getRepositorio().numeroElementos()+"\n");
        System.out.println("A partida na posicao 5 eh: \n"+r.getPartida(1)+"\n");
        //System.out.println(r.toString());

     }

}




