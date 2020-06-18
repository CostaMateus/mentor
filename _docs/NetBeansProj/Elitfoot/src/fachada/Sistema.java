/*
 * Projeto Elifoot
 *
 * Tipo: Sistema
 */

package fachada;

import torneio.CadastroTorneios;
import clubes.CadastroClubes;
import jogadores.CadastroJogadores;
import estadios.CadastroEstadios;

import torneio.RepositorioTorneios;
import clubes.RepositorioClubes;
import jogadores.RepositorioJogadores;
import estadios.RepositorioEstadios;

import torneio.Torneio;
import clubes.Clube;
import jogadores.Jogador;
import estadios.Estadio;
import partidas.Rodada;


/**
 * Sistema é a classe que representa a fachada da aplicacao
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 */
public class Sistema {
	
    //Um cadastro de torneios	
    private CadastroTorneios torneios;
    //Um cadastro de clubes	    
    private CadastroClubes clubes;
    //Um cadastro de jogadores
    private CadastroJogadores jogadores;
    //Um cadastro de estadios
    private CadastroEstadios estadios;
    
    /**
     * Construtor default do Sistema
     */
    public Sistema() {
        this.torneios = null;
        this.clubes = null;
        this.jogadores = null;
        this.estadios = null;
    }

    /**
     * Construtor que recebe alguns cadastros do Sistema
     *
     * @param clubes    Um cadastro de clubes
     * @param jogadores Um cadastro de jogadores
     * @param estadios  Um cadastro de estadios
     *
     */
    public Sistema(CadastroClubes clubes,CadastroJogadores jogadores,
                   CadastroEstadios estadios) {
        this.torneios = null;
        this.clubes = clubes;
        this.jogadores = jogadores;
        this.estadios = estadios;
    }

    /**
     * Construtor que recebe alguns cadastros do Sistema
     *
     * @param torneios  Um cadastro de torneios
     * @param clubes    Um cadastro de clubes
     * @param jogadores Um cadastro de jogadores
     * @param estadios  Um cadastro de estadios
     *
     */
    public Sistema(CadastroTorneios torneios,CadastroClubes clubes,
                   CadastroJogadores jogadores,CadastroEstadios estadios) {
        this.torneios = torneios;
        this.clubes = clubes;
        this.jogadores = jogadores;
        this.estadios = estadios;
    }

    
    
/******************** Metodos referentes ao cadastro de torneios ***********************/


    /**
     * Insere um torneio na lista de torneios
     *
     * @param          um torneio a ser inserido na lista
     *
     */
    public void inserir(Torneio torneio) {
    	if ( this.torneios == null ) {
            this.torneios = new CadastroTorneios();
            
        }// fim do if ( this.torneios == null ) 
        
        this.torneios.inserir(torneio);
    }
    
    /**
     * Remove um torneio da lista de torneios
     *
     * @param          um torneio a ser removido na lista
     *
     */
    public void remover(Torneio torneio) {
        if ( this.torneios != null ) {
            this.torneios.remover(torneio);
             
        } // fim do if ( this.torneios == null )      
        
        else { 
            throw new NullPointerException("O cadastro de torneios é nulo");
        }    
    }

    /**
     * Retorna o numero de torneios na lista
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroTorneios() {
        return this.torneios.numeroElementos();
    }

    /** 
     * Verifica se torneio pertence ao cadastro de torneios   
     *
     * @param  torneio  Um torneio 
     *                  
     * @return           true se torneio pertence ao cadastro de torneios e false caso contrario 
     *                  
     */              
    public boolean pertence(Torneio torneio) {
        return this.torneios.pertence(torneio); 
    }
    
    
   
    /**
     * Retorna um torneio do Cadastro de torneios
     *
     * @param  n   A posicao do torneio no array conjunto
     *
     * @return     O torneio da posicao n
     *
     */
    public Torneio getTorneio(int n) {
        return this.torneios.getTorneio(n);        
    }

    /**
     * Retorna um torneio da lista de torneios
     *
     * @param  n       o n-esimo torneio
     * @param  rodada  a n-esima rodada do torneio
     *
     * @return         A n-esima rodada com as pardidas executadas
     *
     */
    public Rodada executarTorneio(int n,int rodada) {
        return this.torneios.executarTorneio(n,rodada);        
    }


  
/******************** Metodos referentes ao cadastro de clubes ***********************/    

    /**
     * Insere um clube na lista de clubes
     *
     * @param clube  Um clube a ser inserido na lista
     *
     */
    public void inserir(Clube clube) {
    	if ( this.clubes == null ) {
            this.clubes = new CadastroClubes();
        } // fim do if ( this.clubes == null )
        
        this.clubes.inserir(clube);
    }
    
    /**
     * Remove um clube da lista de clubes
     *
     * @param  clube  um clube a ser removido na lista
     *
     */
    public void remover(Clube clube) {
        this.clubes.remover(clube); 
    }
 
    /**
     * Retorna o numero de clubes na lista
     *
     * @param  nome     O nome de um clube do cadastro de clubes
     * @param  jogador  O nome de um clube do cadastro de clubes
     *
     * @return          o numero de elementos inseridos no array conjunto
     */
    public void inserir(String nome,Jogador jogador) {
       	 this.clubes.inserir(nome,jogador);
    }	
    
