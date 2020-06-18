/**
 * Projeto Elifoot
 *
 * Tipo: Elenco
 */
package jogadores;

/**
 * A classe representa uma colecao de jogadores, incluindo colecoes de goleiros,
 * zagueiros, meiocampistas, atacantes e titulares.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public class Elenco extends CadastroJogadores {

    // goleiro titular
    private Jogador goleiroTitular;
    // conjunto de goleiros reservas
    private RepositorioJogadores goleirosReservas;

    // conjunto de zagueiros titulares
    private RepositorioJogadores zagueirosTitulares;
    // conjunto de zagueiros reservas
    private RepositorioJogadores zagueirosReservas;

    // conjunto de meias titulares
    private RepositorioJogadores meiasTitulares;
    // conjunto de meias reservas
    private RepositorioJogadores meiasReservas;

    // conjunto de atacantes titulares
    private RepositorioJogadores atacantesTitulares;
    // conjunto de atacantes reservas
    private RepositorioJogadores atacantesReservas;

    /**
     * construtor da classe Elenco
     *
     */
    public Elenco() {
        goleiroTitular = new Jogador();
        goleirosReservas = new ListaJogadores();
        zagueirosTitulares = new ListaJogadores();
        zagueirosReservas = new ListaJogadores();
        meiasTitulares = new ListaJogadores();
        meiasReservas = new ListaJogadores();
        atacantesTitulares = new ListaJogadores();
        atacantesReservas = new ListaJogadores();
    }

    /**
     * retorna um jogador titular qualquer do elenco de uma determinada posicao
     * (zagueiro, atacante, ...)
     *
     * @param posicao posicao do jogador
     *
     * @return um Jogador do elenco
     */
    public Jogador getJogador(int posicao) {
        Jogador jogador = new Jogador();

        switch (posicao) {
            case Jogador.GOLEIRO:
                jogador = goleiroTitular;
                break;
            case Jogador.ZAGUEIRO:
                jogador = zagueirosTitulares.getJogador();
                break;
            case Jogador.MEIOCAMPO:
                jogador = meiasTitulares.getJogador();
                break;
            case Jogador.ATACANTE:
                jogador = atacantesTitulares.getJogador();
                break;
            default:
                throw new NullPointerException("POSICAO ERRADA");
        }
        return jogador;
    }

    /**
     * retorna um jogador reserva qualquer do elenco de uma determinada posicao
     * (zagueiro, atacante, ...)
     *
     * @param posicao posicao do jogador
     *
     * @return um Jogador do elenco
     */
    public Jogador getJogadorReserva(int posicao) {
        Jogador jogador = new Jogador();

        switch (posicao) {
            case Jogador.GOLEIRO:
                jogador = goleirosReservas.getJogador();
                break;
            case Jogador.ZAGUEIRO:
                jogador = zagueirosReservas.getJogador();
                break;
            case Jogador.MEIOCAMPO:
                jogador = meiasReservas.getJogador();
                break;
            case Jogador.ATACANTE:
                jogador = atacantesReservas.getJogador();
                break;
            default:
                throw new NullPointerException("POSICAO ERRADA");
        }
        return jogador;
    }

    /**
     * retorna o melhor goleiro do elenco
     *
     * @return o melhor goleiro do elenco no momento
     */
    public Jogador getGoleiro() {
        int forcaMaxima = 0;
        int c = 1;
        Jogador jogadorForcaMaxima = new Jogador();

        if (getGoleiros().numeroElementos() > 0) {
            jogadorForcaMaxima = getGoleiros().getJogador(0);
            forcaMaxima = jogadorForcaMaxima.getForca();

            while (c < getGoleiros().numeroElementos()) {

                if (forcaMaxima < getGoleiros().getJogador(c).getForca()) {
                    jogadorForcaMaxima = getGoleiros().getJogador(c);
                    forcaMaxima = jogadorForcaMaxima.getForca();

                }// fim do if (forcaMaxima < goleiros.getJogador(c).getForca())

                c = c + 1;

            }// fim do while (c < goleiros.numeroElementos())

        }// fim do if (goleiros.numeroElementos() > 0)
        else {
            throw new NullPointerException("Nao ha goleiros no conjunto"); // se j nao for goleiro

        }// fim do else

        return jogadorForcaMaxima;

    }

    /**
     * retorna o melhores n zagueiros do elenco no momento
     *
     * @param numeroZaguerios o numero n de zagueiros desejados
     *
     * @return o conjunto dos n melhores zagueiros do elenco
     */
    public RepositorioJogadores getZagueiros(int numeroZagueiros) {

        ListaJogadores zagueiros = new ListaJogadores();

        if (getZagueiros().numeroElementos() >= numeroZagueiros
                && numeroZagueiros > 0) {

            for (int c = 0; c < numeroZagueiros; c = c + 1) {
                zagueiros.inserir(getZagueiros().getJogador(c));

            }// fim do for

        }// fim do if
        else {
            throw new NullPointerException("Numero excessivo de zagueiros");

        }// fim do else

        return zagueiros;
    }

    /**
     * retorna o melhores n meias do elenco no momento
     *
     * @param numeroMeias o numero n de meias desejados
     *
     * @return o conjunto dos n melhores meias do elenco
     */
    public RepositorioJogadores getMeias(int numeroMeias) {

        ListaJogadores meia = new ListaJogadores();

        if (getMeioCampistas().numeroElementos() >= numeroMeias
                && numeroMeias > 0) {

            for (int c = 0; c < numeroMeias; c = c + 1) {
                meia.inserir(getMeioCampistas().getJogador(c));

            } // fim do for

        } // fim do if( meioCampo.numeroElementos() >=  numeroMeias
        //   && numeroMeias > 0 )
        else {
            throw new NullPointerException("Numero excessivos de meias");

        } // fim do else

        return meia;

    }

    /**
     * retorna o melhores n atacantes do elenco no momento
     *
     * @param numeroAtacantes o numero n de atacantes desejados
     *
     * @return o conjunto dos n melhores atacantes do elenco
     */
    public RepositorioJogadores getAtacantes(int numeroAtacantes) {

        ListaJogadores atacantes = new ListaJogadores();

        if (getAtacantes().numeroElementos() >= numeroAtacantes
                && numeroAtacantes > 0) {

            for (int c = 0; c < numeroAtacantes; c = c + 1) {
                atacantes.inserir(getAtacantes().getJogador(c));
            } // fim do for

        } // fim do if( meioCampo.numeroElementos() >=  numeroAtacantes
        // && numeroAtacantes > 0 )
        else {
            throw new NullPointerException("Numero excessivo de atacantes");

        } // fim do else

        return atacantes;

    }

    /**
     * Gera os goleiros reservas do elenco no momento
     *
     * @return o conjunto dos goleiros reservas do elenco
     */
    public RepositorioJogadores getGoleirosReservas() {

        ListaJogadores goleirosReservas = new ListaJogadores();

        if (getGoleiros().numeroElementos() > 0) {

            for (int c = 1; c < getGoleiros().numeroElementos(); c = c + 1) {
                goleirosReservas.inserir(getGoleiros().getJogador(c));

            }// fim do for

        }// fim do if
        else {
            throw new NullPointerException("Nao ha zagueiros reservas");

        }// fim do else

        return goleirosReservas;
    }

    /**
     * Gera os zagueiros reservas do elenco no momento
     *
     * @return o conjunto dos zagueiros reservas do elenco
     */
    public RepositorioJogadores getZagueirosReservas(int numeroZagueiros) {

        ListaJogadores zagueirosReservas = new ListaJogadores();

        if (getZagueiros().numeroElementos() > 0) {

            for (int c = numeroZagueiros; c < getZagueiros().numeroElementos(); c = c + 1) {
                zagueirosReservas.inserir(getZagueiros().getJogador(c));

            }// fim do for

        }// fim do if
        else {
            throw new NullPointerException("Nao ha zagueiros reservas");

        }// fim do else

        return zagueirosReservas;
    }

    /**
     * Gera os meiocampistas reservas do elenco no momento
     *
     * @return o conjunto dos meiocampistas reservas do elenco
     */
    public RepositorioJogadores getMeiasReservas(int numeroMeias) {

        ListaJogadores meiasReservas = new ListaJogadores();

        if (getMeioCampistas().numeroElementos() > 0) {

            for (int c = numeroMeias; c < getMeioCampistas().numeroElementos(); c = c + 1) {
                meiasReservas.inserir(getMeioCampistas().getJogador(c));

            }// fim do for

        }// fim do if
        else {
            throw new NullPointerException("Nao ha meioCampistas reservas");

        }// fim do else

        return meiasReservas;
    }

    /**
     * Gera os atacantes reservas do elenco no momento
     *
     * @return o conjunto dos atacantes reservas do elenco
     */
    public RepositorioJogadores getAtacantesReservas(int numeroAtacantes) {

        ListaJogadores atacantesReservas = new ListaJogadores();

        if (getAtacantes().numeroElementos() > 0) {

            for (int c = numeroAtacantes; c < getAtacantes().numeroElementos(); c = c + 1) {
                atacantesReservas.inserir(getAtacantes().getJogador(c));

            }// fim do for

        }// fim do if
        else {
            throw new NullPointerException("Nao ha atacantes reservas");

        }// fim do else

        return atacantesReservas;
    }

    /**
     * retorna o goleiro titular do elenco no momento
     *
     * @return O atributo goleiroTitular
     */
    public Jogador getGoleiroTitular() {
        return goleiroTitular;
    }

    /**
     * retorna os zagueiros titulares do elenco no momento
     *
     * @return O atributo zagueirosTitulares
     */
    public RepositorioJogadores getZagueirosTitulares() {
        return zagueirosTitulares;
    }

    /**
     * retorna os meiocampistas titulares do elenco no momento
     *
     * @return O atributo meiasTitulares
     */
    public RepositorioJogadores getMeiasTitulares() {
        return meiasTitulares;
    }

    /**
     * retorna os atacantes titulares do elenco no momento
     *
     * @return O atributo atacantesTitulares
     */
    public RepositorioJogadores getAtacantesTitulares() {
        return atacantesTitulares;
    }

    /**
     * retorna os zagueiros reservas do elenco no momento
     *
     * @return O atributo zagueirosReservas
     */
    public RepositorioJogadores getZagueirosReservas() {
        return zagueirosReservas;
    }

    /**
     * retorna os meiocampistas reservas do elenco no momento
     *
     * @return O atributo meiasReservas
     */
    public RepositorioJogadores getMeiasReservas() {
        return meiasReservas;
    }

    /**
     * retorna os atacantes reservas do elenco no momento
     *
     * @return O atributo atacantesReservas
     */
    public RepositorioJogadores getAtacantesReservas() {
        return atacantesReservas;
    }

    /**
     * seta os conjuntos de jogadores titulares e consequentemente tambem de
     * reservas
     *
     * @param numZagueiros o numero de zagueiros no time titular
     * @param numMeias o numero de meias no time titular
     * @param numAtacantes o numero de atacantes no time titular
     *
     */
    public void setTitulares(int numZagueiros, int numMeias, int numAtacantes) {

        goleiroTitular = getGoleiro();
        zagueirosTitulares = getZagueiros(numZagueiros);
        meiasTitulares = getMeias(numMeias);
        atacantesTitulares = getAtacantes(numAtacantes);
        goleirosReservas = getGoleirosReservas();
        zagueirosReservas = getZagueirosReservas(numZagueiros + 1);
        meiasReservas = getMeiasReservas(numMeias + 1);
        atacantesReservas = getAtacantesReservas(numAtacantes + 1);
    }

    /**
     * retorna a forca (media) ofensiva do elenco
     *
     * @return um inteiro que representa a forca ofensiva de um elenco
     *
     */
    public int getForcaOfensiva() {
        int mediaMeias = 0;
        int mediaAtacantes = 0;
        int contador = 0;
        int acumulador = 0;
        int i = 0;

        contador = meiasTitulares.numeroElementos();

        while (i < contador) {
            acumulador = acumulador + meiasTitulares.getJogador(i).getForca();
            i = i + 1;

        }// fim do while

        mediaMeias = acumulador / contador;
        acumulador = 0;
        i = 0;
        contador = atacantesTitulares.numeroElementos();

        while (i < contador) {
            acumulador = acumulador + atacantesTitulares.getJogador(i).getForca();
            i = i + 1;

        }// fim do while

        mediaAtacantes = acumulador / contador;

        return ((mediaAtacantes + atacantesTitulares.numeroElementos())
                + (mediaMeias + meiasTitulares.numeroElementos())) / 2;

    }

    /**
     * retorna a forca (media) defensiva do elenco
     *
     * @return um inteiro que representa a forca defensiva do elenco
     *
     */
    public int getForcaDefensiva() {
        int mediaGoleiro = 0;
        int mediaZagueiros = 0;
        int mediaMeias = 0;
        int contador = 0;
        int acumulador = 0;
        int i = 0;

        // So 1 goleiro
        contador = 1;

        while (i < contador) {
            acumulador = acumulador + goleiroTitular.getForca();
            i = i + 1;

        }// fim do while

        mediaGoleiro = acumulador / contador;
        acumulador = 0;
        i = 0;
        contador = zagueirosTitulares.numeroElementos();

        while (i < contador) {
            acumulador = acumulador + zagueirosTitulares.getJogador(i).getForca();
            i = i + 1;

        }// fim do while

        mediaZagueiros = acumulador / contador;
        acumulador = 0;
        i = 0;
        contador = meiasTitulares.numeroElementos();

        while (i < contador) {
            acumulador = acumulador + meiasTitulares.getJogador(i).getForca();
            i = i + 1;

        }// fim do while

        mediaMeias = acumulador / contador;

        return (mediaGoleiro + (mediaZagueiros + zagueirosTitulares.numeroElementos())
                + (mediaMeias + meiasTitulares.numeroElementos())) / 3;
    }

    /**
     * Retorna a um inteiro representando a agressividade media dos zagueiros
     * titulares
     *
     * @return um inteiro representando a agressividade media dos zagueiros
     * titulares
     */
    public int getMediaAgressaoZagueirosTitulares() {
        int soma = 0;
        int numeroZagueirosTitulares = getZagueirosTitulares().numeroElementos();

        if (numeroZagueirosTitulares > 0) {

            for (int i = 0; i < numeroZagueirosTitulares; i++) {
                soma = soma + getZagueirosTitulares().getJogador(i).getAgressividade();
            }
        }
        return (int) (soma / numeroZagueirosTitulares);
    }

    /**
     * Retorna a um inteiro representando a agressividade media dos Meias
     * titulares
     *
     * @return um inteiro representando a agressividade media dos Meias
     * titulares
     */
    public int getMediaAgressaoMeiasTitulares() {
        int soma = 0;
        int numeroMeiasTitulares = getMeiasTitulares().numeroElementos();

        if (numeroMeiasTitulares > 0) {

            for (int i = 0; i < numeroMeiasTitulares; i++) {
                soma = soma + getMeiasTitulares().getJogador(i).getAgressividade();
            }
        }

        return (int) (soma / numeroMeiasTitulares);
    }

    /**
     * Retorna a um inteiro representando a agressividade media dos Atacantes
     * titulares
     *
     * @return um inteiro representando a agressividade media dos Atacantes
     * titulares
     */
    public int getMediaAgressaoAtacantesTitulares() {
        int soma = 0;
        int numeroAtacantesTitulares = getAtacantesTitulares().numeroElementos();

        if (numeroAtacantesTitulares > 0) {

            for (int i = 0; i < numeroAtacantesTitulares; i++) {
                soma = soma + getAtacantesTitulares().getJogador(i).getAgressividade();
            }
        }

        return (int) (soma / numeroAtacantesTitulares);
    }

    /**
     * Gera um string com informa�oes sobre o elenco
     *
     * @return Uma string com informacoes sobre o elenco
     * @see partidas.ConjuntoJogadores
     */
    public String toString() {

        StringBuffer buf;
        int i;

        buf = new StringBuffer();
        i = 0;

        buf.append("\nGOLEIROS : \n");

        while (i < getGoleiros().numeroElementos()) {
            buf.append(getGoleiros().getJogador(i).toString() + "\n");
            i = i + 1;

        }// fim do while (i < goleiros.numeroElementos())

        i = 0;
        buf.append("\nZAGUEIROS : \n");

        while (i < getZagueiros().numeroElementos()) {
            buf.append(getZagueiros().getJogador(i).toString() + "\n");
            i = i + 1;

        }// fim do while (i < zagueiros.numeroElementos())

        i = 0;
        buf.append("\nMEIAS : \n");

        while (i < getMeioCampistas().numeroElementos()) {
            buf.append(getMeioCampistas().getJogador(i).toString() + "\n");
            i = i + 1;

        }// fim do while (i < meioCampo.numeroElementos())

        i = 0;
        buf.append("\nATACANTES : \n");

        while (i < getAtacantes().numeroElementos()) {
            buf.append(getAtacantes().getJogador(i).toString() + "\n");
            i = i + 1;

        }// fim do while (i < atacante.numeroElementos())

        return new String(buf);
    }

