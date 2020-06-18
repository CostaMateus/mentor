/*
 * Projeto Elifoot
 *
 * Tipo: RepositorioTorneios
 */

package torneio;

import partidas.Rodada;

/**
 * RepositorioTorneios representa uma interface entre
 * colecao de dados que a implementa e o usuario.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */

public interface RepositorioTorneios {


    /**
     * Insere um novo torneio da lista.
     *
     * @param  torneio    Um torneio a ser inserido.
     */
    public void inserir (Torneio torneio);

    /**
     * Retira um torneio do repositorio.
     *
     * @param  torneio     Um torneio a ser removido do repositorio.
     *
     */
    public void remover(Torneio torneio);


    /**
     * Verifica se um torneio pertence ao conjunto de torneioes
     *
     * @param        Um torneio para verificar se pertence ou nao ao
     *               repositorio.
     *
     * @return       retorna true se um torneio pertence ao conjunto e
     *              false caso contrario
     *
     */
    public boolean pertence(Torneio torneio);


    /**
     * Escolhe o i-esimo torneio do conjunto de jogadores
     *
     * @param       A posicao do torneio dentro da lista encadeada de jogadores
     *
     * @return      um torneio do repositorio.
     */
    public Torneio getTorneio(int i);

    /**
     * Retorna o numero de jogadores do conjunto
     *
     * @return   O numero de elementos do repositorio.
     */
    public int numeroElementos();

     /**
     * Retorna uma rodada de um torneio torneios
     *
     * @param          a posicao do torneio no array conjunto
     * @param          a rodada do torneio.
     *
     * @return         A rodada apos executadas as partidas
     *
     */
    public Rodada executarTorneio(int n,int rodada);

    /**
     * Retorna uma String que representa o conteudo do objeto
     *
     * @return    Uma string de todos elementos da lista
     */
    public String toString();


}


