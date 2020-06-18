/*
 * Projeto Elifoot
 *
 * Tipo: RepositorioEstadios
 */


package estadios;

/**
 * RepositorioEstadios fornece os metodos que devem ser implementados
 * numa colecao de gols.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 */

public interface RepositorioEstadios {

    /**
     * Insere um estadio no conjunto de estadios
     *
     * @param estadio          um estadio a ser inserido no conjunto
     *
     */
    public void inserir(Estadio estadio);

    /**
     * Retorna o numero de estadios no conjunto
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroElementos();

    /**
     * Verifica se um estadio pertence ou não a um conjunto de estadios
     *
     * @param estadio   um estadio a ser verificado
     *
     * @return          true se o estadio pertencer ao conjunto ou false caso contrário
     *
     */
    public boolean pertence(Estadio estadio);

    /**
     * Retorna um estadio da lista de estadios de acordo com um índice
     *
     * @param n  a posicao do estadios no array conjunto
     *
     * @return         o estadio da posicao n
     *
     */
    public Estadio getEstadio (int n);

    /**
     * Retorna a posição de um estadio na lista de estadios
     *
     * @param estadio   um estadio da lista de estadios
     *
     * @return         um inteiro representando a posicao do estadio na lista
     *
     */
    public int getPosicao(Estadio estadio);

    /**
     * Retorna uma string que descreve o objeto
     *
     * @return   Uma string
     */
    public String toString();


}


