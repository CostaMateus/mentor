/*
 * Projeto Elifoot
 *
 * Tipo: ListaJogadores
 */
package jogadores;

/**
 * ListaJogadores representa uma colecao de jogadores implementada atraves de
 * lista encadeada. A lista encadeada � ordenada de acordo com a forca de cada
 * jogador
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public class ListaJogadores implements RepositorioJogadores {

    // numero de jogadores no conjunto
    private int numeroElementos;

    // jogador chave do no
    private Jogador noAtual;

    // proximo no na lista encadeada
    private ListaJogadores noProximo;

    /**
     * Construtor default da classe ConjuntoJogadores
     *
     */
    public ListaJogadores() {
        this.numeroElementos = 0;
        this.noAtual = null;
        this.noProximo = null;
    }

    /**
     * Construtor da classe ConjuntoJogadores
     *
     * @param jogador o jogador chave do no
     * @param numeroElementos o numero de elementos do conjunto
     * @param noProximo o proximo no da lista encadeada
     *
     */
    public ListaJogadores(Jogador jogador, int numeroElementos, ListaJogadores noProximo) {
        this.numeroElementos = numeroElementos;
        this.noAtual = jogador;
        this.noProximo = noProximo;
    }

    /**
     * Insere, se for possivel , um jogador na lista de atletas
     *
     * @param jogador Um jogador a ser inserido.
     *
     */
    public void inserir(Jogador jogador) {

        if (jogador != null) {
            this.numeroElementos = inserir(jogador, null);

        }// fim do if( jogador != null)
        else {
            throw new NullPointerException("Jogador igual null");

        }// fim do else
    }

    /**
     * Insere um jogador na lista de atletas
     *
     * @param jogador Um jogador a ser inserido.
     * @param anterior O no anterior
     *
     * @return O numero de elementos do Conjunto
     */
    public int inserir(Jogador jogador, ListaJogadores anterior) {
        int numero;

        if (this.noAtual == null && anterior == null) {
            this.noAtual = jogador;
            this.numeroElementos = this.numeroElementos + 1;
            noProximo = new ListaJogadores();

        }// fim do if (this.noAtual == null  && anterior == null)
        else if (this.noAtual == null && anterior != null) {
            this.noAtual = jogador;
            this.numeroElementos = this.numeroElementos + 1;
            this.noProximo = new ListaJogadores();

        }// fim do else if(this.noAtual == null && anterior != null)
        else if (this.noAtual != null && anterior == null) {

            if (jogador.getForca() >= noAtual.getForca()) {
                ListaJogadores temp = new ListaJogadores();
                temp.set(this);
                ListaJogadores novoNo = new ListaJogadores(jogador, this.numeroElementos + 1,
                        temp);
                this.set(novoNo);

            }// fim if(jogador.getForca() >= noAtual.getForca())
            else {
                this.numeroElementos = noProximo.inserir(jogador, this) + 1;

            }// fim else

        }// fim do if(this.noAtual != null && anterior == null)
        else if (jogador.getForca() >= noAtual.getForca()) {
            ListaJogadores temp = new ListaJogadores();
            temp.set(this);
            ListaJogadores novoNo = new ListaJogadores(jogador, this.numeroElementos + 1,
                    temp);
            this.set(novoNo);

        }// fim if( jogador.getForca() >= noAtual.getForca() )
        else {
            this.numeroElementos = noProximo.inserir(jogador, this) + 1;

        }// fim do else// fim do else

        return this.numeroElementos;
    }

    /**
     * Metodo auxiliar que serve para orientar os ponteiros do novo inserido na
     * lista en cadeada
     *
     * @param novoNo o novo no inserido na lista
     *
     */
    private void set(ListaJogadores novoNo) {
        this.noAtual = novoNo.noAtual;
        this.noProximo = novoNo.noProximo;
        this.numeroElementos = novoNo.numeroElementos;
    }

    /**
     * Metodo auxiliar que serve para orientar os ponteiros do no anterior ao
     * novo no inserido na lista
     *
     * @param novoNo o novo no inserido na lista
     *
     */
    private void setnoProximo(ListaJogadores novoNo) {
        this.noProximo = novoNo;
    }

    /**
     * Chama a fun��o remover auxiliar que exclui um jogador e depois decrementa
     * o numero de jogadores do conjunto
     *
     * @param jogador Um jogador a ser removido.
     *
     */
    public void remover(Jogador jogador) {
        removerAuxiliar(jogador);
        setNumeroElementos();
    }

    /**
     * Exclui, se for possivel, um jogador na lista de atletas
     *
     * @param jogador Um jogador a ser removido.
     *
     */
    private void removerAuxiliar(Jogador jogador) {

        if (jogador != null) {

            if (noAtual != null) {

                if (this.noAtual.equals(jogador)) {
                    this.noAtual = noProximo.noAtual;
                    this.noProximo = noProximo.noProximo;

                }// fim do if(this.noAtual.equals(jogador))
                else {
                    noProximo.removerAuxiliar(jogador);

                }// fim do else

            }// fim do if (noAtual == null)
            else {       //throw new JogadorInexistenteException();
                throw new NullPointerException("Jogador inexistente");

            }// fim do else

        }// fim do if (jogador != null)
        else {
            throw new NullPointerException("Nao foi passado nenhum jogador");

        }// fim do else

    }

    /**
     * Atualiza o numero de elementos da lista encadeada de jogadores
     *
     */
    public void setNumeroElementos() {

        if (noAtual == null) {
            this.numeroElementos = 0;

        }// fim do if (noAtual == null)
        else {
            noProximo.setNumeroElementos();
            this.numeroElementos = noProximo.numeroElementos + 1;

        }// fim do else

    }

    /**
     * Verifica se um jogador pertence ao conjunto de jogadores
     *
     * @param jogador Um jogador a ser removido.
     *
     * @return retorna true se um jogador pertence ao conjunto e false caso
     * contrario
     *
     */
    public boolean pertence(Jogador jogador) {
        boolean resultado = false;

        if (jogador != null) {

            if (noAtual != null) {

                if (this.noAtual.equals(jogador)) {
                    resultado = true;

                }// fim do if(this.noAtual.equals(jogador))
                else {
                    resultado = noProximo.pertence(jogador);

                }// fim do else

            }// fim do if (noAtual != null)

        }// fim do if( jogador!= null)
        else {
            throw new NullPointerException();

        }// fim do else

        return resultado;
    }

    /**
     * Escolhe um jogador aleatorio do Clube
     *
     * @return um jogador do conjunto
     */
    public Jogador getJogador() {
        int i = 0;
        Jogador jogador;

        if (numeroElementos != 0) {
            i = ((int) (Math.random() * 100)) % numeroElementos;
            jogador = this.getJogador(i);
        } else {
            throw new NullPointerException("Nao h� jogadores no conjunto");
        }

        return jogador;
    }

    /**
     * Escolhe o i-esimo jogador do conjunto de jogadores
     *
     * @param i A posicao do jogador dentro da lista encadeada de jogadores
     *
     * @return um jogador do conjunto
     */
    public Jogador getJogador(int i) {

        Jogador jogador;

        if (i < numeroElementos) {

            if (i == 0) {
                jogador = noAtual;

            }// fim do if (i == 0)
            else {
                jogador = noProximo.getJogador(i - 1);

            }// fim do else

        }// fim do if(i < numeroElementos)
        else {
            throw new NullPointerException("Nao ha tantos jogadores");

        }// fim do else

        return jogador;
    }

    /**
     * Retorna o numero de jogadores do conjunto
     *
     */
    public int numeroElementos() {
        return this.numeroElementos;
    }

    /**
     * Retorna uma String que representa o conteudo do objeto
     *
     */
    public String toString() {
        StringBuffer buf = new StringBuffer();

        if (this.noAtual != null) {
            buf.append(noAtual.toString()).append(noProximo.toString());

        }// fim do if (this.noAtual != null)

        return new String(buf);

    }

