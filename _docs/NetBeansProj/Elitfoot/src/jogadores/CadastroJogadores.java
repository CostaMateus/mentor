/**
 * Projeto Elifoot
 *
 * Tipo: CadastroJogadores
 */
package jogadores;

/**
 * A classe representa um cadastro de jogadores
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public class CadastroJogadores {

    // conjunto de goleiros
    private RepositorioJogadores goleiros;

    // conjunto de zagueiros
    private RepositorioJogadores zagueiros;

    // conjunto de meiocampistas
    private RepositorioJogadores meioCampistas;

    // conjunto de atacantes
    private RepositorioJogadores atacantes;

    /**
     * Construtor da classe CadastroJogadores
     *
     */
    public CadastroJogadores() {
        this.goleiros = null;
        this.zagueiros = null;
        this.meioCampistas = null;
        this.atacantes = null;

    }

    /**
     * Construtor da classe CadastroJogadores que recebe as colecoes de
     * goleiros, zagueiros, meioCampistas e atacantes.
     *
     * @param goleiros repositorio de goleiros
     * @param zagueiros repositorio de zagueiros
     * @param meioCampistas repositorio de meioCampistas
     * @param atacantes repositorio de atacantes
     */
    public CadastroJogadores(RepositorioJogadores goleiros, RepositorioJogadores zagueiros,
            RepositorioJogadores meioCampistas, RepositorioJogadores atacantes) {
        this.goleiros = goleiros;
        this.zagueiros = zagueiros;
        this.meioCampistas = meioCampistas;
        this.atacantes = atacantes;

    }

    /**
     * insere um jogador no cadastro de jogadores
     *
     * @param j um Jogador a ser inserido no cadastro
     *
     */
    public void inserir(Jogador j) {

        if (j == null) {
            throw new NullPointerException("J nao e uma instancia no metodo inserir do CadastroJogadores ");

        }// fim do if (j == null)

        switch (j.getPosicao()) {

            case Jogador.GOLEIRO:
                if (goleiros == null) {
                    this.goleiros = new ListaJogadores();
                }
                goleiros.inserir(j);
                break;
            case Jogador.ZAGUEIRO:
                if (zagueiros == null) {
                    this.zagueiros = new ListaJogadores();
                }
                zagueiros.inserir(j);
                break;
            case Jogador.MEIOCAMPO:
                if (meioCampistas == null) {
                    this.meioCampistas = new ListaJogadores();
                }
                meioCampistas.inserir(j);
                break;
            case Jogador.ATACANTE:
                if (atacantes == null) {
                    this.atacantes = new ListaJogadores();
                }
                atacantes.inserir(j);
                break;
        }
    }

    /**
     * remove um jogador do cadastro de jogadores
     *
     * @param j um Jogador a ser removido do cadastro
     *
     */
    public void remover(Jogador j) {

        switch (j.getPosicao()) {

            case Jogador.GOLEIRO:
                goleiros.remover(j);
                break;
            case Jogador.ZAGUEIRO:
                zagueiros.remover(j);
                break;
            case Jogador.MEIOCAMPO:
                meioCampistas.remover(j);
                break;
            case Jogador.ATACANTE:
                atacantes.remover(j);
                break;
        }
    }

    /**
     * retorna um jogador qualquer do cadastro de uma determinada posicao
     * (zagueiro, atacante, ...)
     *
     * @param posicao posicao do jogador
     *
     * @return um Jogador do cadastro
     */
    public Jogador getJogadorElenco(int posicao) {
        Jogador jogador; //= new Jogador();

        switch (posicao) {

            case Jogador.GOLEIRO:
                jogador = goleiros.getJogador();
                break;
            case Jogador.ZAGUEIRO:
                jogador = zagueiros.getJogador();
                break;
            case Jogador.MEIOCAMPO:
                jogador = meioCampistas.getJogador();
                break;
            case Jogador.ATACANTE:
                jogador = atacantes.getJogador();
                break;
            default:
                throw new NullPointerException("POSICAO ERRADA");
        }
        return jogador;
    }

    /**
     * Retorna os goleiros do cadastro no momento
     *
     *
     * @return o conjunto dos goleiros do cadastro
     */
    public RepositorioJogadores getGoleiros() {

        if (goleiros != null) {

            if (goleiros.numeroElementos() > 0) {
                return goleiros;

            }// fim do if (goleiros.numeroElementos() > 0)
            else {
                throw new NullPointerException("NAO HA GOLEIROS");

            }// fim do else

        }// fim do if (goleiros != null)
        else {
            throw new NullPointerException("NENHUM GOLEIRO FOI PASSADO");

        }// fim do else
    }

    /**
     * Retorna os zagueiros do elenco no momento
     *
     *
     * @return o conjunto dos zagueiros do cadastro
     */
    public RepositorioJogadores getZagueiros() {

        if (zagueiros != null) {

            if (zagueiros.numeroElementos() > 0) {
                return zagueiros;

            }// fim do if (zagueiros.numeroElementos() > 0)
            else {
                throw new NullPointerException("NAO HA ZAGUEIROS");

            }// fim do else

        }// fim do if (zagueiros != null)
        else {
            throw new NullPointerException("NENHUM ZAGUEIRO FOI PASSADO");

        }// fim do else
    }

    /**
     * Retorna os meio-campistas do elenco no momento
     *
     *
     * @return o conjunto dos meio-campistas do elenco
     */
    public RepositorioJogadores getMeioCampistas() {

        if (meioCampistas != null) {

            if (meioCampistas.numeroElementos() > 0) {
                return meioCampistas;

            }// fim do if (meioCampistas.numeroElementos() > 0)
            else {
                throw new NullPointerException("NAO HA MEIAS");

            }// fim do else

        }// fim do if (meioCampistas != null)
        else {
            throw new NullPointerException("NENHUM MEIA FOI PASSADO");

        }// fim do else
    }

    /**
     * retorna os atacantes do cadastro no momento
     *
     *
     * @return o conjunto atacantes do cadastro
     */
    public RepositorioJogadores getAtacantes() {

        if (atacantes != null) {

            if (atacantes.numeroElementos() > 0) {
                return atacantes;

            }// fim do if (atacantes.numeroElementos() > 0)
            else {
                throw new NullPointerException("NAO HA ATACANTES");

            }// fim do else

        }// fim do if (atacantes != null)
        else {
            throw new NullPointerException("NENHUM ATACANTE FOI PASSADO");

        }// fim do else
    }

    public boolean pertence(Jogador jogador) {

        boolean resultado = false;
        switch (jogador.getPosicao()) {

            case Jogador.GOLEIRO:
                if (goleiros != null) {
                    resultado = goleiros.pertence(jogador);
                }
                break;
            case Jogador.ZAGUEIRO:
                if (zagueiros != null) {
                    resultado = zagueiros.pertence(jogador);
                }
                break;
            case Jogador.MEIOCAMPO:
                if (meioCampistas != null) {
                    resultado = meioCampistas.pertence(jogador);
                }
                break;
            case Jogador.ATACANTE:
                if (atacantes != null) {
                    resultado = atacantes.pertence(jogador);
                }
                break;

            default:
                throw new NullPointerException("POSICAO ERRADA");
        }
        return resultado;

    }

    /**
     * Retorna o numero de jogadores do cadastro
     *
     * @return Um inteiro que informa o numero de jogadores do cadastro
     */
    public int numeroElementos() {
        return (goleiros.numeroElementos() + zagueiros.numeroElementos()
                + meioCampistas.numeroElementos() + atacantes.numeroElementos());

    }

}
