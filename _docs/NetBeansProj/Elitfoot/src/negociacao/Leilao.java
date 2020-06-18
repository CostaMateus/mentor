/*
 * Projeto Elifoot
 *
 * Tipo: Leilao
 */

package negociacao;


import clubes.Clube;
import clubes.RepositorioClubes;
import clubes.ConjuntoClubes;
import jogadores.Jogador;
import jogadores.Elenco;
import estadios.Estadio;

/**
 *   Leilao representa uma simulaçao de um leilao por um jogador
 *
 * @author : Andre, Carlos, Francisco, Mardoqueu, Renato
 */
public class Leilao {


    // Os clubes que farao propostas
    private RepositorioClubes clubesDestino;
    
    // A transferencia a ser realizada
    private Transferencia transferencia;
    
    // O clube que vai vender o jogador
    private Clube clubeOrigem;
    
    // O jogador que esta sendo negociado
    private Jogador jogador;

    // O numero de clubes que fazem propostas
    private int numeroClubes;

    // A proposta maxima feita
    private int propostaMaxima;
    
    // Verifica se o jogador acertou com o clube de origem
    private boolean acertoComClubeOrigem;
    
    // O clube que vence o leilao
    private Clube clubeVencedorLeilao;
    
    // As propostas feitas pelos clubesDestino
    private Proposta propostas[]; 
	
    
   /**
    * Construtor da classe Leilao
    *
    * @param clubeDestino    Os clubes que fazem propostas
    * @param jogador         O jogador a ser negociado
    * @param clubeOrigem     O clube que vai vender o jogador
    */
    public Leilao(RepositorioClubes clubesDestino, Jogador jogador, Clube clubeOrigem) {
        this.clubesDestino = clubesDestino;
        this.jogador = jogador;
        this.clubeOrigem = clubeOrigem;
        this.numeroClubes = clubesDestino.numeroElementos();
        iniciarLeilao();
    }

   /**
    * Avalia as propostas e realiza a transferencia
    *
    */
    private void iniciarLeilao() {
        propostas = new Proposta[clubesDestino.numeroElementos()];
        lancarPropostas();
        avaliarMelhorProposta();

        if (propostaMaxima > jogador.getSalario()
            && (clubeVencedorLeilao.getRenda() / 2) > jogador.getValorPasse()) {
            jogador.setSalario(propostaMaxima);

            if (!clubeVencedorLeilao.equals(clubeOrigem)) {
                acertoComClubeOrigem = false;
                transferencia = new Transferencia(jogador, clubeOrigem, clubeVencedorLeilao);

            } // fim do if (!clubeVencedorLeilao.equals(clubeOrigem))

        } // fim do if externo
    }


   /**
    * Preenche o array de propostas com o nome de cada clube, seguido de sua proposta.
    */
    private void lancarPropostas() {

        for (int i = 0; i < this.numeroClubes; i++) {//todos os clubes lançam propostas
            propostas[i] = this.getProposta(i);

        } // fim do for
    }

   /**
    * Retorna uma proposta salarial "aleatoria" do clube #i.
    *
    * @param    i    O posicao do clube no conujunto de clubes
    * @return        Uma proposta do clube #i
    */
    private Proposta getProposta(int i) {

        Proposta proposta ;
        Clube clube = clubesDestino.getClube(i);

        if(clube.comprarJogador(this.jogador) == true ) {
            int valor = (int) (Math.random() * 2000)* this.jogador.getForca();
            proposta = new Proposta(clube,valor);

        } // fim do if
        
        else {
            // Se o clube nao quiser o jogador , o valor da proposta é -1
            proposta = new Proposta(clube,-1);
        }

        return proposta;
    }

   /**
    * Avalia as propostas e seleciona a melhor
    */
    void avaliarMelhorProposta() {

        for (int i = 0; i < this.numeroClubes; i++) {

            if (propostas[i].getValorProposta() > propostaMaxima) {
                propostaMaxima = propostas[i].getValorProposta();
                clubeVencedorLeilao = propostas[i].getClubeProposta();
            }
        }
    }

   /**
    * Verifica se o jogador permaneceu no clube
    *
    * @retun Um boolean que informa se o jogador permaneceu no clube
    */
    public boolean permanecerNoClube() {
        return acertoComClubeOrigem;
    }


   /**
    *  Mostra o resultado do leilao
    */
    public String mostrar() {

        String a = null;

        if (!acertoComClubeOrigem && transferencia != null) {
            a = transferencia.mostrar();
        }
        else {
            a = ("Houve acerto do jogador " + this.jogador.getNome() + " com seu clube de Origem: " + clubeOrigem.getNome()
                 + " por R$ " + jogador.getSalario());
        }

        return a;
    }

   /**
    * Metodo para testar a classe
    *
    */
    public static void main(String a[]) {
        Clube time1,time2;
        Leilao l;
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
        l = new Leilao(clubes,jogador22,time2);

        if (l != null) {
            System.out.println(l.mostrar());
        }
        else {
            System.out.println("Nao houve leilao");
        }
    }
}
