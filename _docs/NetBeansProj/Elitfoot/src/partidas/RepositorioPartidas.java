/*
 * Projeto Elifoot
 *
 * Tipo: ConjuntoPartidas
 */

package partidas;

import gols.Placar;
import clubes.Clube;

/**
 * ConjuntoPartidas representa uma colecao de partidas implementada
 * atraves array
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public interface RepositorioPartidas {
  
   
    /**
     * Insere uma partida no conjunto de partidas
     *
     * @param p     a partida a ser inserida
     *
     */
    public void inserir(Partida p);

    /**
     * Retorna o numero de partidas do comjunto de partidas
     *
     * @return       um inteiro contendo o numero de partidas
     *
     */
    public int numeroElementos();
    
    
    /**
     * Verifica se uma partida pertence ao conjunto de partidas
     *
     * @param p        a partida que se deve verificar se pertence ao conjunto
     *
     * @return       true de a partida pertence ao conjunto, false caso contrario
     */
    public boolean pertence(Partida p);

    /**
     * Verifica se algum clube pertence a uma partida do conjunto de partidas
     *
     *
     * @param casa          o clube que joga em casa
     * @param visitante     o clube que joga como visitante
     *
     * @return     true
     */
    public boolean pertence(Clube casa,Clube visitante);

    /**
     * Retorna o placar de uma partida específica
     *
     * @param p     uma partida
     *
     * @return      o Placar da partida
     */
    public Placar getPlacar(Partida p);
    

    /**
     * Retorna o clube que joga em casa em uma partida específica
     *
     * @param p     uma partida
     *
     * @return      o clube que joga em casa
     *
     */
    public Clube getCasa(Partida p);
    

    /**
     * Retorna o clube que joga como visitante
     *
     * @param p     uma partida
     *
     * @return      o clube que joga a partida como visitante
     *
     */
    public Clube getVisitante(Partida p);
    

    /**
     * Retorna a enésima partida do conjunto de partidas
     *
     * @param n     o numero da partida
     *
     * @return      a partida numero n
     *
     */
    public Partida getPartida(int n);

}
