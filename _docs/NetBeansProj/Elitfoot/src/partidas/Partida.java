/**
 * Projeto Elifoot
 *
 * Tipo: Partida
 */

package partidas;

import clubes.Clube;
import estadios.Estadio;
import gols.Gol;
import gols.Placar;
import jogadores.Elenco;
import jogadores.Jogador;
import partidas.substituicao.Substituicao;

/**
 * Partida representa uma partida de futebol entre dois clubes.
 * Sao gerados o placar, o publico e os gols.
 *
 * @author Andre,Carlos,Francisco,Mardoqueu,Renato
 */
public class Partida {


    // Clube que joga em casa
    private Clube casa;

    // Clube que joga fora de casa
    private Clube visitante;

    // O placar da partida
    private Placar placar;

    // O publico a partida
    private int publico;

     // As substituicoes da partida
    private String substituicoes = "";
    
     // As contusoes da partida
    private String contusoes = "";

    /**
     * Construtor de Partida
     */
    public Partida() {
        this.casa = null;
        this.visitante = null;
        this.publico = 10000;
        this.placar = new Placar();
    }

    /**
     * Construtor de partida
     *
     * @param casa       Clube da Casa
     * @param visitante  Clube Visitante
     * @param publico    Um inteiro que representa o publico da partida
     *
     */
    public Partida(Clube casa, Clube visitante, int publico) {
        this.casa = casa;
        this.visitante = visitante;
        this.publico = publico;
        this.placar = new Placar();
    }

    /**
     * Gera o resultado da partida baseado nas propriedades dos clubes
     */
    public void gerarResultado() {
        int tempo;
        int rand;
        int minuto1;
        int minuto2;
        int forcaOfensivaCasa;
        int forcaOfensivaVisitante;
        int forcaDefensivaCasa;
        int forcaDefensivaVisitante;
        int fatorGolCasa;
        int fatorGolVisitante;
        int diferencaMorais;
        int moralCasa;
        int moralVisitante ;
        int capacidadeEstadio;
        int lotacao;
        double porcentagemLotacao;
        RiscoContusao riscoContusao1;
        RiscoContusao riscoContusao2;
        tempo = 0;
        rand = 0;
        forcaOfensivaCasa = casa.getForcaOfensiva();
        forcaDefensivaCasa = casa.getForcaDefensiva();
        forcaOfensivaVisitante = visitante.getForcaOfensiva();
        forcaDefensivaVisitante = visitante.getForcaDefensiva();

        // Verifica quem esta com maior moral
        diferencaMorais = casa.getMoral() - visitante.getMoral();
        // Pega a capacidade do estadio do time da casa
        capacidadeEstadio   = casa.getEstadio().getCapacidade();
        // Calcula a lotacao do Estadio
        porcentagemLotacao = (double) publico / capacidadeEstadio;

        // Se o publico lotar o estadio (publico maior que a metade da capacidade)
        // inclui um fator de lotacao
        if (porcentagemLotacao > 0.5) {
            lotacao = 1;

        }// fim do if(porcentagemLotacao > 0.5)

        else {
            lotacao = 0;

        }// fim do else (if(porcentagemLotacao > 0.5))

        // Ajusta os fatores de moral
        if (diferencaMorais < 0) {
            moralVisitante = - diferencaMorais;
            moralCasa = 0;

        }// fim do if (diferencaMorais < 0)

        else {
            moralCasa = diferencaMorais;
            moralVisitante = 0;

        }// fim do else (if(diferencaMorais < 0))


       	//fatorGolCasa = 1 + forca ofensiva
       	//+ (forca maxima de um jogador - forca defensiva do visitante )
        // + ponto por jogar em casa + ponto por publico
        // + fator em funcao da moral em rela�ao ao adversario;
        fatorGolCasa =
        1 + forcaOfensivaCasa + (10 - forcaDefensivaVisitante) + 1 + lotacao + moralCasa;

        // fatorGolVisitante = 1 + forca ofensiva
        // + ( forca maxima de um jogador - forca defensiva da casa )
        // + fator em funcao da moral em rela�ao ao adversario;
        fatorGolVisitante =
        1 + forcaOfensivaVisitante + (10 - forcaDefensivaCasa) + moralVisitante;

        //seleciona um minuto do primeiro tempo
        minuto1 = (int) (Math.random() * 1000) % 45;
        
        if (minuto1 == 0) {
            minuto1 = 1;
        }
        
        //seleciona um minuto do segundo tempo
        minuto2 = (int) ((Math.random() * 1000) % 45) + 45;
        
        if (minuto2 == 45) {
            minuto2 = 46;
        }
        
        // tempo vai de 0 a 90
        while (tempo < 90) {
       	    
       	    // Gera possivel contusao para cada clube durante o primeiro tempo
            if (tempo == minuto1) {
                riscoContusao1 = new RiscoContusao(casa, visitante);
                riscoContusao2 = new RiscoContusao(visitante, casa);
                contusoes = new String(riscoContusao1.toString() + riscoContusao2.toString());
                if (!contusoes.equals("") ) {
                    contusoes = new String(contusoes + " no primeiro tempo"+"\n");
                }//if (!contusoes.equals("") )
                
            }//if (tempo == minuto1)

       	    // Gera possivel contusao para cada clube durante o segundo tempo
            else if (tempo == minuto2) {
                riscoContusao1 = new RiscoContusao(casa, visitante);
                riscoContusao2 = new RiscoContusao(visitante, casa);
                contusoes = new String(contusoes + riscoContusao1.toString() + riscoContusao2.toString());
                if (!contusoes.equals("") ) {
                   contusoes = new String(contusoes + " no segundo tempo"+"\n");
                }//if (!contusoes.equals("") )
                
            }//else if (tempo == minuto2)

       	    if (tempo == 45) {
       	        
                int posicao1 = (int) ((Math.random() * 1000) % 3) + 2;
                int posicao2 = (int) ((Math.random() * 1000) % 3) + 2;
                    
                substituicoes = new String(substituicoes+substituir(casa,posicao1,posicao2));
                 
                int posicao3 = (int) ((Math.random() * 1000) % 3) + 2;
                int posicao4 = (int) ((Math.random() * 1000) % 3) + 2;
                                            
                substituicoes = new String(substituicoes+substituir(visitante,posicao3,posicao4));
                 
       	    }	//if (tempo == 45)        	    
       	    rand = (int) (Math.random() * 10000);
       	    rand = rand % 800;

            // Se cair na faixa de gol do time da casa
            if (rand <= fatorGolCasa) {
                geraGolCasa(tempo);

            } // fim do if(rand <= fatorGolCasa)

            //Se cair na faixa de gol do visitante
            else if(rand < (fatorGolCasa + fatorGolVisitante) ) {
                    geraGolVisitante(tempo);

            } // fim do else if(rand < (fatorGolCasa + fatorGolVisitante) )

            // Caso contrario o tempo corre
            tempo = tempo + 1;
        
        } // fim do while(tempo < 90)
    }


