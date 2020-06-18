/*
 * Projeto Elifoot
 *
 * Tipo: ConjuntoPartidas
 */

package partidas;


import clubes.Clube;
import estadios.Estadio;
import gols.Placar;
import jogadores.Elenco;
import jogadores.Jogador;

/**
 * ConjuntoPartidas representa uma colecao de partidas implementada
 * atraves array
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public class ConjuntoPartidas implements RepositorioPartidas{


    // Indice do array
    private int indice;

    // Array de Partidas
    private Partida conjunto[] ;

    /**
     * Construtor da classe Conjunto ConjuntoPartidas
     *
     */
    public ConjuntoPartidas() {
        indice = 0;
        conjunto =  new Partida[8];
    }

    /**
     * Construtor da classe Conjunto ConjuntoPartidas
     *
     *@param numeroPartidas    Numero de partidas do conjunto
     *
     */
    public ConjuntoPartidas(int numeroPartidas) {
        indice = 0;
        conjunto = new Partida[numeroPartidas];

    }

    /**
     * Insere uma partida no conjunto de partidas
     *
     * @param p     Partida a ser inserida no conjunto
     *
     */
    public void inserir(Partida p) {
        conjunto[indice] = p;
        indice = indice + 1;
    }

    /**
     * Retorna o numero de partidas do comjunto de partidas
     *
     * @return       um inteiro contendo o numero de partidas
     *
     */
    public int numeroElementos() {
        return indice;
    }

    /**
     * Verifica se uma partida pertence ao conjunto de partidas
     *
     * @param p       a partida que se deve verificar se pertence ao conjunto
     *
     * @return       true de a partida pertence ao conjunto, false caso contrario
     */
    public boolean pertence(Partida p) {
        int i=0;
        boolean res = false;

        if (p == null) {
       	    throw new NullPointerException("Nao foi passada nenhuma partida");//nossa excecao

        }// fim do if (p == null)

        else {

            while (i < indice) {

                if (conjunto[i].equals(p)){
                    res = true;
                    i = indice - 1;

                }// fim do if (conjunto[i].equals(p))

                i = i + 1;

            }// fim do while (i < indice)

        }// fim do else

        return res;
    }

    /**
     * Verifica se algum clube pertence a uma partida do conjunto de partidas
     *
     *
     * @param casa          o clube que joga em casa
     * @param visitante     o clube que joga como visitante
     *
     * @return     true
     */
    public boolean pertence(Clube casa,Clube visitante) {
        int i=0;
        boolean res = false;

        if (casa == null || visitante == null) {
            throw new NullPointerException("Nao foram passados os clubes");

        }// fim do if (casa == null || visitante == null)

        else {

            while (i < indice) {

                if (conjunto[i].getCasa().equals(casa)
     	                || conjunto[i].getCasa().equals(visitante)
     	                || conjunto[i].getVisitante().equals(casa)
     	                || conjunto[i].getVisitante().equals(visitante)) {
                    res = true;
                    i = indice - 1;

                }// fim do if

                i = i + 1;

            }// fim do while (i < indice)

        }// fim do else

        return res;
    }

    /**
     * Retorna o placar de uma partida espec�fica
     *
     * @param p      uma partida
     *
     * @return       o Placar da partida
     */
    public Placar getPlacar(Partida p) {
        Placar placar;

        if (p != null) {

            if (pertence(p)) {
                placar = p.getPlacar();

            }// fim do if(pertence(p))

            else {
                throw new NullPointerException("Partida nao pertence ao conjunto");//nossa excecao

            }// fim do else

        }// fim do if (p != null)

        else {
            throw new NullPointerException("Nao foi passada nenhuma partida");

        }// fim do else

        return placar;
    }

    /**
     * Retorna o clube que joga em casa em uma partida espec�fica
     *
     * @param p      uma partida
     *
     * @return       o clube que joga em casa
     *
     */
    public Clube getCasa(Partida p) {
        Clube clube;

        if (p != null) {

            if (pertence(p)) {
                clube=p.getCasa();

            }// fim do if (pertence(p))

            else {
                throw new NullPointerException("Clube nao pertence ao conjunto");//nossa excecao

            }// fim do else

        }// fim do if (p != null)

        else {
            throw new NullPointerException("Nao foi passada nenhuma partida");

        }// fim do else

        return clube;
    }

    /**
     * Retorna o clube que joga como visitante
     *
     * @param p      uma partida
     *
     * @return       o clube que joga a partida como visitante
     *
     */
    public Clube getVisitante(Partida p) {
        Clube clube;

        if (p != null) {

            if (pertence(p)) {
                clube=p.getVisitante();

            }// fim do if(pertence(p))

            else {
                throw new NullPointerException("Clube nao pertence ao conjunto");//nossa excecao

            }// fim do else

        }// fim do if (p != null)

        else {
            throw new NullPointerException("Nao foi passada nenhuma partida");

        }// fim do else

        return clube;
    }

    /**
     * Retorna a en�sima partida do conjunto de partidas
     *
     * @param n      o numero da partida
     *
     * @return       a partida numero n
     *
     */
    public Partida getPartida(int n) {
        Partida res = null;

        if (n >= 0 && n < indice) {
            res = new Partida();
            res = conjunto[n];

        }// fim do if (n >= 0 && n < indice)

        else {
            throw new NullPointerException("Argumento 'n' fora dos limites");//nossa excecao

        }// fim do else

        return res;

    }

    /**
     * Metodo para testar a classe
     *
     */
    public static void main(String a[]) {
        int publico = 123540;
        ConjuntoPartidas p;

        Clube time1 = new Clube("SPORT",new Estadio(130000),new Elenco(),9);
        Clube time2 = new Clube("NAUTICO",new Estadio(1500),new Elenco(),2);

        Jogador jogador1;
        Jogador jogador2;
        Jogador jogador3;
        Jogador jogador4;
        Jogador jogador5;
        Jogador jogador6;
        Jogador jogador7;
        Jogador jogador8;
        Jogador jogador9;
        Jogador jogador10;
        Jogador jogador11;
        Jogador jogador12;
        Jogador jogador13;
        Jogador jogador14;
        Jogador jogador15;
        Jogador jogador16;
        Jogador jogador17;
        Jogador jogador18;
        Jogador jogador19;
        Jogador jogador20;
        Jogador jogador21;
        Jogador jogador22;

        jogador1 = new Jogador("Rogerio",9,1000,Jogador.GOLEIRO);
        jogador2 = new Jogador("Paulao",8,500,Jogador.ZAGUEIRO);
        jogador3 = new Jogador("Bordon",7,500,Jogador.ZAGUEIRO);
        jogador4 = new Jogador("Anderson",7,500,Jogador.ZAGUEIRO);
        jogador5 = new Jogador("Cafu",8,500,Jogador.ZAGUEIRO);
        jogador6 = new Jogador("Belleti",9,500,Jogador.MEIOCAMPO);
        jogador7 = new Jogador("Rai",8,500,Jogador.MEIOCAMPO);
        jogador8 = new Jogador("Fabiano",7,1000,Jogador.MEIOCAMPO);
        jogador9 = new Jogador("Souza",9,1000,Jogador.MEIOCAMPO);
        jogador10 = new Jogador("Evair",10,1000,Jogador.ATACANTE);
        jogador11 = new Jogador("Franca",9,1000,Jogador.ATACANTE);
        jogador12 = new Jogador("Clemer",6,1000,Jogador.GOLEIRO);
        jogador13 = new Jogador("Fabio Baiano",7,500,Jogador.ZAGUEIRO);
        jogador14 = new Jogador("Luis Alberto",7,500,Jogador.ZAGUEIRO);
        jogador15 = new Jogador("Juan",5,500,Jogador.ZAGUEIRO);
        jogador16 = new Jogador("Athirson",5,500,Jogador.ZAGUEIRO);
        jogador17 = new Jogador("Rocha",7,500,Jogador.MEIOCAMPO);
        jogador18 = new Jogador("Iranildo",7,500,Jogador.MEIOCAMPO);
        jogador19 = new Jogador("Petkovic",7,1000,Jogador.MEIOCAMPO);
        jogador20 = new Jogador("Le",6,1000,Jogador.ATACANTE);
        jogador21 = new Jogador("Tuta",6,1000,Jogador.ATACANTE);
        jogador22 = new Jogador("Reinaldo",7,1000,Jogador.ATACANTE);

        time1.inserirJogador(jogador1);
        time1.inserirJogador(jogador2);
        time1.inserirJogador(jogador3);
        time1.inserirJogador(jogador4);
        time1.inserirJogador(jogador5);
        time1.inserirJogador(jogador6);
        time1.inserirJogador(jogador7);
        time1.inserirJogador(jogador8);
        time1.inserirJogador(jogador9);
        time1.inserirJogador(jogador10);
        time1.inserirJogador(jogador11);


        time2.inserirJogador(jogador12);
        time2.inserirJogador(jogador13);
        time2.inserirJogador(jogador14);
        time2.inserirJogador(jogador15);
        time2.inserirJogador(jogador16);
        time2.inserirJogador(jogador17);
        time2.inserirJogador(jogador18);
        time2.inserirJogador(jogador19);
        time2.inserirJogador(jogador20);
        time2.inserirJogador(jogador21);
        time2.inserirJogador(jogador22);

        time1.escolherTitulares(4,4,2);
        time2.escolherTitulares(4,3,3);

        p = new ConjuntoPartidas(2);

        p.inserir(new Partida(time1,time2,publico));
        p.inserir(new Partida(time2,time1,publico));

        System.out.println(p.getPartida(0).toString());
        System.out.println(p.getPartida(1).toString());
        System.out.println();

	}


}
