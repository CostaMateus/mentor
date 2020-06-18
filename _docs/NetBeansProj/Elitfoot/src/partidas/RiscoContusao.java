/*
 * Projeto Elifoot
 *
 * Tipo: Substituicao
 */

package partidas;


import jogadores.Jogador;
import jogadores.Elenco;
import jogadores.RepositorioJogadores;
import clubes.Clube;
import estadios.Estadio;
import partidas.substituicao.Substituicao;

/**
 *  RiscoContusao representa a probabilidade de um jogador de determinada posicao,
 * pertencendo ao elenco titular do time da casa, se contundir na partida em execucao.
 *  A probabilidade de um jogador se contundir leva em conta tanto a posicao do jogador 
 * agredido, quanto a do agressor.
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public class RiscoContusao {


    // Clube da casa
    private Clube casa;
    
    // Clube visitante
    private Clube visitante;
    
    // Jogador contundido
    private Jogador jogadorContusao;
    
    // Jogador 
    private Jogador jogador;
    
    // Jogador substituindo o que se contundiu
    private Jogador jogadorSubstituto;
    
    // Atributo de permissao para substituicao do jogador contundido
    private boolean substituicaoJogador;
    
    // Atributo que representa o resultado da avaliacao da contusao
    private String respostaContusao;
    
    // Atributo para testar condicao de saida de laco
    private boolean condicao;
    
    // Atributo para testar condicao se houve contusao de jogador
    private boolean contusao;
    
    int rand = 0;

    /**
     * Construtor da classe.
     *
     * Avalia possibilidade de jogadores de qualquer um dos dois clubes se contundirem
     *
     * @param  casa        o clube da casa
     * @param  visitante   o clube visitante
     *
     */    
    public RiscoContusao(Clube casa, Clube visitante) {
        this.casa = casa;
        this.visitante = visitante;
        jogadorContusao = null; 
        jogadorSubstituto = null;
        respostaContusao = "";
        jogador = null;

        if (casa != null) {
            if (visitante != null) {
            	gerarRiscoContusao();
            }//if (visitante != null) 
    
            else {
                throw new NullPointerException("casa  null");
            }
        } //if (casa != null)
        
        else {
            throw new NullPointerException("visitante  null");
        }
            
    }
        
    /**
     *   Inicia o processo que pode levar a uma contusao, e a uma possivel reposicao
     * ou substituicao.
     *
     * @param  casa        o clube da casa
     * @param  visitante   o clube visitante
     *
     */    
    private void gerarRiscoContusao() {
        int posicao;
        int rand;
        String resposta;
        boolean opcao;
        condicao = true;
        
        
        if (ocorreContusao()) {
            
            rand = (int) (Math.random() * 100) % 2;
            
            if (rand == 0) {
                opcao = true;
            }// if (rand == 0)
            
            else {
            	opcao = false;
            }
            
                
            if (permiteReporJogador(opcao)) {
            	
            	removerJogador();
            	reporJogadorCampo(); 
            	substituicaoJogador = false;
            	
            }//if (permiteReporJogador(opcao)) 
            
            else if (jogadorContusao != null) {
            	
            	   // A preferencia é substituir por outro da mesma posicao
            	 posicao = jogadorContusao.getPosicao();
            	
            	 do {
            	     
            	     if (existeSubstituto(posicao) ) {
            	     	    
            	        jogadorSubstituto = casa.getElenco().getJogadorReserva(posicao);
            	     
            	        Substituicao substituicao = new Substituicao(jogadorContusao, jogadorSubstituto, casa);
            	        removerDaReserva();
            	        substituicaoJogador = true;
            	     }//if (existeSubstituto(posicao) )
            	     
            	     else {
            	     // caso nao seja possivel, escolhe-se jogador de outra posicao
            	     // assume-se que goleiro nunca se contunde
            	         posicao = (int) ((Math.random() * 1000) % 3) + 2;  
            	     }
            	    
            	     if ((casa.getElenco().getZagueirosReservas().numeroElementos() +
            	             casa.getElenco().getMeiasReservas().numeroElementos() +
            	             casa.getElenco().getAtacantesReservas().numeroElementos()) == 0) {                              
            	          condicao = false;
            	     }
                 } while (condicao);
                 
            } // else if (jogadorContusao != null)
           
            else {
                throw new NullPointerException("jogadorContusao eh null");
            }

            jogadorContusao = null;
         
        } // if (ocorreContusao(clube1,clube2))

        
    }
        
    /**
     *   Verifica a existencia ou nao de um jogador substituto no banco de reservas
     * da equipe do jogador contundido.
     *
     * @param  casa        o clube da casa
     * @param  visitante   o clube visitante
     *
     */    
    private boolean existeSubstituto(int posicao) {
    	boolean retorno = false;
        
        switch(posicao) {
        
        case Jogador.ZAGUEIRO:
            if (casa.getElenco().getZagueirosReservas().numeroElementos() > 0) {
                retorno = true;
            	condicao = false;
            }
            break;
            	     
        case Jogador.MEIOCAMPO:
            if (casa.getElenco().getMeiasReservas().numeroElementos() > 0) {
                retorno = true;
            	condicao = false;
            }
            break;
            	         
        case Jogador.ATACANTE:
            if (casa.getElenco().getAtacantesReservas().numeroElementos() > 0) {
                retorno = true;
            	condicao = false;
            }
            break;
        }
        
        return retorno;
    }

    /**
     *   Remove um jogador do elenco do time reserva do time da casa.
     *
     * @param  casa        o clube da casa
     * @param  visitante   o clube visitante
     *
     */    
    private void removerDaReserva() {
        switch(jogadorContusao.getPosicao()) {
                 	
        case Jogador.ZAGUEIRO:
            casa.getElenco().getZagueirosReservas().remover(jogadorContusao);
            break;  
        
        case Jogador.MEIOCAMPO:
            casa.getElenco().getMeiasReservas().remover(jogadorContusao);
            break;
        
        case Jogador.ATACANTE:
            casa.getElenco().getAtacantesReservas().remover(jogadorContusao);                 
            break;
        }
   }


    /**
     *  Avalia possibilidade de ocorrencia de contusao de um jogador 
     * escolhido aleatoriamente entre os titulares do time da casa.
     *
     *
     * @return  true se ocorreu contusao de jogador do time da casa.
     *          false caso contrario
     */
    private boolean ocorreContusao() {
        int posicao;
        contusao = false;
        
        posicao = (int) ((Math.random() * 1000) % 3) + 2; // goleiro nao é escolhido
        
        
        switch(posicao) {
        	
        case Jogador.ZAGUEIRO:
            //atacante X zagueiroAdversario: 50%, atacante X MeiaAdversario: 40%, 
            //atacante X AtacanteAdversario: 10%                                        
            jogador = casa.getElenco().getZagueirosTitulares().getJogador();
            contusao = avaliarAgressaoAdversario(25, 50);
            break;  
        case Jogador.MEIOCAMPO:
            //meioCampista X DefesaAdversaria: 35%, meioCampista X MeiaAdversario: 50% 
            //meioCampista X AtaqueAdversario: 15%
            jogador = casa.getElenco().getMeiasTitulares().getJogador();
            contusao = avaliarAgressaoAdversario(35, 50);
            break;
        case Jogador.ATACANTE:
            //zagueiro X DefesaAdversaria: 25%, zagueiro X MeioCampoAdversario: 50%
            //zagueiro X AtaqueAdversario: 25%
            jogador = casa.getElenco().getAtacantesTitulares().getJogador();
            contusao = avaliarAgressaoAdversario(35, 50);
            break;
        }
        return contusao;
    }
        
    /**
     *  Avalia a intensidade da agressao de acordo com a media da agressividade
     * dos jogadores da posicao do jogador agressor.
     * 
     * @param   percentualDefesa      percentual para haver risco de contusao contra um zagueiro adversario.
     * @param   percentualMeioCampo   percentual para haver risco de contusao contra um meio campo adversario.
     *
     * @return  true se ocorreu contusao de jogador do time da casa.
     *          false caso contrario
     */
    public boolean avaliarAgressaoAdversario(int percentualDefesa, int percentualMeioCampo) {
        
        //Jogador jogador;
        boolean retorno = false;

        rand = (int) (Math.random() * 1000); 
        rand = rand % 100; // seleciona um percentual para a posicao do agressor

        // atingido por zagueiro adversario
        if (rand <= percentualDefesa) { 
            if (visitante.getElenco().getZagueirosTitulares().numeroElementos() > 0) {
                if (visitante.getElenco().getMediaAgressaoZagueirosTitulares() > Jogador.VALORCONTUSAO) {
                    retorno = true;
                    jogadorContusao = jogador;
                    respostaContusao = new String("\n"+"Jogador " + jogadorContusao.getNome() + " do " + 
                                                  casa.getNome() + " se contundiu...\n...."); 
                }//if (visitante.getElenco().getMediaAgressaoZagueirosTitulares() > Jogador.VALORCONTUSAO)
                
            }//if (visitante.getElenco().getZagueirosTitulares().numeroElementos() > 0)
            
        }//if (rand <= percentualDefesa)
        
        // atingido por meia adversario
        else if(rand > percentualDefesa  
                &&rand <= (percentualDefesa+percentualMeioCampo) )
        {        
            if (visitante.getElenco().getMeiasTitulares().numeroElementos() > 0) {
                if (visitante.getElenco().getMediaAgressaoMeiasTitulares() > Jogador.VALORCONTUSAO) {
                    retorno = true;
                    jogadorContusao = jogador;
                    respostaContusao = new String("\n"+"Jogador " + jogadorContusao.getNome() + " do " +
                                                 casa.getNome() + " se contundiu...\n...."); 
                }//if (visitante.getElenco().getMediaAgressaoMeiasTitulares() > Jogador.VALORCONTUSAO)
            
            }//if (visitante.getElenco().getMeiasTitulares().numeroElementos() > 0)
        
        }//else if(rand > percentualDefesa  
                //&&rand <= (percentualDefesa+percentualMeioCampo) )
        
        // atingido por atacante adversario
        else if (visitante.getElenco().getAtacantesTitulares().numeroElementos() > 0) {
            if (visitante.getElenco().getMediaAgressaoAtacantesTitulares() > Jogador.VALORCONTUSAO) {
                retorno = true;
                jogadorContusao = jogador;
                respostaContusao = new String("Jogador " + jogadorContusao.getNome() + " do " + 
                                              casa.getNome() + " se contundiu...\n...."); 
            }//if (visitante.getElenco().getMediaAgressaoAtacantesTitulares() > Jogador.VALORCONTUSAO)
        
        }//else if (visitante.getElenco().getAtacantesTitulares().numeroElementos() > 0)
        
        return retorno;

    }

    /**
     *   Retorna a opcao de aceitar ou nao a reposicao em campo do jogador contundido.
     * 
     * @param   opcao  de aceitar ou nao a reposicao em campo do jogador contundido.
     *
     * @return  true se a reposicao foi aceita
     *          false caso contrario
     */
    public boolean permiteReporJogador(boolean opcao) {
    	return opcao;
    }

    /**
     *  Retir o jogador contundido de campo e o poe na reserva.
     *
     */
    private void removerJogador() {
    	
        switch(jogadorContusao.getPosicao()) {

        case Jogador.ZAGUEIRO:
            casa.getElenco().getZagueirosTitulares().remover(jogadorContusao);
            casa.getElenco().getZagueirosReservas().inserir(jogadorContusao);
            break;
        
        case Jogador.MEIOCAMPO:
            casa.getElenco().getMeiasTitulares().remover(jogadorContusao);
            casa.getElenco().getMeiasReservas().inserir(jogadorContusao);
            break;
        
        case Jogador.ATACANTE:
            casa.getElenco().getAtacantesTitulares().remover(jogadorContusao);
            casa.getElenco().getAtacantesReservas().inserir(jogadorContusao);
            break;
        }
    }
    	
    /**
     *  Repoe em campo o jogador contundido 
     *
     */
    private void reporJogadorCampo() {
        removerDaReserva();
        inserirJogadorJogo();
    }
     
    /**
     *  Insere o jogador contundido entre os titulares do seu time.
     *
     */
    private void inserirJogadorJogo() {  
        switch(jogadorContusao.getPosicao()) {

        case Jogador.ZAGUEIRO:
            casa.getElenco().getZagueirosTitulares().inserir(jogadorContusao);
            break;
        
        case Jogador.MEIOCAMPO:
            casa.getElenco().getMeiasTitulares().inserir(jogadorContusao);  
            break;
        
        case Jogador.ATACANTE:
            casa.getElenco().getAtacantesTitulares().inserir(jogadorContusao);
            break;
        }
    }
    
    /**
     *  Retorna uma String representando resultado da avaliacao do risco de contusao.
     *
     */
    public String toString() {
        String retorno = "";
        
        if (contusao) {
            if (substituicaoJogador) {
                retorno = new String("\n"+respostaContusao + "\n" + "Foi substituido por " + 
                          jogadorSubstituto.getNome());
            }//if (substituicaoJogador) 
            
            else {
                retorno = new String(respostaContusao + "\n" + "...Ja retornou a campo");
            }
        
        }//
        
        return retorno;
    }
    

    /**
     *  Metodo para testar a classe
     *
     */
    public static void main(String[] argc) {
        Clube time1,time2;
        int publico = 123540;
        Partida p;

        time1 = new Clube("SPORT",new Estadio(130000),new Elenco(),9);
        time2 = new Clube("NAUTICO",new Estadio(1500),new Elenco(),2);

        Jogador[] jogador = new Jogador[44];
        
        jogador[0] = new Jogador("Rogerio",9,1000,1,2);
        jogador[1] = new Jogador("Paulao",8,500,2,6);
        jogador[2] = new Jogador("Bordon",8,500,2,6);
        jogador[3] = new Jogador("Anderson",8,500,2,6);
        jogador[4] = new Jogador("Cafu",8,500,2,6);
        jogador[5] = new Jogador("Belleti",9,500,3,5);
        jogador[6] = new Jogador("Rai",8,500,3,4);
        jogador[7] = new Jogador("Fabiano",8,1000,3,6);
        jogador[8] = new Jogador("Souza",9,1000,4,5);
        jogador[9] = new Jogador("Evair",10,1000,4,6);
        jogador[10] = new Jogador("Franca",9,1000,4,6);
        jogador[11] = new Jogador("Clemer",6,1000,1,6);
        jogador[12] = new Jogador("Fabio Baiano",4,500,2,7);
        jogador[13] = new Jogador("Luis Alberto",5,500,3,3);
        jogador[14] = new Jogador("Alberico",5,1000,1,1);
        jogador[15] = new Jogador("Irani",4,500,4,6);
        jogador[16] = new Jogador("Tuta",6,1000,4,4);
        jogador[17] = new Jogador("Reinaldo",5,1000,4,6);
        jogador[18] = new Jogador("Petkovic",6,1000,3,3);
        jogador[19] = new Jogador("Le",6,1000,3,4);
        jogador[20] = new Jogador("Juan",5,500,Jogador.ZAGUEIRO,5);
        jogador[21] = new Jogador("Athirson",5,500,Jogador.ZAGUEIRO,4);
 
        jogador[22] = new Jogador("Rocha",7,500,Jogador.MEIOCAMPO,7);
        jogador[23] = new Jogador("Iranildo",7,500,Jogador.MEIOCAMPO,6);
        jogador[24] = new Jogador("Petkovic",7,1000,Jogador.MEIOCAMPO,7);
        jogador[25] = new Jogador("Le",6,1000,Jogador.MEIOCAMPO,8);
        jogador[26] = new Jogador("Tuta",6,1000,Jogador.ATACANTE,7);
        jogador[27] = new Jogador("Reinaldo",7,1000,Jogador.ATACANTE,7);
        jogador[28] = new Jogador("Evair",10,1000,Jogador.ATACANTE,6);
        jogador[29] = new Jogador("Franca",9,1000,Jogador.ZAGUEIRO,7);
        jogador[30] = new Jogador("Evair",10,1000,Jogador.ZAGUEIRO,7);
        jogador[31] = new Jogador("Franca",9,1000,Jogador.MEIOCAMPO,6);
        jogador[32] = new Jogador("Evair",10,1000,Jogador.ATACANTE,8);
        jogador[33] = new Jogador("Bosco",9,1000,Jogador.GOLEIRO,4);
        jogador[34] = new Jogador("Sandro Blum",8,500,Jogador.ZAGUEIRO,7);
        jogador[35] = new Jogador("Erlon",7,500,Jogador.ZAGUEIRO,7);
        jogador[36] = new Jogador("Marcio",7,500,Jogador.ZAGUEIRO,7);
        jogador[37] = new Jogador("Isaias",8,500,Jogador.ZAGUEIRO,7);
        jogador[38] = new Jogador("Sangalleti",9,500,Jogador.MEIOCAMPO,6);
        jogador[39] = new Jogador("Nildo",8,500,Jogador.MEIOCAMPO,7);
        jogador[40] = new Jogador("Lico",7,1000,Jogador.MEIOCAMPO,7);
        jogador[41] = new Jogador("Adriano",9,1000,Jogador.MEIOCAMPO,7);
        jogador[42] = new Jogador("Leonardo",10,1000,Jogador.ATACANTE,9);
        jogador[43] = new Jogador("Jackes",9,1000,Jogador.ATACANTE,7);

        
     	for (int k = 0; k < 22; k++) {
     	     time1.inserirJogador(jogador[k]);
     	}
        
     	for (int k = 22; k < 44; k++) {
     	     time2.inserirJogador(jogador[k]);
     	}
        
 
        time1.escolherTitulares(4,4,2);
        time2.escolherTitulares(4,3,3);
        p = new Partida(time1,time2,publico);
        
        RiscoContusao riscoContusao ;
        
        for (int i = 0; i < 5; i++) {
             riscoContusao = new RiscoContusao(time1, time2);
             System.out.println(riscoContusao.toString()+"\n");
        }

        
    }
    
    
}
