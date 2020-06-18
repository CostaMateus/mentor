/*
 * Projeto Elifoot
 *
 * Tipo: RepositorioRodadas
 */


package torneio;

import partidas.Rodada;

/**
 * RepositorioRodadas representa uma interface entre
 * colecao de dados que a implementa e o usuario.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public interface RepositorioRodadas {

    /**
     * Rotorna todos os jogos da rodada rod
     *
     * @param rodada   Uma rodada a ser inserida na sequencia de rodadas
     *
     */
    public void inserir(Rodada rodada);

    /**
     * Devolve o numero de elementos da sequencia.
     *
     * @return   O numero de elementos da sequencia.
     */
    public int getNumeroElementos();

    /**
     * Devolve a raiz da sequencia
     *
     * @return   A primeira rodada da sequencia.
     */
    public Rodada getNoAtual();

    /**
     * Devolve uma sequencia sem o primeiro elemento.(tail)
     *
     * @return    Uma sequencia sem a raiz da sequencia.
     */
    public SequenciaRodadas getNoProximo();
}



