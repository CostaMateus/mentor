/*
 * Projeto : Elifoot
 *
 * Tipo : Clube
 */
package clubes;

import estadios.Estadio;
import jogadores.Elenco;
import jogadores.Jogador;

/**
 * Clube � um tipo que representa um clube de futebol. Seus atributos sao : Um
 * nome, um estadio , um elenco e um numero que representa a moral do clube
 * naquele momento
 *
 *
 * @author Andre,Carlos,Francisco,Mardoqueu,Renato
 *
 *
 */
public class Clube {

    //A moral maxima do time
    private final int MORALMAXIMA = 10;

    //A moral minima do time
    private final int MORALMINIMA = 1;

    //Nome do Clube
    private String nome;

    //Estadio do Clube
    private Estadio estadio;

    //Elenco de Jogadores do clube
    private Elenco elenco;

    //Moral(motiva�ao) do time , 1-10
    private int moral;

    //Renda atual do clube
    private long renda;

    //Arrecada�ao do clube
    private long arrecadacao;

    //Despesas do clube
    private long despesas;

    /**
     * Construtor da Classe Clube
     */
    public Clube() {
        this.nome = null;
        this.estadio = null;
        this.elenco = null;
        this.moral = MORALMAXIMA / 2;
        this.renda = 0;
        this.arrecadacao = 0;
        this.despesas = 0;
    }

    /**
     * Construtor da Classe Clube
     *
     * @param nome nome do clube
     * @param estadio o estadio do clube
     *
     */
    public Clube(String nome, Estadio estadio) {
        this.nome = nome;
        this.estadio = estadio;
        this.elenco = new Elenco();
        this.moral = MORALMAXIMA / 2;
        this.renda = 0;
        this.arrecadacao = 0;
        this.despesas = 0;
    }

    /**
     * Construtor da Classe Clube
     *
     * @param nome nome do clube
     * @param estadio estadio do clube
     * @param elenco elenco de jogadores do clube
     */
    public Clube(String nome, Estadio estadio, Elenco elenco) {
        this.nome = nome;
        this.estadio = estadio;
        this.elenco = elenco;
        this.moral = MORALMAXIMA / 2;
        this.renda = 0;
        this.arrecadacao = 0;
        this.despesas = 0;
    }

    /**
     * Construtor da Classe Clube
     *
     * @param nome nome do clube
     * @param estadio estadio do clube
     * @param elenco elenco de jogadores do clube
     * @param moral moral(motivacao) do time
     */
    public Clube(String nome, Estadio estadio, Elenco elenco, int moral) {
        this.nome = nome;
        this.estadio = estadio;
        this.elenco = elenco;

        if (moral <= MORALMAXIMA) {
            this.moral = moral;
        }// fim do if (moral<= MORALMAXIMA)
        else {
            this.moral = MORALMAXIMA / 2;
        }
        this.renda = 0;
        this.arrecadacao = 0;
        this.despesas = 0;
    }

    /**
     * Construtor da Classe Clube
     *
     * @param nome nome do clube
     * @param estadio estadio do clube
     * @param elenco elenco de jogadores do clube
     * @param moral moral(motivacao) do time
     * @param renda a renda do clube
     */
    public Clube(String nome, Estadio estadio, Elenco elenco, int moral, long renda) {
        this.nome = nome;
        this.estadio = estadio;
        this.elenco = elenco;
        if (moral <= MORALMAXIMA) {
            this.moral = moral;

        }// fim do if (moral<= MORALMAXIMA)
        else {
            this.moral = MORALMAXIMA / 2;
        }

        this.renda = renda;
        this.arrecadacao = 0;
        this.despesas = 0;
    }

    /**
     * Retorna o nome do Clube
     *
     * @return Uma string contendo o nome do clube
     *
     */
    public String getNome() {
        return this.nome;
    }

    /**
     * Retorna o elenco de jogadores
     *
     * @return O elenco do clube
     *
     */
    public Elenco getElenco() {
        return this.elenco;
    }

    /**
     * Retorna o estadio do clube
     *
     * @return O estadio do Clube
     *
     */
    public Estadio getEstadio() {
        return this.estadio;
    }

    /**
     * Retorna a moral do time
     *
     * @return Um inteiro de 0 a 10 representando moral do time
     *
     */
    public int getMoral() {
        return this.moral;
    }