    /**
     * Metodo que realiza uma substituicao aleatoria de jogadores  
     * durante uma partida quando possivel
     *
     * @param   clube       o clube em que deve haver a substituicao  
     * @param   posicao1    a posicao do jogador a ser substituido (titular)
     * @param   posicao2    a posicao do jogador que deve substituir (reserva)
     *
     * @return              um string representando a substituicao se ocorreu
     *                      ou "" se a substituicao na ocorrer
     *
     */
    public String substituir(Clube clube,int posicao1, int posicao2){
        Substituicao substituicao = null;
        boolean podeSubstituir = true;                 
        Jogador titular = new Jogador();
        Jogador reserva = new Jogador();
                            
        switch(posicao1) {
                     	
            case Jogador.GOLEIRO : 
                     	       
                if(clube.getElenco().getGoleirosReservas().numeroElementos()==0) {
                    podeSubstituir = false;
                
                } // fim do  if(clube.getElenco().getGoleirosReservas().numeroElementos() == 0) 
                
                else {
                    titular = clube.getJogador(posicao1);     
                }
                break;                       
                        
            case Jogador.ZAGUEIRO : 
                     	        
                if(clube.getElenco().getZagueirosTitulares().numeroElementos()==0) {
                    podeSubstituir = false;
                
                } // fim do if(clube.getElenco().getZagueirosTitulares().numeroElementos()==0) 
                
                else {
                    titular = clube.getJogador(posicao1);  
                
                }
                break;
                        
            case Jogador.MEIOCAMPO : 
                     	       
                if(clube.getElenco().getMeiasTitulares().numeroElementos()==0) {
                    podeSubstituir = false;
                
                } // fim do if(clube.getElenco().getMeiasTitulares().numeroElementos()==0) 
                
                else {
                    titular = clube.getJogador(posicao1);  
                
                }    
                break;
                
            case Jogador.ATACANTE : 

                if(clube.getElenco().getAtacantesTitulares().numeroElementos()==0) {
                    podeSubstituir=false;
                
                } // fim do if(clube.getElenco().getAtacantesTitulares().numeroElementos()==0)    
                
                else {
                    titular = clube.getJogador(posicao1);  
                
                }
                break;
       	        
        }
       	              
       	              
       	switch(posicao2) {
                     	
            case Jogador.ZAGUEIRO : 
                    	         
                if(clube.getElenco().getZagueirosReservas().numeroElementos()==0) {
                    podeSubstituir = false;
                    
                } // fim do if(clube.getElenco().getZagueirosReservas().numeroElementos()==0)    
                
                else {
                    reserva = clube.getJogadorReserva(posicao2);
                
                }
                break;
                        
            case Jogador.MEIOCAMPO : 
                     	         
                if(clube.getElenco().getMeiasReservas().numeroElementos()==0) {
                    podeSubstituir=false;
                
                } // fim do if(clube.getElenco().getMeiasReservas().numeroElementos()==0)
                
                else {
                    reserva = clube.getJogadorReserva(posicao2);
                
                }
                break;
                
            case Jogador.ATACANTE : 
                     	          
                if(clube.getElenco().getAtacantesReservas().numeroElementos()==0) {
                    podeSubstituir=false;
                
                } // fim do if(clube.getElenco().getAtacantesReservas().numeroElementos()==0) 
   
                else {
                    reserva = clube.getJogadorReserva(posicao2);
       	        
       	        }
       	        break;
       	        
        }           
       	         
        if (podeSubstituir) {
       	    substituicao = new Substituicao(titular, reserva, clube);	
       	
       	} // fim do if (podeSubstituir) 
       	
        String resposta = new String();
       	
        if (substituicao != null) {
       	    resposta = new String(substituicao.toString());
        
        } // fim do if (substituicao != null) 
    
        return resposta;   	        
    }
       	        
