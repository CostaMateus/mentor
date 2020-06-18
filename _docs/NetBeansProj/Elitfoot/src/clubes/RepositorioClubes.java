/*
 * Projeto Elifoot
 *
 * Tipo: RepositorioClubes
 */

package clubes;

import jogadores.Jogador;

/**
 * ConjuntoClubes fornece os metodos que devem ser implementados numa colecao de clubes 
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public interface RepositorioClubes {

    /**
     * Insere um clube na lista de clubes
     *
     * @param     clube     um clube a ser inserido na lista
     *
     */
    public void inserir(Clube clube);

    /**
     * Remove um clube da lista de clubes
     *
     * @param    clube      um clube a ser removido na lista
     *
     */
    public void remover(Clube clube);

    /**
     * Retorna o numero de clubes na lista
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroElementos() ;

    /**
     * Verifica se um clube pertence ou não a um conjunto de clubes
     *
     * @param clube     um clube a ser verificado
     *
     * @return          true se o clube pertencer ao conjunto ou false caso contrário
     *
     */
    public boolean pertence(Clube clube);

    /**
     * Verifica se um jogador pertence ou não a um conjunto de clubes
     *
     * @param jogador     um jogador a ser verificado
     *
     * @return          true se o jogador pertencer ao conjunto ou false caso contrário
     *
     */
    public boolean pertence(Jogador jogador);

    /**
     * Procura um jogador num conjunto de clubes
     *
     * @param nome     um jogador a ser procurado
     *
     * @return            um jogador a ser procurado
     *
     */
    public Clube procurar(String nome);

    /**
     * Retorna um clube da lista de clubes de acordo com um índice
     *
     * @param     n     a posicao do clube no array conjunto
     *
     * @return         o clube da posicao n
     *
     */
    public Clube getClube(int n);
        
    /**
     * Retorna a posição de um clube na lista de clubes
     *
     * @param     clube     um clube da lista de clubes
     *
     * @return         um inteiro representando a posicao do clube na lista
     *
     */
    public int	getPosicao(Clube clube);

    /**
     * Retorna uma string que descreve o objeto
     *
     */
    public String toString();

    
}