/*
 * Projeto Elifoot
 *
 * Tipo: ListaTorneio
 */

package torneio;

import partidas.Rodada;
import torneio.campeonato.Campeonato;

/**
 * ListaTorneios representa uma colecao de torneios
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see torneio
 */
public class ListaTorneio implements RepositorioTorneios {


    // numero de jogadores no conjunto
    private int numeroElementos;

    // jogador chave do no
    private Torneio noAtual;

    // proximo no na lista encadeada
    private ListaTorneio noProximo;

    /**
     * Construtor default da classe ListaTorneio
     */
    public ListaTorneio() {
        this.numeroElementos = 0;
        this.noAtual = null;
        this.noProximo = null;
    }

    /**
     * Construtor da classe ListaTorneio
     *
     * @param  torneio              o torneio raiz
     * @param  numeroElementos      o numero de elementos do conjunto
     * @param  noProximo            o proximo no da lista encadeada
     *
     */
    public ListaTorneio(Torneio torneio,int numeroElementos,ListaTorneio noProximo) {
        this.numeroElementos = numeroElementos;
        this.noAtual = torneio;
        this.noProximo = noProximo;
    }


    /**
     * Insere um novo arquivo na lista.
     *
     * @param  torneio   Um torneio a ser inserido na lista.
     *
     */
    public void inserir (Torneio torneio) {
        if (this.noAtual == null) {
            this.noAtual = torneio;
            noProximo = new ListaTorneio();
        }// fim do if

        else {
            noProximo.inserir(torneio);
        }
        this.numeroElementos += 1;
    }

    /**
     * Verifica se um dado inteiro é absissa ou ordenada de algum par da lista.
     *
     * @param  torneio    Um torneio a ser removido da lista.
     *
     */
    public void remover(Torneio torneio) {
        if (this.noAtual == null) {
            throw new NullPointerException("Torneio nao pertence a lista de torneios");

        } //fim do if (this.noAtual == null)

        else {
            if (this.noAtual.equals(torneio) ) {
                this.noAtual = noProximo.noAtual;
                this.noProximo = noProximo.noProximo;

            } // fim do if (this.noAtual.equals(torneio) )

            else {
                noProximo.remover(torneio);
            }
        }

        this.numeroElementos = this.numeroElementos - 1;
    }


    /**
     * Verifica se um torneio pertence ao conjunto de torneioes
     *
     * @param  torneio   Um torneio a ser removido.
     *
     * @return           retorna true se um torneio pertence a lista e false caso contrario
     *
     */
    public boolean pertence(Torneio torneio){
        boolean resultado = false;

        if ( torneio!= null) {

            if (noAtual != null) {

                if (this.noAtual.equals(torneio)) {
                    resultado = true;

                }// fim do if(this.noAtual.equals(torneio))

                else {
                    resultado = noProximo.pertence(torneio);
                }

            }// fim do if (noAtual != null)

        }// fim do if( torneio!= null)

        else {
            throw new NullPointerException();
        }

        return resultado;
    }

    /**
     * Escolhe o i-esimo torneio do conjunto de torneios
     *
     * @param  i    A posicao do torneio dentro da lista encadeada de torneios
     *
     * @return      um torneio da lista
     */
    public Torneio getTorneio(int i) {
        Torneio torneio;
        
        if (i < this.numeroElementos && i >= 0) {

            if (i == 0) {
                torneio = noAtual;

            }// fim do if (i == 0)

            else {
                torneio = noProximo.getTorneio(i-1);
            }

        }// fim do if(i < numeroElementos)

        else {
            throw new NullPointerException("Nao ha tantos torneioes");
        }

        return torneio;
    }

    /**
     * Retorna o numero de torneios da lista
     *
     * @return   O numero de elemntos da lista
     */
    public int numeroElementos(){
        return this.numeroElementos;
    }

    /**
     * Retorna uma rodada de um torneio torneios
     *
     * @param   n       a posicao do torneio na lista
     * @param   rodada  a rodada-esima do torneio.
     *
     * @return         A rodada apos executadas as partidas
     */
    public Rodada executarTorneio(int n,int rodada) {
        return this.getTorneio(n).executar(rodada);
    }


    /**
     * Retorna uma String que representa o conteudo do objeto
     *
     * @return    Uma string de todos elementos da lista
     */
    public String toString() {
        StringBuffer buf = new StringBuffer();

        if (this.noAtual != null) {
            buf.append(noAtual.toString()).append(noProximo.toString());

        }// fim do if (this.noAtual != null)

        return new String(buf);

    }

    /**
     * Metodo teste da classe
     */
    public static void main(String args[]) {
        ListaTorneio list = new ListaTorneio();
        Torneio[] teste = new Torneio[10];
        
        for (int i = 0; i < 10 ; i = i+1) {
             teste[i] = new Campeonato();
             list.inserir (teste[i]);
        }
    }

}