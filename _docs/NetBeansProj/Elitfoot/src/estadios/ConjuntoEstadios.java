/*
 * Projeto Elifoot
 *
 * Tipo: ConjuntoEstadios
 */

package estadios;

/**
 * ConjuntoEstadios representa um array de estadios dos torneios
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 */
public class ConjuntoEstadios implements RepositorioEstadios {

    // Tamanho do array
    private final int TAM = 50;

    // Indice do array
    private int indice;

    // Array de estadios
    private Estadio[] conjunto = new Estadio[TAM] ;

    /**
     * Construtor da classe ConjuntoEstadio
     */
    public ConjuntoEstadios() {
        this.indice = 0;
    }

    /**
     * Insere um estadio no conjunto de estadios
     *
     * @param estadio          um estadio a ser inserido no conjunto
     *
     */
    public void inserir(Estadio estadio) {
    	if (indice < TAM) {
           this.conjunto[this.indice] = estadio;
           this.indice = this.indice + 1;
        }//fim do if (indice < TAM)

        else {
           throw new NullPointerException("O conjunto de estadios esta cheio\n");
        }
    }

    /**
     * Retorna o numero de estadios na lista
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroElementos() {
        return indice;
    }

    /**
     * Verifica se um estadio pertence ou não a um conjunto de estadio
     *
     * @param estadio   um estadio a ser verificado
     *
     * @return          true se o estadio pertencer ao conjunto ou false caso contrário
     *
     */
    public boolean pertence(Estadio estadio) {
        int i=0;
        boolean res = false;

        if (estadio == null) {
            throw new NullPointerException("Estadio nulo" );

     	}// fim do if(estadio == null)

     	else {

     	    while (i<indice) {

     	        if (conjunto[i].equals(estadio)) {
     	            res = true;
     	            i=indice-1;

     	        }// fim do if(conjunto[i].equals(estadio))

     	        i = i+1;

     	    }// fim do while

     	}// fim do else

     	return res;
    }

    /**
     * Retorna um estadio da lista de estadios de acordo com um índice
     *
     * @param n        a posicao do estadios no array conjunto
     *
     * @return         o estadio da posicao n
     *
     */
    public Estadio getEstadio (int n) {
        Estadio estadio = null;

        if (n < this.indice && n >= 0) {
            estadio = this.conjunto[n];

        }// fim do if(n < indice)

        else {
            throw new NullPointerException("Indice maior do que a quantidade disponivel no array");
        }
        return estadio;
    }

    /**
     * Retorna a posição de um estadio na lista de estadios
     *
     * @param estadio  um estadio da lista de estadios
     *
     * @return         um inteiro representando a posicao do estadio na lista
     *
     */
    public int getPosicao(Estadio estadio) {

        int pos = -1;
        int i;

        if (estadio == null ) {
            throw new NullPointerException("ESTADIO NAO EXISTE");

        }// fim do if( estadio == null )

        for (i=0;i<indice;i++) {

             if (conjunto[i].equals(estadio)) {
                 pos = i;
                 i = indice-1;

             }// fim do if(conjunto[i].equals(estadio))

        } // fim do for

        if (pos == -1) {
            throw new NullPointerException("Estadio nao esta no Conjunto");

        } // fim do if( pos == -1 )

        return pos;
    }

    /**
     * Retorna uma string que descreve o objeto
     *
     */
    public String toString() {
        int i=0;
        StringBuffer buf = new StringBuffer();
        String ret ;
        int j = this.numeroElementos();

        while(i<j) {
       	    buf.append(conjunto[i].getCapacidade() + " " ) ;
       	    i++;

        } // fim do while

        ret = new String(buf);
        return ret;
    }

    /**
     * Metodo para testar a classe
     *
     */
    public static void main(String a[]) {

        Estadio estadio1, estadio2;
        
        estadio1 = new Estadio(34567, "Barradão");
        estadio2 = new Estadio (23451, "Maracanã");

        ConjuntoEstadios e = new ConjuntoEstadios();

        e.inserir(estadio1);
        e.inserir(estadio2);
        System.out.println(e.toString());

    }


}
