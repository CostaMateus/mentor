/*
 * Projeto Elifoot
 *
 * Tipo: CadastroTorneios
 */

package torneio;

import clubes.Clube;
import estadios.Estadio;
import jogadores.Elenco;
import jogadores.Jogador;
import partidas.Rodada;
import torneio.campeonato.Campeonato;

/**
 * CadastroTorneios representa uma colecao de torneios
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see torneio
 */
public class CadastroTorneios {

    //Interface com a lista de torneios
    private RepositorioTorneios torneios;

    /**
     * Construtor default da classe CadastroTorneios
     */
    public CadastroTorneios() {
        this.torneios = null;
    }

    /**
     * Construtor da classe CadastroTorneios
     *
     * @param torneios  Um repositorio de torneios
     *
     */
    public CadastroTorneios(RepositorioTorneios torneios) {
        if (torneios != null) {
            this.torneios = torneios;
        }// fim do if (torneios != null)
        else {
            throw new NullPointerException("O Repositorio é nulo");
        }
    }

    /**
     * Insere um torneio na lista de torneios
     *
     * @param torneio    um torneio a ser inserido no repositorio
     *
     */
    public void inserir(Torneio torneio) {
    	if (this.torneios == null ) {
    	   this.torneios = new ListaTorneio();
        }// fim do  if (this.torneios == null )

        this.torneios.inserir(torneio);
    }

    /**
     * Remove um torneio da lista de torneios
     *
     * @param torneio    um torneio a ser removido no repositorio
     *
     */
    public void remover(Torneio torneio) {
        this.torneios.remover(torneio);
    }

    /**
     * Retorna o numero de torneios na lista
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroElementos() {
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

    /**
     * Retorna uma string que descreve o objeto
     *
     * @return    uma string que representa um torneio
     */
    public String toString() {
        return this.torneios.toString();
    }