    /**
     * Aumenta a moral do time
     *
     * Observacao : A moral varia de 0 a 10
     *
     */
    public void aumentarMoral() {

        if (this.moral < MORALMAXIMA) {
            this.moral = this.moral + 1;

        } // fim do if(this.moral <= 9)       
    }

    /**
     * Diminiu a moral do time
     *
     * Observacao : A moral varia de 0 a 10
     *
     */
    public void reduzirMoral() {

        if (this.moral > MORALMINIMA) {
            this.moral = this.moral - 1;

        } // fim do if(this.moral > 1)
    }

    /**
     * Insere um jogador no Clube
     *
     * @param jogador O jogador a ser inserido no elenco do clube
     *
     * @see partidas.Elenco
     * @see partidas.ConjuntoJogadores
     */
    public void inserirJogador(Jogador jogador) {
        this.elenco.inserir(jogador);
    }

    /**
     * Remove o jogador do Clube
     *
     * @param jogador O jogador a ser removido do elenco do clube
     *
     */
    public void removerJogador(Jogador jogador) {
        this.elenco.remover(jogador);
    }

    /**
     * Escolhe um jogador titular do Clube que tenha uma dada posicao
     *
     * @param posicao A posicao do Jogador
     *
     */
    public Jogador getJogador(int posicao) {
        return this.elenco.getJogador(posicao);
    }

    /**
     * Escolhe um jogador reserva do Clube que tenha uma dada posicao
     *
     * @param posicao A posicao do Jogador
     *
     */
    public Jogador getJogadorReserva(int posicao) {
        return this.elenco.getJogadorReserva(posicao);
    }

    /**
     * Escolhe um jogador do Clube que tenha uma dada posicao
     *
     * @param posicao A posicao do Jogador
     *
     */
    public Jogador getJogadorElenco(int posicao) {
        return this.elenco.getJogadorElenco(posicao);
    }

    /**
     * Retorna a forca ofensiva do time;
     *
     * @return Um inteiro que representa a forca ofensiva do time(titular)
     *
     */
    public int getForcaOfensiva() {
        return this.elenco.getForcaOfensiva();
    }

    /**
     * Retorna a forca defensiva do time;
     *
     *
     * @return Um inteiro que representa a forca defensiva do time(titular)
     *
     */
    public int getForcaDefensiva() {
        return this.elenco.getForcaDefensiva();
    }

    /**
     * Escolhe os titulares da equipe
     *
     * @param numZagueiros O numero de zagueiros
     * @param numMeias O numero de meias
     * @param numAtacantes O numero de atacantes
     *
     */
    public void escolherTitulares(int numZagueiros, int numMeias, int numAtacantes) {
        this.elenco.setTitulares(numZagueiros, numMeias, numAtacantes);
    }

    /**
     * Retorna a renda do clube
     *
     * @return A renda do Clube
     *
     */
    public long getRenda() {
        return this.renda;
    }

    /**
     * Retorna a arrecada�ao do clube
     *
     * @return A arrecada�ao do Clube
     *
     */
    public long getArrecadacao() {
        return this.arrecadacao;
    }

    /**
     * Retorna a despesa do clube
     *
     * @return A despesa do Clube
     *
     */
    public long getDespesas() {
        return this.despesas;
    }

    /**
     * Ajusta as contas do clube
     *
     * @param arrecadacao A arrecadacao obtida
     * @param despesas As despesas obtidas
     *
     */
    public void ajustarContas(long arrecadacao, long despesas) {
        this.renda = this.renda + (arrecadacao - despesas);
        this.arrecadacao = this.arrecadacao + arrecadacao;
        this.despesas = this.despesas + this.despesas;
    }