    /**
     * Cria o gol e insere na lista de gols do time da casa
     *
     * @param tempo    O tempo em que ocorreu o gol
     *
     * @see partidas.Gol
     * @see partidas.Placar
     */
    private void geraGolCasa(int tempo) {
        Gol g;
        int rand;
        Jogador j;
        int posicaoJogador;

        rand = 0;
        j = new Jogador();

        // probabilidades de gols: atacante: 41%, meias: 34%, zagueiros: 25%.
        rand = (int) (Math.random() * 1000);
        rand = rand % 100;

        if (rand <= 25) {
            posicaoJogador = Jogador.ZAGUEIRO;

        }// fim do if (rand <= 25)

        else if (rand >= 26 && rand <= 60) {
                 posicaoJogador = Jogador.MEIOCAMPO;

        }// fim do if (rand >= 26 && rand <= 60) )

        else {
                 posicaoJogador = Jogador.ATACANTE;

        }// fim do else

        j = casa.getJogador(posicaoJogador);
        g = new Gol(j,tempo);
        placar.inserirGolCasa(g);
    }

    /**
     * Cria o gol e insere na lista de gols do visitante
     *
     * @param tempo   O tempo em que ocorreu o gol
     *
     * @see partidas.Gol
     * @see partidas.Placar
     */
    private void geraGolVisitante(int tempo) {
        Gol g;
        int rand;
        Jogador j;
        int posJogador;

        j = new Jogador();
        rand = (int) (Math.random() * 1000);
       	rand = rand % 100;

        // probabilidades de gols: atacante: 41%, meias: 34%, zagueiros: 25%.
        if (rand <= 25) {
            posJogador = Jogador.ZAGUEIRO;

        } // fim do if (rand <= 25)

        else if (rand >= 26 && rand <= 60) {
                 posJogador = Jogador.MEIOCAMPO;

        }// fim do if (rand >= 26 && rand <= 60)

        else {
                 posJogador = Jogador.ATACANTE;

        }

        j = visitante.getJogador(posJogador);
        g = new Gol(j,tempo);
        placar.inserirGolVisitante(g);
    }

    /**
     * Retorna o clube da casa
     *
     * @return O clube da Casa
     */
    public Clube getCasa() {
        return casa;
    }

    /**
     * Retorna o clube visitante
     *
     * @return O clube visitante
     */
    public Clube getVisitante() {
        return visitante;
    }

    /**
     * Retorna o placar da partida
     *
     * @return O placar da partida
     */
    public Placar getPlacar() {
        return placar;
    }

    /**
     * Retorna uma String que informa o resultado da partida
     *
     * @return Uma String com as informacoes da partida
     *
     * @see partidas.Clube
     * @see partidas.Placar
     */
    public String toString() {
        return (placar.getGolsPartida().toString()
                + substituicoes
                + contusoes                
                + casa.getNome() + ": " + placar.numGolsCasa()
                + "\n" + visitante.getNome() + ": "
                + placar.numGolsVisitante() + "\t"
                + "PUBLICO : " +  String.valueOf(publico) + "\n"
                + "\n");

    }

    /**
     * Metodo para testar a classe
     *
     */
    public static void main(String a[]) {
        Clube time1,time2;
        int publico = 123540;
        Partida p;

        time1 = new Clube("SPORT",new Estadio(130000),new Elenco(),9);
        time2 = new Clube("NAUTICO",new Estadio(1500),new Elenco(),2);

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
        p = new Partida(time1,time2,publico);

        System.out.println(p.toString());
    }
}