    /**
     * Metodo teste.
     */
    public static void main(String args[]) {
        int i,k;

        Jogador[] jogador = new Jogador[80];

        //TIME 1
        jogador[1] = new Jogador("Rogerio",9,1000,Jogador.GOLEIRO);
        jogador[2] = new Jogador("Paulao",8,500,Jogador.ZAGUEIRO);
        jogador[3] = new Jogador("Bordon",7,500,Jogador.ZAGUEIRO);
        jogador[4] = new Jogador("Anderson",7,500,Jogador.ZAGUEIRO);
        jogador[5] = new Jogador("Cafu",8,500,Jogador.ZAGUEIRO);
        jogador[6] = new Jogador("Belleti",9,500,Jogador.MEIOCAMPO);
        jogador[7] = new Jogador("Rai",8,500,Jogador.MEIOCAMPO);
        jogador[8] = new Jogador("Fabiano",7,1000,Jogador.MEIOCAMPO);
        jogador[9] = new Jogador("Souza",9,1000,Jogador.MEIOCAMPO);
        jogador[10] = new Jogador("Evair",10,1000,Jogador.ATACANTE);
        jogador[11] = new Jogador("Franca",9,1000,Jogador.ATACANTE);
        jogador[12] = new Jogador("Evair",10,1000,Jogador.GOLEIRO);
        jogador[13] = new Jogador("Franca",9,1000,Jogador.ZAGUEIRO);
        jogador[14] = new Jogador("Evair",10,1000,Jogador.ZAGUEIRO);
        jogador[15] = new Jogador("Franca",9,1000,Jogador.MEIOCAMPO);
        jogador[16] = new Jogador("Evair",10,1000,Jogador.ATACANTE);



        //TIME 2
        jogador[17] = new Jogador("Clemer",6,1000,Jogador.GOLEIRO);
        jogador[18] = new Jogador("Fabio Baiano",7,500,Jogador.ZAGUEIRO);
        jogador[19] = new Jogador("Luis Alberto",7,500,Jogador.ZAGUEIRO);
        jogador[20] = new Jogador("Juan",5,500,Jogador.ZAGUEIRO);
        jogador[21] = new Jogador("Athirson",5,500,Jogador.ZAGUEIRO);
        jogador[22] = new Jogador("Rocha",7,500,Jogador.MEIOCAMPO);
        jogador[23] = new Jogador("Iranildo",7,500,Jogador.MEIOCAMPO);
        jogador[24] = new Jogador("Petkovic",7,1000,Jogador.MEIOCAMPO);
        jogador[25] = new Jogador("Le",6,1000,Jogador.MEIOCAMPO);
        jogador[26] = new Jogador("Tuta",6,1000,Jogador.ATACANTE);
        jogador[27] = new Jogador("Reinaldo",7,1000,Jogador.ATACANTE);
        jogador[28] = new Jogador("Evair",10,1000,Jogador.ATACANTE);
        jogador[29] = new Jogador("Franca",9,1000,Jogador.ZAGUEIRO);
        jogador[30] = new Jogador("Evair",10,1000,Jogador.ZAGUEIRO);
        jogador[31] = new Jogador("Franca",9,1000,Jogador.MEIOCAMPO);
        jogador[32] = new Jogador("Evair",10,1000,Jogador.ATACANTE);


        //TIME 3
        jogador[33] = new Jogador("Bosco",9,1000,Jogador.GOLEIRO);
        jogador[34] = new Jogador("Sandro Blum",8,500,Jogador.ZAGUEIRO);
        jogador[35] = new Jogador("Erlon",7,500,Jogador.ZAGUEIRO);
        jogador[36] = new Jogador("Marcio",7,500,Jogador.ZAGUEIRO);
        jogador[37] = new Jogador("Isaias",8,500,Jogador.ZAGUEIRO);
        jogador[38] = new Jogador("Sangalleti",9,500,Jogador.MEIOCAMPO);
        jogador[39] = new Jogador("Nildo",8,500,Jogador.MEIOCAMPO);
        jogador[40] = new Jogador("Lico",7,1000,Jogador.MEIOCAMPO);
        jogador[41] = new Jogador("Adriano",9,1000,Jogador.MEIOCAMPO);
        jogador[42] = new Jogador("Leonardo",10,1000,Jogador.ATACANTE);
        jogador[43] = new Jogador("Jackes",9,1000,Jogador.ATACANTE);
        jogador[44] = new Jogador("Evair",10,1000,Jogador.GOLEIRO);
        jogador[45] = new Jogador("Franca",9,1000,Jogador.ZAGUEIRO);
        jogador[46] = new Jogador("Evair",10,1000,Jogador.ZAGUEIRO);
        jogador[47] = new Jogador("Franca",9,1000,Jogador.MEIOCAMPO);
        jogador[48] = new Jogador("Evair",10,1000,Jogador.ATACANTE);

        //TIME 4
        jogador[49] = new Jogador("Caetano",6,1000,Jogador.GOLEIRO);
        jogador[50] = new Jogador("Carlinhos",7,500,Jogador.ZAGUEIRO);
        jogador[51] = new Jogador("Marcio",7,500,Jogador.ZAGUEIRO);
        jogador[52] = new Jogador("Nildo",8,500,Jogador.ZAGUEIRO);
        jogador[53] = new Jogador("Lico",7,1000,Jogador.ZAGUEIRO);
        jogador[54] = new Jogador("Adriano",9,1000,Jogador.MEIOCAMPO);
        jogador[55] = new Jogador("Leonardo",10,1000,Jogador.MEIOCAMPO);
        jogador[56] = new Jogador("Jackes",9,1000,Jogador.MEIOCAMPO);
        jogador[57] = new Jogador("Caetano",6,1000,Jogador.MEIOCAMPO);
        jogador[58] = new Jogador("Carlinhos",7,500,Jogador.ATACANTE);
        jogador[59] = new Jogador("Luciano",7,500,Jogador.ATACANTE);
        jogador[60] = new Jogador("Evair",10,1000,Jogador.GOLEIRO);
        jogador[61] = new Jogador("Franca",9,1000,Jogador.ZAGUEIRO);
        jogador[62] = new Jogador("Evair",10,1000,Jogador.ZAGUEIRO);
        jogador[63] = new Jogador("Franca",9,1000,Jogador.MEIOCAMPO);
        jogador[64] = new Jogador("Evair",10,1000,Jogador.ATACANTE);

        CadastroTorneios teste = new CadastroTorneios();

        Estadio[] estadio = new Estadio[4];

        estadio[0] = new Estadio(10000);
        estadio[1] = new Estadio(70000);
        estadio[2] = new Estadio(15000);
        estadio[3] = new Estadio(120000);

        Clube[] time = new Clube[4];

        time[0] = new Clube("NAUTICO",estadio[3],new Elenco(),7);
        time[1] = new Clube("SAO PAULO",estadio[0],new Elenco(),8);
        time[2] = new Clube("FLAMENGO",estadio[1],new Elenco(),7);
        time[3] = new Clube("SPORT",estadio[2],new Elenco(),10);

        Torneio[] torneios = new Torneio[4];
        CadastroTorneios cadastro = new CadastroTorneios();

        for ( k = 0; k < 4; k++) {
            torneios[k] = new Campeonato();
            torneios[k].inserir(time[k]);
        }
        for ( k = 0; k < 4; k++) {
            cadastro.inserir(torneios[k]);
        }
    }
}