/*
 * projeto : elifoot
 *
 * Tipo : Transferência
 *
 * 
 */

package negociacao;

 
import clubes.Clube;
import jogadores.Jogador;
import jogadores.Elenco;
import estadios.Estadio;

/**
 * Transferência é um tipo que representa a transferência de um jogador
 * do seu clube de origem para outro clube que o comprou.
 *
 * @author Andre,Carlos,Francisco,Mardoqueu,Renato
 *      
 */
public class Transferencia {
    
    
    // O clube de origem do jogador
    private Clube clubeOrigem;
    
    // O clube que destino do jogador
    private Clube clubeVencedorLeilao;
    
    // O jogador a ser transferido
    private Jogador jogador;
     
   /**
    * Construtor da Classe Transferência
    *
    *@param jogador       jogador que vai ser transferido
    *@param clubeOrigem   clube de origem do jogador
    *@param clubeDestino  clube de destino do jogador
    */
    public Transferencia(Jogador jogador,Clube clubeOrigem, Clube clubeDestino) {
        this.jogador = jogador;
        this.clubeOrigem = clubeOrigem;
        this.clubeVencedorLeilao = clubeDestino;
        this.fazerTransferencia();
    }

   /**
    * Faz a transferencia entre os clubes , ajustando as contas
    */
    private void fazerTransferencia() {
        this.clubeOrigem.removerJogador(jogador);
        this.clubeOrigem.ajustarContas(jogador.getValorPasse(),0);
        this.clubeVencedorLeilao.inserirJogador(jogador);
        this.clubeVencedorLeilao.ajustarContas(0,jogador.getValorPasse());
    }
   /**
    * Retorna a informaçao sobre a transferencia
    *
    * @return Uma string com as informaçoes sobre a transferencia
    */
    public String mostrar() {
        return ("Clube " + clubeOrigem.getNome() + "vendeu o jogador "
                + jogador.getNome() + "\n" + "para O " + clubeVencedorLeilao.getNome()
                + " por " + jogador.getValorPasse() + "\n"
                +  "Novo salario -> " + jogador.getSalario());
    }


   /**
    * Metodo para testar a classe
    *
    */
    public static void main(String a[]) {
        Clube time1,time2;
        Transferencia t;
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

        t = new Transferencia(jogador20,time2,time1);
        System.out.println(t.mostrar());
    }
}