    /**
     * Retorna o numero de clubes do cadastro de clubes
     *
     * @return      O numero de clubes.
     *
     */
    public int numeroClubes() {
    	int resultado = 0;
    	if ( this.clubes != null ) {
    	    resultado = this.clubes.numeroElementos();
        }// fim do if ( this.clubes != null )
        
        else {
    	    throw new NullPointerException();
        }    	    
    	    
    	return resultado;    
    }

   
    /**
     * Verifica se um estadio pertence ou não a um conjunto de estadio
     *
     * @param  clube   Um clube a ser verificado
     *
     * @return          true se o estadio pertencer ao cadastro e false caso contrário
     *
     */
    public boolean pertence(Clube clube) {
    	return this.clubes.pertence(clube); 
    }
    
    /**
     * Verifica se um estadio pertence ou não a um conjunto de estadio
     *
     * @param  jogador   Um clube a ser verificado
     *
     * @return          true se o estadio pertencer ao cadastro e false caso contrário
     *
     */
    public boolean pertence(Jogador jogador) {
        return this.clubes.pertence(jogador);
    }	    
   
    /**
     * Retorna um clube da lista de clubes
     *
     * @param  n     a posicao do clube no array conjunto
     *
     * @return       o clube da posicao n
     *
     */
    public Clube getClube(int n) {
        return this.clubes.getClube(n);        
    }


    /**
     * Retorna a posição de um clube na lista de clubes
     *
     * @param  clube   um clube do cadastro de clubes
     *
     * @return         um inteiro relativo a posicao do clube do cadastro
     *
     */
    public int getPosicao(Clube clube) {
        return this.clubes.getPosicao(clube);     
    }

/******************** Metodos referentes ao cadastro de jogadores ***********************/    


    /**
     * insere um jogador no conjunto de jogadores
     *
     * @param jogador   um Jogador a ser inserido no cadastro
     *
     */
    public void inserir(Jogador jogador) {
    	if ( this.jogadores == null ) {
    	   this.jogadores = new CadastroJogadores();
        }// fim do if ( this.jogadores == null )

        this.jogadores.inserir(jogador);
    }


    /**
     * remove um jogador no conjunto de jogadores
     *
     * @param  jogador  um Jogador a ser removido do cadastro
     *
     */
    public void remover(Jogador jogador) {
        this.jogadores.remover(jogador);
    }
 
   

    /**
     * retorna um jogador qualquer do elenco de uma determinada
     * posicao (zagueiro, atacante, ...)
     *
     * @param  posicap  a posicao de um jogador
     *
     * @return          um Jogador do elenco
     */
    public Jogador getJogadorElenco(int posicao) {
        return this.jogadores.getJogadorElenco(posicao);
    }

   
    /**
     * Retorna os goleiros do elenco no momento
     *
     *
     * @return       o conjunto dos goleiros do elenco
     */
    public RepositorioJogadores getGoleiros() {
        return this.jogadores.getGoleiros();
    }

    /**
     * Retorna os zagueiros do cadastro
     *
     *
     * @return       O repositorio de zagueiros do cadastro de jogadores
     */
    public RepositorioJogadores getZagueiros() {
        return this.jogadores.getZagueiros();
    }

    /**
     * Retorna os meio-campistas do cadastro
     *
     *
     * @return       O repositorio de meio campistas do cadastro de jogadores
     */
    public RepositorioJogadores getMeioCampistas() {
        return this.jogadores.getMeioCampistas();
    }

    /**
     * retorna os atacantes do elenco no momento
     *
     *
     * @return       O repositorio de atacantes do cadastro de jogadores
     */
    public RepositorioJogadores getAtacantes() {
        return this.jogadores.getAtacantes();
    }

    
    /**
     * Retorna o numero de jogadores do elenco
     *
     * @return Um inteiro que informa o numero de jogadores do cadastro de jogadores
     */
    public int numeroJogadores() {
        return this.jogadores.numeroElementos();
    }

/******************** Metodos referentes ao cadastro de estadios  ***********************/

    /**
     * Insere um estadio no cadastro de estadios
     *
     * @param estadio  um estadio a ser cadastrado
     *
     */
    public void inserir(Estadio estadio) {
    	if ( this.estadios == null ) {
    	   this.estadios = new CadastroEstadios();
        }// fim do if ( this.estadios == null )

        this.estadios.inserir(estadio);
    }

    /**
     * Retorna o numero de estadios na lista
     *
     * @return   o numero de estadios do cadastro de estadios
     *
     */
    public int numeroEstadios() {
        return this.estadios.numeroElementos();
    }
    
    /**
     * Verifica se um estadio pertence ou não a um conjunto de estadio
     *
     * @param estadio   um estadio a ser verificado
     *
     * @return          true se o estadio pertencer ao cadastro ou false caso contrário
     *
     */
    public boolean pertence(Estadio estadio) {
        return this.estadios.pertence(estadio);
    }

    /**
     * Retorna um estadio da lista de estadios de acordo com um índice
     *
     * @param  n   o n-esimo estadio do cadastro
     *
     * @return         o estadio da posicao n
     */
    public Estadio getEstadio (int n) {
        return this.estadios.getEstadio(n);
    }

    

    /**
     * Retorna a posição de um estadio na lista de estadios
     *
     * @param  estadio  um estadio do cadastro de estadios
     *
     * @return         um inteiro representando a posicao do estadio no cadastro
     */
    public int getPosicao(Estadio estadio) {
        return this.estadios.getPosicao(estadio);
    }


    


}	