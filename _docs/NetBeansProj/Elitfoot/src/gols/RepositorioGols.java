/*
 * Projeto Elifoot
 *
 * Tipo: ConjuntoGols
 */

package gols;


/**
 * RepositorioGols fornece os metodos que devem ser implementados
 * numa colecao de gols.
 * 
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */

public interface RepositorioGols{

   
    /**
     * Insere um gol na lista de gols
     *
     * @param   g   O gol a ser inserido
     * @return      O numero de elementos da lista
     */
    public int inserir(Gol g);

    /**
     * Retorna o numero de elemento(gols) da lista de gols
     *
     * @return   O numero de elementos deste conjunto.
     */
    public int numeroDeElementos();

    /*
     * Retorna o i-esimo gol da colecao de gols
     * 
     * @param   i     Um inteiro que informa a posicao do gol no repositorio
     * @return        O gol que esta naquela posicao 
     */
    public Gol getGol(int i);    
   
    /**
     * Retorna uma String que representa o conteudo do objeto
     *
     * @return Uma string que lista o conjunto de gols
     */
    public String toString();

}