//    /**
//     * M�todo para testar a classe
//     *
//     * @param args
//     */
//    public static void main(String args[]) {
//
//        ListaJogadores conj = new ListaJogadores();
//        int[] x = {2, 6, 4};
//
//        for (int i = 0; i < 10; i++) {
//            int sal = (int) (Math.random() * 1000);
//            int forca = ((new Random()).nextInt(10) + 1);
//            int pos = ((new Random()).nextInt(25) + 1);
//            Jogador jog = new Jogador("Adc1", forca, sal, pos);
//
//            int gol = ((new Random()).nextInt(25) + 1);
//            for (int j = 0; j < gol; j++) {
//                jog.setGol();
//            }
//            conj.inserir(jog);
//
//        }// fim do for for (int i = 0; i < 10; i++)
//
//        System.out.println(conj.toString());
//        System.out.println(conj.numeroElementos() + "\n");
//        
//        Jogador j = conj.getJogador();
//        
//        conj.remover(j);
//        System.out.println(conj.toString());
//        System.out.println(conj.numeroElementos());
//
//        j = conj.getJogador(6);
//        conj.remover(j);
//        System.out.println(conj.toString());
//        System.out.println(conj.numeroElementos());
//
//        j = conj.getJogador(0);
//        conj.remover(j);
//        System.out.println(conj.toString());
//        System.out.println(conj.numeroElementos());
//
//    }
}
