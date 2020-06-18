/*
 * Projeto Elifoot
 *
 * Tipo: ConjuntoClubes
 */

package clubes;


import jogadores.Elenco;
import jogadores.Jogador;
import estadios.Estadio;


/**
 * ConjuntoClubes representa uma colecao de clubes 
 * 
 *  @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 *  @see partidas
 */
public class ConjuntoClubes implements RepositorioClubes {


    //Tamanho do array
    final int TAM = 50;

    //Indice do array
    int indice;

    //Array de clubes
    private Clube[] conjunto = new Clube[TAM] ;

    /**
     * Construtor da classe ConjuntoClubes
     */
    public ConjuntoClubes() {
        indice = 0;
    }

    /**
     * Insere um clube na lista de clubes
     *
     * @param  clube     um clube a ser inserido no conjunto
     *
     */
    public void inserir(Clube clube) {
        conjunto[indice] = clube;
        indice = indice + 1;
    }

    /**
     * Remove um clube da lista de clubes
     *
     * @param clube     um clube a ser removido no conjunto
     *
     */
    public void remover(Clube clube) {

        if (clube != null) {
            if (this.pertence(clube) == true ) {
                conjunto[this.getPosicao(clube)] = conjunto[indice-1];
                conjunto[indice-1] = null;
                indice = indice -1;
            } // fim do if(this.pertence(clube) == true )

            else {
        	    throw new NullPointerException("Esse clube nao pode ser removido");
            }

        } // fim do if(clube =! null)

        else {
        	throw new NullPointerException("O clube é nulo");
        }
    }

    /**
     * Retorna o numero de clubes
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroElementos() {
        return indice;
    }

    /**
     * Retorna    true se o clube pertence a um conjunto de clubes
     *            false caso contrario
     *
     * @param     clube    clube a ser verificado no conjunto de clubes
     *
     * @return    true se o clube pertence a um conjunto de clubes
     *            false caso contrario
     *
     */
    public boolean pertence(Clube clube) {
        int i=0;
        boolean res = false;

        if(clube == null) {
            throw new NullPointerException("Nao foi passado nenhum clube" );//nossa excecao

     	} // fim do if(p == null)

     	else {
     	    while(i < indice) {

     	       if (conjunto[i].equals(clube)){
     	           res = true;
     	           i=indice-1;

     	       }  //fim do if(conjunto[i].equals(p))

     	       i = i+1;

     	    }  //fim do while

     	} // fim do else

     	return res;

    }

    /**
     * Retorna    true se o jogador pertence a um conjunto de clubes
     *            false caso contrario
     *
     * @param     jogador jogador a ser verificado no conjunto de clubes
     *
     * @return    true se o jogador pertence a um conjunto de clubes
     *            false caso contrario
     *
     */
    public boolean pertence(Jogador jogador) {
    	 int i = 0;
    	 boolean achou = false;

         while( i < this.numeroElementos() && !achou ) {
            achou = getClube(i).getElenco().pertence(jogador);
            i++;
         }//fim do while( i < this.numeroElementos() && !achou )

         return achou;
    }

    /**
     * Retorna    o clube caso pertença a conjunto de clubes
     *
     * @param  nome clube a ser procurado no conjunto de clubes
     *
     * @return    true se o clube pertence a uma conjunto de clubes e false caso contrario
     */
    public Clube procurar(String nome) {
        int i = 0;
        Clube resultado = null;

        while( i< indice) {

     	     if ( conjunto[i].getNome().equals(nome) ) {
     	         resultado = conjunto[i];
     	         i = indice - 1;
     	     }  //fim do if(conjunto[i].equals(p))

     	     i = i+1;

     	  }  //fim do while

     	  return resultado;
    }

    /**
     * Retorna um clube de posição n da conjunto de clubes
     *
     * @param      n    a posicao do clube no array conjunto
     *
     * @return         o clube da posicao n
     *
     */
    public Clube getClube(int n) {
        Clube clube = new Clube();

        if (n < indice) {
            clube = conjunto[n];

        } // fim do if(n < indice)

        return clube;
    }

    /**
     * Retorna a posição de um clube no conjunto de clubes
     *
     * @param     clube     um clube do conjunto de clubes
     *
     * @return         um inteiro representando a posicao do clube no conjunto
     *
     */
    public int	getPosicao(Clube clube) {
       	int pos = -1;
      	int i;

        if( clube == null ) {
            throw new NullPointerException("Clube nao existente");

        } // fim do if( clube == null )

       	for(i=0; i < indice; i++) {

      	    if (conjunto[i].equals(clube)) {
                pos = i;
                i = indice-1;

            } // fim do if(conjunto[i].equals(clube))

        } // fim do for

        if ( pos == -1 ) {
            throw new NullPointerException("Clube nao esta no Conjunto");

        } // fim do if( pos == -1 )

        return pos;

    }


    /**
     * Retorna uma string que descreve o objeto
     */
    public String toString() {
        int i=0;
        StringBuffer buf = new StringBuffer();
        String ret ;
        int j = this.numeroElementos();

        while(i<j) {
       	    buf.append(conjunto[i].getNome() + " " ) ;
       	    i++;

        } // fim do while

        ret = new String(buf);
        return ret;
    }

    /**
     * Metodo para testar a classe
     */
    public static void main(String a[]) {

        Clube clube1,clube2;
        Jogador jogador1,jogador2;
        ConjuntoClubes conjunto = new ConjuntoClubes();


        clube1 = new Clube("SPORT",new Estadio(34567),new Elenco());
        jogador1 = new Jogador("Rogerio",9,1000,Jogador.GOLEIRO);
        clube1.inserirJogador(jogador1);
        conjunto.inserir(clube1);

        clube2 = new Clube("NAUTICO",new Estadio(24500),new Elenco());
        jogador2 = new Jogador("Roger",3,1000,Jogador.ATACANTE);
        clube1.inserirJogador(jogador2);
        conjunto.inserir(clube2);


        System.out.println("Numero de elementos do conjuto de clubes "+conjunto.numeroElementos());
        System.out.println(conjunto.toString());

    }

}