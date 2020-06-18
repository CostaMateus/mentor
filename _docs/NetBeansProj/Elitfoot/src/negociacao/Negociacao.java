/*
 * Projeto Elifoot
 *
 * Tipo: Negociacao
 */

package negociacao;

 
import clubes.Clube;
import clubes.RepositorioClubes;
import clubes.ConjuntoClubes;
import jogadores.Jogador;
import jogadores.Elenco;
import estadios.Estadio;

/**
 * Negociacao representa uma simulaçao de um negocio entre dois clubes 
 *
 * @author : Andre, Carlos, Francisco, Mardoqueu, Renato
 */
public class Negociacao {
    
    
    // Clubes que podem negociar
    private RepositorioClubes clubes;
    
    // Clube que vai vender o jogador
    private Clube clubeOrigem;
    
    // Clubes que concorrem na compra do jogador
    private RepositorioClubes clubesDestino;
    
    // O leilao a ser realizado
    private Leilao leilao;

    // O jogador a ser vendido
    private Jogador jogador;

    // O numero de clubes
    private int numeroClubes;


   /**
    * Construtor da classe Negociaçao
    *
    * @param clubes O conjunto de clubes que está habilitado a negociar
    */
    public Negociacao(RepositorioClubes clubes){
        this.clubes  = clubes;
        this.numeroClubes = clubes.numeroElementos();
        this.clubeOrigem = selecionarClubeOrigem(clubes);
        this.clubesDestino = selecionarClubesDestino(clubes);
        procurarNegocio();
    }


   /**
    * Procura o jogador e inicializa o leilao deste jogador
    *
    */
    private void procurarNegocio() {

        int rand = ((int) Math.random()*1000)%2;

        if (this.clubeOrigem != null && this.clubesDestino != null) {
            this.jogador = clubeOrigem.venderJogador();

            if (this.jogador != null) {

                if (rand == 0) {
                    leilao = new Leilao(this.clubes, jogador, clubeOrigem);
                }//if (rand == 0)
            
            } // if (this.jogador != null)
        
        }//if (this.clubeOrigem != null && this.clubesDestino != null) 
    }


   /**
    *  Seleciona aleatoriamente o clube que vai vender
    *
    *@param clubes Os clubes que fazem parte da negociacao
    *@return  O clube de origem
    */
    private Clube selecionarClubeOrigem(RepositorioClubes clubes) {

        RepositorioClubes origens = new ConjuntoClubes();
        Clube clube;
        int numeroClubes;
        int rand;
        numeroClubes = clubes.numeroElementos();

        for(int i = 0;i<numeroClubes;i++) {
            clube = clubes.getClube(i);
            origens.inserir(clube);
        } // fim do for

        rand = (int) (Math.random() * origens.numeroElementos());
        clube = origens.getClube(rand);
        return clube;
    }


   /**
    * Seleciona os clubes habilitados a comprar
    *
    *@param clubes Os clubes que participam da negociaçao
    *@return Os clubes que irao negociar com o clube de origem
    */
    private RepositorioClubes selecionarClubesDestino(RepositorioClubes clubes) {

        RepositorioClubes destino;
        Clube clube;
        int numeroClubes;
        numeroClubes = clubes.numeroElementos();

        destino = new ConjuntoClubes();

        for(int i = 0;i<numeroClubes;i++) {
            clube = clubes.getClube(i);

            if( clube.getRenda() > 0 ) {
                 destino.inserir(clube);

            } // fim do if

        }     // fim do for

        return destino;
    }


   /**
    * Retorna o resultado da negociacao
    *
    * @return Uma string com o resultado da negociaçao
    */
    public String mostrar() {

        String a =  "Nao houve negociacao";

        if (leilao != null) {
            a = leilao.mostrar();
        }//if (leilao != null)

        return a;
    }


   /**
    * Retorna o leilao realizado
    *
    *@return O leilao que foi realizado
    */
    public Leilao getLeilao() {
        return leilao;
    }


   /**
    * Informa se o jogador permaneceu no clube
    *
    * @return Um boolean informando se o jogador permaneceu no clube
    */
    public boolean permanecerNoClube() {

        boolean r;

        if (leilao != null){
            r = leilao.permanecerNoClube();
        }
        else {
            r = true;
        }

        return r;
    }


   /**
    * Metodo para testar a classe
    *
    */
    public static void main(String a[]) {

        Clube time1,time2;
        Negociacao neg;
        RepositorioClubes clubes;
        time1 = new Clube("SPORT",new Estadio(130000),new Elenco(),9,1000000);
        time2 = new Clube("NAUTICO",new Estadio(1500),new Elenco(),2,-20000);

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
           
        clubes = new ConjuntoClubes();
        clubes.inserir(time1);
        clubes.inserir(time2);
        neg = new Negociacao(clubes);
        
        if (neg != null && neg.getLeilao() != null) {
            System.out.println(neg.mostrar());
        }
        else {
            System.out.println("Nao houve negociacao");
        }
    }  
}
