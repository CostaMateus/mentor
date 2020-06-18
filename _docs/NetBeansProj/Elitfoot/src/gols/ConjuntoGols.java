/*
 * Projeto Elifoot
 *
 * Tipo: ConjuntoGols
 */

package gols;


import jogadores.Jogador;

/**
 * ConjuntoGols representa uma colecao de gols implementada 
 * atraves de lista encadeada
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */

public class ConjuntoGols implements RepositorioGols{


    // numero de elementos do conjunto de gols
    private int numeroElementos;
   
    // chave na lista encadeada 
    private Gol noAtual;
   
    // proximo no na lista encadeada de gols
    private ConjuntoGols noProximo;


    /**
     * Insere um gol na lista de gols
     *
     * @param  g   O gol a ser inserido
     * @return     O numero de elementos da lista
     */
    public int inserir(Gol g){

       if (this.noAtual == null) {
            this.noAtual = g;
            this.numeroElementos = this.numeroElementos + 1;
            noProximo = new ConjuntoGols();

        }  // fim do if (this.noAtual == null)

        else {
            this.numeroElementos = noProximo.inserir(g) + 1;
        } 

        return this.numeroDeElementos();
    }

    /**
     * Retorna o numero de elemento(gols) da lista de gols
     *
     * @return   O numero de elementos deste conjunto.
     */
    public int numeroDeElementos() {
        return this.numeroElementos;
    }

    /*
     * Retorna o gol da posicao i no repositorio de gols
     * 
     *@param  i Um inteiro que informa a posicao do gol no repositorio
     *@return O gol que esta naquela posicao 
     */
    public Gol getGol(int i){
        Gol g;

        if (i<this.numeroElementos) {

            if (i == 0) {
                g = noAtual; 	    

            } // fim do if (i == 0)

            else {
                g = noProximo.getGol(i-1);
            }	 

        } // fim do if (i<this.numeroElementos)

        else {
            throw new NullPointerException("NAO HA TANTOS GOLS");
        } // fim do else    	    

        return g;
    }
   
    /**
     * Retorna uma String que representa o conteudo do objeto
     *
     *@return Uma string que lista o conjunto de gols
     */
    public String toString() {
	StringBuffer buf = new StringBuffer();

	if ( this.noAtual != null ){
	    buf.append(noAtual.toString() + "\n").append(noProximo.toString());
        }// fim do if ( this.noAtual != null )
	
	return new String(buf);
    }
  
    /**
     * Metodo para testar a classe
     */ 
    public static void main(String a[]) {
    	Gol g1,g2;
        ConjuntoGols conj;
    	
        g1 = new Gol(new Jogador("Renato",9,500,Jogador.ATACANTE),67);
        g2 = new Gol(new Jogador("Leonardo",8,7700,Jogador.ZAGUEIRO),87); 
        conj = new ConjuntoGols();

        conj.inserir(g1);
        conj.inserir(g2);

        System.out.println(conj.toString());
   }      
        
}