    /**
     * Retorna um jogador a vender
     *
     * @return Um jogador a ser vendido
     *
     */
    public Jogador venderJogador() {

        Jogador j = null;
        double fatorExcesso;
        double fatorGoleiro;
        double fatorMeia;
        double fatorZagueiro;
        double fatorAtacante;

        double fatorFalta;
        double faltaGoleiro;
        double faltaMeia;
        double faltaZagueiro;
        double faltaAtacante;
        int tipoJogador;
        int tipoFalta;

        fatorGoleiro = this.elenco.getGoleiros().numeroElementos() / 3;
        fatorZagueiro = this.elenco.getZagueiros().numeroElementos() / 7;
        fatorMeia = this.elenco.getMeioCampistas().numeroElementos() / 7;
        fatorAtacante = this.elenco.getAtacantes().numeroElementos() / 4;

        faltaGoleiro = this.elenco.getGoleiros().numeroElementos() / 2;
        faltaZagueiro = this.elenco.getZagueiros().numeroElementos() / 5;
        faltaMeia = this.elenco.getMeioCampistas().numeroElementos() / 5;
        faltaAtacante = this.elenco.getAtacantes().numeroElementos() / 3;

        fatorExcesso = fatorGoleiro;
        tipoJogador = Jogador.GOLEIRO;

        if (fatorExcesso < fatorZagueiro) {
            fatorExcesso = fatorZagueiro;
            tipoJogador = Jogador.ZAGUEIRO;
        }// fim do if (fatorExcesso < fatorZagueiro)

        if (fatorExcesso < fatorMeia) {
            fatorExcesso = fatorMeia;
            tipoJogador = Jogador.MEIOCAMPO;
        }// fim do if (fatorExcesso < fatorMeia)

        if (fatorExcesso < fatorAtacante) {
            fatorExcesso = fatorAtacante;
            tipoJogador = Jogador.ATACANTE;
        }// fim do if (fatorExcesso < fatorAtacante)

        fatorFalta = faltaGoleiro;
        tipoFalta = Jogador.GOLEIRO;

        if (fatorFalta < faltaZagueiro) {
            fatorFalta = faltaZagueiro;
            tipoFalta = Jogador.ZAGUEIRO;
        }//fim do if (fatorFalta < faltaZagueiro)

        if (fatorFalta < faltaMeia) {
            fatorFalta = faltaMeia;
            tipoFalta = Jogador.MEIOCAMPO;
        }//fim do if (fatorFalta < faltaMeia)

        if (fatorFalta < faltaAtacante) {
            fatorFalta = faltaAtacante;
            tipoFalta = Jogador.ATACANTE;
        }//fim do if (fatorFalta < faltaAtacante)

        if (this.renda < 0 && fatorFalta >= 1) {
            j = this.elenco.getJogadorElenco(tipoFalta);
        }// fim do if (this.renda < 0  &&  fatorFalta >= 1)
        else if (fatorExcesso > 1) {
            j = this.elenco.getJogadorElenco(tipoJogador);
        }

        return j;
    }

    /**
     * Retorna true se houver interesse na compra ou false caso contr�rio
     *
     * @param jogador O jogador a ser comprado
     *
     * @return A confirmacao do interesse
     *
     */
    public boolean comprarJogador(Jogador jogador) {
        boolean interesse = false;

        if (jogador != null) {
            double fatorExcesso = 0;

            switch (jogador.getPosicao()) {
                case Jogador.GOLEIRO:
                    fatorExcesso = this.elenco.getGoleiros().numeroElementos() / 3;
                    break;
                case Jogador.ZAGUEIRO:
                    fatorExcesso = this.elenco.getZagueiros().numeroElementos() / 7;
                    break;
                case Jogador.MEIOCAMPO:
                    fatorExcesso = this.elenco.getMeioCampistas().numeroElementos() / 7;
                    break;
                case Jogador.ATACANTE:
                    fatorExcesso = this.elenco.getAtacantes().numeroElementos() / 4;
                    break;
            }

            if (this.renda > jogador.getValorPasse() && fatorExcesso < 1) {
                interesse = true;

            } // fim do if (this.renda > jogador.getValorPasse()  && fatorExcesso < 1 )

        } // fim do  if( jogador != null)
        else {
            throw new NullPointerException("JOGADOR NULO");
        }

        return interesse;
    }

    /**
     * Metodo para testar a classe
     *
     */
    public static void main(String a[]) {

        Clube clube1;
        Jogador jogador1, jogador2;

        clube1 = new Clube("SPORT", new Estadio(34567), new Elenco());
        jogador1 = new Jogador("Rogerio", 9, 1000, Jogador.ZAGUEIRO);
        clube1.inserirJogador(jogador1);
        jogador2 = new Jogador("Roger", 3, 1000, Jogador.ZAGUEIRO);
        clube1.inserirJogador(jogador2);

        System.out.println(clube1.getNome() + clube1.getElenco().toString());
    }
}