//    /**
//     * Metodo para testar a classe
//     *
//     */
//    public static void main(String a[]) {
//
//        Elenco elenco;
//        elenco = new Elenco();
//
//        Jogador jogador1;
//        Jogador jogador2;
//        Jogador jogador3;
//        Jogador jogador4;
//        Jogador jogador5;
//        Jogador jogador6;
//        Jogador jogador7;
//        Jogador jogador8;
//        Jogador jogador9;
//        Jogador jogador10;
//        Jogador jogador11;
//        Jogador jogador12;
//        Jogador jogador13;
//        Jogador jogador14;
//        Jogador jogador15;
//        Jogador jogador16;
//        Jogador jogador17;
//        Jogador jogador18;
//        Jogador jogador19;
//        Jogador jogador20;
//        Jogador jogador21;
//        Jogador jogador22;
//
//        jogador1 = new Jogador("Rogerio", 9, 1000, Jogador.GOLEIRO);
//        jogador2 = new Jogador("Paulao", 8, 500, Jogador.ZAGUEIRO);
//        jogador3 = new Jogador("Bordon", 7, 500, Jogador.ZAGUEIRO);
//        jogador4 = new Jogador("Anderson", 7, 500, Jogador.ZAGUEIRO);
//        jogador5 = new Jogador("Cafu", 8, 500, Jogador.ZAGUEIRO);
//        jogador6 = new Jogador("Belleti", 9, 500, Jogador.MEIOCAMPO);
//        jogador7 = new Jogador("Rai", 8, 500, Jogador.MEIOCAMPO);
//        jogador8 = new Jogador("Fabiano", 7, 1000, Jogador.MEIOCAMPO);
//        jogador9 = new Jogador("Souza", 9, 1000, Jogador.MEIOCAMPO);
//        jogador10 = new Jogador("Evair", 10, 1000, Jogador.ATACANTE);
//        jogador11 = new Jogador("Franca", 9, 1000, Jogador.ATACANTE);
//        jogador12 = new Jogador("Clemer", 6, 1000, Jogador.GOLEIRO);
//        jogador13 = new Jogador("Fabio Baiano", 7, 500, Jogador.ZAGUEIRO);
//        jogador14 = new Jogador("Luis Alberto", 7, 500, Jogador.ZAGUEIRO);
//        jogador15 = new Jogador("Juan", 5, 500, Jogador.ZAGUEIRO);
//        jogador16 = new Jogador("Athirson", 5, 500, Jogador.ZAGUEIRO);
//        jogador17 = new Jogador("Rocha", 7, 500, Jogador.MEIOCAMPO);
//        jogador18 = new Jogador("Iranildo", 7, 500, Jogador.MEIOCAMPO);
//        jogador19 = new Jogador("Petkovic", 7, 1000, Jogador.MEIOCAMPO);
//        jogador20 = new Jogador("Le", 6, 1000, Jogador.ATACANTE);
//        jogador21 = new Jogador("Tuta", 6, 1000, Jogador.ATACANTE);
//        jogador22 = new Jogador("Reinaldo", 7, 1000, Jogador.ATACANTE);
//
//        elenco.inserir(jogador1);
//        elenco.inserir(jogador2);
//        elenco.inserir(jogador3);
//        elenco.inserir(jogador4);
//        elenco.inserir(jogador5);
//        elenco.inserir(jogador6);
//        elenco.inserir(jogador7);
//        elenco.inserir(jogador8);
//        elenco.inserir(jogador9);
//        elenco.inserir(jogador10);
//        elenco.inserir(jogador11);
//        elenco.inserir(jogador12);
//        elenco.inserir(jogador13);
//        elenco.inserir(jogador14);
//        elenco.inserir(jogador15);
//        elenco.inserir(jogador16);
//        elenco.inserir(jogador17);
//        elenco.inserir(jogador18);
//        elenco.inserir(jogador19);
//        elenco.inserir(jogador20);
//        elenco.inserir(jogador21);
//        elenco.inserir(jogador22);
//
//        System.out.println(elenco.toString());
//
//        elenco.remover(jogador10);
//        elenco.remover(jogador11);
//        elenco.remover(jogador12);
//        elenco.remover(jogador13);
//        elenco.remover(jogador14);
//        elenco.remover(jogador15);
//        elenco.remover(jogador16);
//        elenco.remover(jogador17);
//        elenco.remover(jogador18);
//        elenco.remover(jogador19);
//        elenco.remover(jogador20);
//        elenco.remover(jogador21);
//        elenco.remover(jogador22);
//
//    }
}
