/*
 * Projeto Elifoot
 *
 * Tipo: CadastroClubes
 */

package clubes;


import jogadores.Elenco;
import jogadores.Jogador;
import estadios.Estadio;


/**
 *  CadastroClubes representa um cadastro de clubes
 *
 *  @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 *  @see partidas
 */
public class CadastroClubes {


    // Conjunto de clubes
    private RepositorioClubes clubes;

    /**
     * Construtor default da classe ConjuntoClubes
     */
    public CadastroClubes() {
        this.clubes = null;
    }

    /**
     * Construtor da classe ConjuntoClubes
     *
     * @param clubes     repositorio de clubes
     */
    public CadastroClubes(RepositorioClubes clubes) {

        if (clubes != null) {
            this.clubes = clubes;

        }// fim do if (clubes != null)

        else {
            throw new NullPointerException("O Repositorio é nulo");
        }

    }

    /**
     * Insere um jogador no clube
     *
     * @param nome         nome do clube
     * @param jogador      jogador a ser inserido no clube
     *
     */
    public void inserir(String nome,Jogador jogador) {
        if ( !this.pertence(jogador) ) {
            Clube clube = this.clubes.procurar(nome);

            if ( clube != null ) {
                clube.inserirJogador(jogador);

            }//fim do if ( clube != null )

            else {
                throw new NullPointerException("Clube inexistente\n");
            }
        }// fim do if ( !this.pertence(jogador) )

        else {
            throw new NullPointerException("Jogador ja pertence a um clube");
        }

    }

    /**
     * Insere um clube na lista de clubes
     *
     * @param clube        um clube a ser inserido na lista
     *
     */
    public void inserir(Clube clube) {
        if ( this.clubes == null ) {
            this.clubes = new ConjuntoClubes();
        }// fim do if ( this.clubes == null )

        this.clubes.inserir(clube);
    }

    /**
     * Remove um clube da lista de clubes
     *
     * @param clube         um clube a ser removido na lista
     *
     */
    public void remover(Clube clube) {
        clubes.remover(clube);
    }

    /**
     * Retorna o numero de clubes na lista
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroElementos() {
      	return clubes.numeroElementos();
    }

    /**
     * Retorna        true se clube pertence ao conjunto de clubes
     *                false, caso contrario
     *
     * @param clube    um clube a ser verificado no conjunto
     *
     * @return        true se clube pertence ao conjunto de clubes
     *                false, caso contrario
     *
     */
    public boolean pertence(Clube clube) {
        return clubes.pertence(clube);
    }

    /**
     * Retorna           true se jogador pertence ao conjunto de clubes
     *                   false, caso contrario
     *
     * @param jogador    um jogador a ser verificado no conjunto
     *
     * @return           true se jogador pertence ao conjunto de clubes
     *                   false, caso contrario
     *
     */
    public boolean pertence(Jogador jogador) {
        boolean resultado = false;

        if ( this.clubes != null ) {
            resultado = this.clubes.pertence(jogador);
        }//fim do if ( this.clubes != null )

        else {
            throw new NullPointerException("O repositorio de clubes esta vazio\n");
        }

        return resultado;
    }

    /**
     * Retorna um clube da lista de clubes
     *
     * @param n        a posicao do clube no array conjunto
     *
     * @return         o clube da posicao n
     *
     */
    public Clube getClube(int n) {
        return clubes.getClube(n);
    }

    /**
     * Retorna a posição de um clube na lista de clubes
     *
     * @param clube    um clube da lista de clubes
     *
     * @return         um inteiro representando a posicao do clube na lista
     *
     */
    public int getPosicao(Clube clube) {
        return clubes.getPosicao(clube);
    }


    /**
     * Retorna uma string que descreve o objeto
     */
    public String toString() {
        return clubes.toString();
    }

   /**
    * Metodo para testar a classe
    */
    public static void main(String a[]) {

        Clube clube1,clube2;
        Jogador jogador1,jogador2;


        clube1 = new Clube("SPORT",new Estadio(34567),new Elenco());
        jogador1 = new Jogador("Rogerio",9,1000,Jogador.GOLEIRO);
        clube1.inserirJogador(jogador1);

        clube2 = new Clube("NAUTICO",new Estadio(24500),new Elenco());
        jogador2 = new Jogador("Roger",3,1000,Jogador.ATACANTE);
        clube1.inserirJogador(jogador2);

        RepositorioClubes r = new ConjuntoClubes();
        CadastroClubes c = new CadastroClubes(r);
        c.inserir(clube1);
        c.inserir(clube2);
        System.out.println(c.toString());
        c.remover(clube2);
        System.out.println(c.toString());
    }

}