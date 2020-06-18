package main;

/**
 *  Projeto Elifoot
 *
 *  Classe que testa todas as funcionalidades do projeto.
 */

import clubes.Clube;
import clubes.RepositorioClubes;
import estadios.Estadio;
import fachada.Sistema;
import jogadores.Elenco;
import jogadores.Jogador;
import negociacao.Negociacao;
import partidas.Rodada;
import torneio.Torneio;
import torneio.campeonato.Campeonato;
import torneio.copa.Copa;



/**
 * Classe teste do projeto elifoot.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 */
public class Teste {

    
    /**
     * Testa todas as classes e simula os campeonato
     */
    public static void main(String[] args) {

        int rand,i;

        Jogador[] jogador = new Jogador[160];

        // Criando jogadores

        //TIME 1
        jogador[1] = new Jogador("Rogerio",9,1000,Jogador.GOLEIRO, 2);
        jogador[2] = new Jogador("Paulao",8,500,Jogador.ZAGUEIRO,  6);
        jogador[3] = new Jogador("Bordon",7,500,Jogador.ZAGUEIRO,  6);
        jogador[4] = new Jogador("Anderson",7,500,Jogador.ZAGUEIRO,  6);
        jogador[5] = new Jogador("Cafu",8,500,Jogador.ZAGUEIRO,  6);
        jogador[6] = new Jogador("Belleti",9,500,Jogador.MEIOCAMPO, 8);
        jogador[7] = new Jogador("Rai",8,500,Jogador.MEIOCAMPO, 8);
        jogador[8] = new Jogador("Fabiano",7,1000,Jogador.MEIOCAMPO, 8);
        jogador[9] = new Jogador("Souza",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[10] = new Jogador("Evair",10,1000,Jogador.ATACANTE,5);
        jogador[11] = new Jogador("Franca",9,1000,Jogador.ATACANTE,5);
        jogador[12] = new Jogador("Mardoqueu",10,1000,Jogador.GOLEIRO,2);
        jogador[13] = new Jogador("Junior",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[14] = new Jogador("Renato",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[15] = new Jogador("Francisco",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[16] = new Jogador("Pericle",10,1000,Jogador.ATACANTE,5);



        //TIME 2
        jogador[17] = new Jogador("Clemer",6,1000,Jogador.GOLEIRO, 2);
        jogador[18] = new Jogador("Fabio Baiano",7,500,Jogador.ZAGUEIRO,  6);
        jogador[19] = new Jogador("Luis Alberto",7,500,Jogador.ZAGUEIRO,  6);
        jogador[20] = new Jogador("Juan",5,500,Jogador.ZAGUEIRO,  6);
        jogador[21] = new Jogador("Athirson",5,500,Jogador.ZAGUEIRO,  6);
        jogador[22] = new Jogador("Rocha",7,500,Jogador.MEIOCAMPO, 8);
        jogador[23] = new Jogador("Iranildo",7,500,Jogador.MEIOCAMPO, 8);
        jogador[24] = new Jogador("Petkovic",7,1000,Jogador.MEIOCAMPO, 8);
        jogador[25] = new Jogador("Le",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[26] = new Jogador("Tuta",6,1000,Jogador.ATACANTE,5);
        jogador[27] = new Jogador("Reinaldo",7,1000,Jogador.ATACANTE,5);
        jogador[28] = new Jogador("Evair",10,1000,Jogador.ATACANTE,5);
        jogador[29] = new Jogador("Franca",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[30] = new Jogador("Bruno",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[31] = new Jogador("Jameson",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[32] = new Jogador("Igor",10,1000,Jogador.ATACANTE,5);


        //TIME 3
        jogador[33] = new Jogador("Bosco",9,1000,Jogador.GOLEIRO, 2);
        jogador[34] = new Jogador("Sandro Blum",8,500,Jogador.ZAGUEIRO,  6);
        jogador[35] = new Jogador("Erlon",7,500,Jogador.ZAGUEIRO,  6);
        jogador[36] = new Jogador("Marcio",7,500,Jogador.ZAGUEIRO,  6);
        jogador[37] = new Jogador("Isaias",8,500,Jogador.ZAGUEIRO,  6);
        jogador[38] = new Jogador("Sangalleti",9,500,Jogador.MEIOCAMPO, 8);
        jogador[39] = new Jogador("Nildo",8,500,Jogador.MEIOCAMPO, 8);
        jogador[40] = new Jogador("Lico",7,1000,Jogador.MEIOCAMPO, 8);
        jogador[41] = new Jogador("Adriano",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[42] = new Jogador("Leonardo",10,1000,Jogador.ATACANTE,5);
        jogador[43] = new Jogador("Jackes",9,1000,Jogador.ATACANTE,5);
        jogador[44] = new Jogador("Tonhao",10,1000,Jogador.GOLEIRO, 2);
        jogador[45] = new Jogador("Peladeiro",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[46] = new Jogador("Capitao",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[47] = new Jogador("Fred",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[48] = new Jogador("Batistuta",10,1000,Jogador.ATACANTE,5);

        //TIME 4
        jogador[49] = new Jogador("Caetano",6,1000,Jogador.GOLEIRO, 2);
        jogador[50] = new Jogador("Carlinhos",7,500,Jogador.ZAGUEIRO,  6);
        jogador[51] = new Jogador("Marcio",7,500,Jogador.ZAGUEIRO,  6);
        jogador[52] = new Jogador("Nildo",8,500,Jogador.ZAGUEIRO,  6);
        jogador[53] = new Jogador("Lico",7,1000,Jogador.ZAGUEIRO,  6);
        jogador[54] = new Jogador("Adriano",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[55] = new Jogador("Leonardo",10,1000,Jogador.MEIOCAMPO, 8);
        jogador[56] = new Jogador("Jackes",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[57] = new Jogador("Caetano",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[58] = new Jogador("Carlinhos",7,500,Jogador.ATACANTE,5);
        jogador[59] = new Jogador("Luciano",7,500,Jogador.ATACANTE,5);
        jogador[60] = new Jogador("Evair",10,1000,Jogador.GOLEIRO, 2);
        jogador[61] = new Jogador("Marco Antonio",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[62] = new Jogador("Matheus",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[63] = new Jogador("Tizio",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[64] = new Jogador("Erick",10,1000,Jogador.ATACANTE,5);

        //TIME 5
        jogador[65] = new Jogador("Gino",5,500,Jogador.GOLEIRO, 2);
        jogador[66] = new Jogador("Richard",5,500,Jogador.ZAGUEIRO,  6);
        jogador[67] = new Jogador("Marco Aurelio",7,500,Jogador.ZAGUEIRO,  6);
        jogador[68] = new Jogador("Sabino",7,500,Jogador.ZAGUEIRO,  6);
        jogador[69] = new Jogador("Evandro",7,1000,Jogador.ZAGUEIRO,  6);
        jogador[70] = new Jogador("Edson",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[71] = new Jogador("Agostinho",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[72] = new Jogador("Zezinho",7,1000,Jogador.MEIOCAMPO, 8);
        jogador[73] = new Jogador("Vagner",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[74] = new Jogador("Gottardo",8,500,Jogador.ATACANTE,5);
        jogador[75] = new Jogador("Jorge Luis",7,500,Jogador.ATACANTE,5);
        jogador[76] = new Jogador("Filipe",10,1000,Jogador.GOLEIRO, 2);
        jogador[77] = new Jogador("Franca",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[78] = new Jogador("Eduardo",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[79] = new Jogador("Carlos",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[80] = new Jogador("Joao",10,1000,Jogador.ATACANTE,5);

        //TIME 6
        jogador[81] = new Jogador("Sandro",7,500,Jogador.GOLEIRO, 2);
        jogador[82] = new Jogador("Goncalves",8,500,Jogador.ZAGUEIRO,  6);
        jogador[83] = new Jogador("Reidner",9,500,Jogador.ZAGUEIRO,  6);
        jogador[84] = new Jogador("Djair",8,500,Jogador.ZAGUEIRO,  6);
        jogador[85] = new Jogador("Caio",7,1000,Jogador.ZAGUEIRO,  6);
        jogador[86] = new Jogador("Cuca",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[87] = new Jogador("Ze Carlos",10,1000,Jogador.MEIOCAMPO, 8);
        jogador[88] = new Jogador("Robson",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[89] = new Jogador("Jean",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[90] = new Jogador("Baiano",7,500,Jogador.ATACANTE,5);
        jogador[91] = new Jogador("Flavio",7,500,Jogador.ATACANTE,5);
        jogador[92] = new Jogador("Henrique",10,1000,Jogador.GOLEIRO, 2);
        jogador[93] = new Jogador("Paulo Borba",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[94] = new Jogador("Robson",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[95] = new Jogador("Roberto",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[96] = new Jogador("Ronaldo",10,1000,Jogador.ATACANTE,5);

        //TIME 7
        jogador[97] = new Jogador("Eloi",5,500,Jogador.GOLEIRO, 2);
        jogador[98] = new Jogador("Leandro",5,500,Jogador.ZAGUEIRO,  6);
        jogador[99] = new Jogador("Fernando",7,500,Jogador.ZAGUEIRO,  6);
        jogador[100] = new Jogador("Alan Delon",7,500,Jogador.ZAGUEIRO,  6);
        jogador[101] = new Jogador("Preto",7,1000,Jogador.ZAGUEIRO,  6);
        jogador[102] = new Jogador("Jean Carlo",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[103] = new Jogador("Claudio",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[104] = new Jogador("Manoel",7,1000,Jogador.MEIOCAMPO, 8);
        jogador[105] = new Jogador("Zetti",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[106] = new Jogador("Sandro",8,500,Jogador.ATACANTE,5);
        jogador[107] = new Jogador("Alex Lopes",7,500,Jogador.ATACANTE,5);
        jogador[108] = new Jogador("Duda",10,1000,Jogador.GOLEIRO, 2);
        jogador[109] = new Jogador("Ze bento",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[110] = new Jogador("Marcos",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[111] = new Jogador("Alex",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[112] = new Jogador("Alencar",10,1000,Jogador.ATACANTE,5);

        //TIME 8
        jogador[113] = new Jogador("Parreira",7,500,Jogador.GOLEIRO, 2);
        jogador[114] = new Jogador("Zagallo",8,500,Jogador.ZAGUEIRO,  6);
        jogador[115] = new Jogador("Ponte",9,500,Jogador.ZAGUEIRO,  6);
        jogador[116] = new Jogador("Mango",8,500,Jogador.ZAGUEIRO,  6);
        jogador[117] = new Jogador("Renato Gaucho",7,1000,Jogador.ZAGUEIRO,  6);
        jogador[118] = new Jogador("Romerito",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[119] = new Jogador("Roni",10,1000,Jogador.MEIOCAMPO, 8);
        jogador[120] = new Jogador("Roger",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[121] = new Jogador("Ronald",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[122] = new Jogador("Bal",7,500,Jogador.ATACANTE,5);
        jogador[123] = new Jogador("Martins",7,500,Jogador.ATACANTE,5);
        jogador[124] = new Jogador("Tostao",10,1000,Jogador.GOLEIRO, 2);
        jogador[125] = new Jogador("Pelezinho",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[126] = new Jogador("Eloisio",10,1000,Jogador.ZAGUEIRO,  6);
        jogador[127] = new Jogador("Baiano",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[128] = new Jogador("Cleber",10,1000,Jogador.ATACANTE,5);

        //TIME 9
        jogador[129] = new Jogador("Paulo Borba",5,500,Jogador.GOLEIRO, 2);
        jogador[130] = new Jogador("Manuel",5,500,Jogador.ZAGUEIRO,  6);
        jogador[131] = new Jogador("Alexandre",7,500,Jogador.ZAGUEIRO,  6);
        jogador[132] = new Jogador("Rui",7,500,Jogador.ZAGUEIRO,  6);
        jogador[133] = new Jogador("Andre Santos",7,1000,Jogador.ZAGUEIRO,  6);
        jogador[134] = new Jogador("Sergio Sete",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[135] = new Jogador("Wilson Rosa",6,1000,Jogador.MEIOCAMPO, 8);
        jogador[136] = new Jogador("Marco Ferramola",7,1000,Jogador.MEIOCAMPO, 8);
        jogador[137] = new Jogador("Fabio Queda",9,1000,Jogador.MEIOCAMPO, 8);
        jogador[138] = new Jogador("Irani",8,500,Jogador.ATACANTE,5);
        jogador[139] = new Jogador("Romario",7,500,Jogador.ATACANTE,5);



        jogador[145] = new Jogador("Edmundo",7,500,Jogador.ATACANTE,5);
        jogador[146] = new Jogador("Evanilson",8,500,Jogador.GOLEIRO, 2);
        jogador[147] = new Jogador("Dunga",9,500,Jogador.ZAGUEIRO,  6);
        jogador[148] = new Jogador("Mauro Silva",8,500,Jogador.ZAGUEIRO,  6);
        jogador[149] = new Jogador("Zinho",7,1000,Jogador.ZAGUEIRO,  6);
        jogador[150] = new Jogador("Mancuso",9,1000,Jogador.ZAGUEIRO,  6);
        jogador[152] = new Jogador("Ronaldo",10,1000,3, 5);
        jogador[151] = new Jogador("Amoroso",9,1000,3, 5);


        // cria o objeto sistema (fachada)
        Sistema teste = new Sistema();

        // insere jogadores no cadastro geral de jogadores do sistema
        for ( i = 1; i < 128 ; i++ )
            teste.inserir(jogador[i]);


        // Cria estadios
        Estadio[] estadio = new Estadio[17];

        estadio[1] = new Estadio(70000);
        estadio[2] = new Estadio(15000);
        estadio[3] = new Estadio(120000);
        estadio[4] = new Estadio(10000);
        estadio[5] = new Estadio(5000);
        estadio[6] = new Estadio(30000);
        estadio[7] = new Estadio(6000);
        estadio[8] = new Estadio(4567);
        estadio[9] = new Estadio(70000);
        estadio[10] = new Estadio(15000);
        estadio[11] = new Estadio(120000);
        estadio[12] = new Estadio(10000);
        estadio[13] = new Estadio(5000);
        estadio[14] = new Estadio(30000);
        estadio[15] = new Estadio(6000);
        estadio[16] = new Estadio(4567);

        //Inserindo os estadios do sistema
        for ( i = 1; i < 17 ; i++ )
            teste.inserir(estadio[i]);

        Clube[] time = new Clube[10];

        // Criacao de clubes
        time[1] = new Clube("SAO PAULO",teste.getEstadio(0),new Elenco(),8,10000000);
        time[2] = new Clube("FLAMENGO",teste.getEstadio(1),new Elenco(),7,-5000000);
        time[3] = new Clube("SPORT",teste.getEstadio(2),new Elenco(),10,100000000);
        time[4] = new Clube("NAUTICO",teste.getEstadio(3),new Elenco(),7,-13000000);
        time[5] = new Clube("BOTAFOGO",teste.getEstadio(4),new Elenco(),8,-100000);
        time[6] = new Clube("VITORIA",teste.getEstadio(5),new Elenco(),5,-4500000);
        time[7] = new Clube("FLUMINENSE",teste.getEstadio(6),new Elenco(),2,4560000);
        time[8] = new Clube("IBIS",teste.getEstadio(7),new Elenco(),1,-10000);


        // inserindo clubes no cadastro geral de clubes
        for ( int j = 1,k = 1; j < 129 && k < 9; j = j + 16 ,k++) {
            teste.inserir(time[k]);
            // inserindo nos clubes jogadores ja cadastrados
            for ( i = j; i < j+16 ; i++ )
                teste.inserir(time[k].getNome(),jogador[i]);
        }

        Torneio[] torneio = new Torneio[2];

        torneio[0] = new Campeonato();
        torneio[1] = new Copa();

        //Inserindo nos torneios alguns clubes cadastrados no sistemas
        for ( i = 1; i < 9 ; i++ ) {
            torneio[0].inserir(teste.getClube(i-1));
            torneio[1].inserir(teste.getClube(i-1));
        }

        //Inserindo os torneios no cadastro de torneios
        for ( i = 0; i < 2 ; i++ )
            teste.inserir(torneio[i]);

        /* TESTANDO O CAMPEONATO DE PONTOS CORRIDOS */

        Rodada rodada = new Rodada();

        System.out.println("\n\nInicio da Campeonato\n\n");

        for ( i = 0; i < teste.getTorneio(0).getNumeroRodadas(); i++) {
            rodada = teste.executarTorneio(0,i);
            System.out.println("\n\nRODADA : " + i + "\n" );
            System.out.println(rodada.toString());
            System.out.println(((Campeonato)teste.getTorneio(0)).getClassificacao().toString(i));

            try {
                Thread.sleep(100);
            }
            catch(InterruptedException e) {}

            rand = (int) (Math.random() * 5);

            for(int j = 0;j<rand;j++) {
            	  Negociacao negociacao = new Negociacao(teste.getTorneio(0).getClubes());

              	if (negociacao != null && negociacao.getLeilao() != null) {
               	  	System.out.println("\n"+ negociacao.mostrar() + "\n");
               	}

               	else {
                		System.out.println("\n"+ "Um aumento de salario esta sendo negociado..."+ "\n");
              	    System.out.println("\n"+ "...negociacao acertada com o clube de origem." + "\n");
             		}

                try {
	                  Thread.sleep(100);
           	    }
	     	        catch(InterruptedException e) {}

            } // fim do for da negociacao

        } // fim do for do campeonato


        /* TESTANDO O TORNEIO COPA */

        int numeroFase = 1;
        int numeroRodadas = teste.getTorneio(1).getNumeroRodadas();
        RepositorioClubes clubes = null;

        System.out.println("\n"+"\n"+"Inicio da Copa\n\n");
        for ( i = 0; i < numeroRodadas; i = i+2) {
            System.out.println("\n\nFASE " + numeroFase + ":");
            ((Copa) teste.getTorneio(1)).iniciarFase();
//            System.out.println("Times na fase: " + ((Copa) teste.getTorneio(1)).getFaseAtual().getClubes().toString());
            ((Copa) teste.getTorneio(1)).geraPartidasFase();
            teste.executarTorneio(1,0);
            teste.executarTorneio(1,1);
            System.out.println(((Copa) teste.getTorneio(1)).getFaseAtual().toString());
            clubes = ((Copa) teste.getTorneio(1)).classificados();
            System.out.println("CLASSIFICADOS : " + clubes.toString() + "\n");
            teste.getTorneio(1).setClubes(clubes);
            numeroFase = numeroFase + 1;

            try {
                Thread.sleep(100);
            }
            catch(InterruptedException e) {}

            rand = (int) (Math.random() * 5);

            for(int j = 0;j<rand;j++) {
                Negociacao negociacao = new Negociacao(teste.getTorneio(0).getClubes());

              	if (negociacao != null && negociacao.getLeilao() != null) {
                    System.out.println("\n"+ negociacao.mostrar() + "\n");
               	}

               	else {
                    System.out.println("\n"+ "Um aumento de salario esta sendo negociado..."+ "\n");
                    System.out.println("\n"+ "...negociacao acertada com o clube de origem." + "\n");
         	}

                try {
                    Thread.sleep(100);
                }
                catch(InterruptedException e) {}

            } // fim do for da negociacao
        }

        System.out.println("CAMPEAO -> " + clubes.toString());

    }
}

