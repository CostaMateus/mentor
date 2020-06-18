/*
 * Projeto Elifoot
 *
 * Tipo: RepositorioJogadores
 */
package jogadores;

/**
 * RepositorioJogadores fornece os metodos que devem ser implementados numa
 * colecao de jogadores.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public interface RepositorioJogadores {

    /**
     * Insere, se for possivel , um jogador na lista de atletas
     *
     * @param jogador Um jogador a ser inserido.
     *
     */
    public void inserir(Jogador jogador);

    /**
     * Insere um jogador na lista de atletas
     *
     * @param jogador Um jogador a ser inserido.
     * @param anterior O no anterior
     *
     * @return O numero de elementos do Conjunto
     */
    public int inserir(Jogador jogador, ListaJogadores anterior);

    /**
     * Chama a fun��o remover auxiliar que exclui um jogador e depois decrementa
     * o numero de jogadores do conjunto
     *
     * @param jogador Um jogador a ser removido.
     *
     */
    public void remover(Jogador jogador);

    /**
     * Verifica se um jogador pertence ao conjunto de jogadores
     *
     * @param jogador Um jogador a ser removido.
     *
     * @return retorna true se um jogador pertence ao conjunto e false caso
     * contrario
     *
     */
    public boolean pertence(Jogador jogador);

    /**
     * Escolhe um jogador aleatorio do Clube
     *
     * @return um jogador do conjunto
     */
    public Jogador getJogador();

    /**
     * Escolhe o i-esimo jogador do conjunto de jogadores
     *
     * @param i A posicao do jogador dentro da lista encadeada de jogadores
     *
     * @return um jogador do conjunto
     */
    public Jogador getJogador(int i);

    /**
     * Retorna o numero de jogadores do conjunto
     *
     */
    public int numeroElementos();

    /**
     * Retorna uma String que representa o conteudo do objeto
     *
     */
    public String toString();

}
