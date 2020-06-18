/**
 *  Projeto Elifoot.
 *
 *  Tipo: SequenciaRodadas
 */

package torneio;

import partidas.Partida;
import partidas.Rodada;
import clubes.Clube;

/**
 * SequenciaRodadas representa a sequencia de rodadas do
 * campeonato.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see torneio
 */
public class SequenciaRodadas implements RepositorioRodadas {

    // A cabeca da lista de rodadas
    private Rodada noAtual;

    // O apontador para o proximo da lista (tail)
    private SequenciaRodadas noProximo;

    // Numero de clubes do campeonato
    private int numeroElementos;

    
    /**
     * Construtor default
     *
     */
    public SequenciaRodadas() {
        this.noAtual = null;
        this.noProximo = null;
        this.numeroElementos = 0;
    }

    /**
     * Rotorna todos os jogos da rodada rod
     *
     * @param rodada   Uma rodada a ser inserida na sequencia de rodadas
     */
    public void inserir(Rodada rodada) {
        if ( rodada != null ) {
    	     if (this.noAtual == null) {
    	         this.noAtual = rodada;
    	         this.numeroElementos = this.numeroElementos + 1;
    	         noProximo = new SequenciaRodadas();
             } // fim do if (this.noAtual == null)

      	     else {
    	         noProximo.inserir(rodada);
      	     }

        }// fim if ( rod != null )

        else {
          throw new NullPointerException("Nao foi passada uma rodada" );
        }
    }

    /**
     * Devolve o numero de elementos da sequencia.
     *
     * @return   O numero de elementos da sequencia.
     */
    public int getNumeroElementos() {
        return this.numeroElementos;
    }

    /**
     * Devolve a raiz da sequencia
     *
     * @return   A primeira rodada da sequencia.
     */
    public Rodada getNoAtual() {
        return this.noAtual;
    }

    /**
     * Devolve uma sequencia sem o primeiro elemento.(tail)
     *
     * @return    Uma sequencia sem a raiz da sequencia.
     */
    public SequenciaRodadas getNoProximo() {
        return this.noProximo;
    }

    public static void main(String args[]) {
        SequenciaRodadas teste = new SequenciaRodadas();
        Rodada[] rodada = new Rodada[10];
        Partida[] partida = new Partida[5];
        Clube[] clube = new Clube[10];
        int i,j;

        for ( i = 0; i < 10 ; i++ )
             clube[i] = new Clube();
        for ( i = 0; i < 10 ; i++ )
             partida[i] = new Partida(clube[i],clube[2*i],i);
        for ( i = 0; i < 10 ; i++ ) {
             rodada[i] = new Rodada();
             for ( j = 0; j < 10 ; j++ ) {
                   rodada[i].inserir(partida[i]);
             }//fim do for ( j = 0; j < 10 ; j++ )

        }//fim do for ( i = 0; i < 10 ; i++ )
        
        for ( i = 0; i < 10 ; i++ )
            teste.inserir(rodada[i]);
    }
}

