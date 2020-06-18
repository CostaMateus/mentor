/*
 * Projeto Elifoot
 *
 * Tipo: Placar
 */

package gols;

import jogadores.Jogador;

/**
 * A classe Placar representa o placar de uma determinada partida
 * 
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see partidas
 */
public class Placar {


    // Lista de gols do time da casa
    private RepositorioGols golsCasa;

    // Lista de gols do time visitante
    private RepositorioGols golsVisitante;

    // Lista de gols da partida
    private RepositorioGols listaGolsJogo;

   /**
    * Construtor da classe Placar
    */
   public Placar() {
        golsCasa = new ListaGols();
        golsVisitante = new ListaGols();
        listaGolsJogo = new ListaGols();
    }

    /**
     * Adiciona um gol � listas de gols do time da casa e do jogo
     *
     * @param  g      um gol do time da casa
     *
     */
    public void inserirGolCasa(Gol g) {

        if (g == null) {
            throw new NullPointerException("Nao foi passado nenhum gol");

        }// fim do if (g == null)

        else {
            golsCasa.inserir(g);
            listaGolsJogo.inserir(g);
        }
    }

    /**
     * Adiciona um gol �s listas de gols do visitante e do jogo
     *
     *@param g O gol a ser inserido na lista de gols do visitante
     */
    public void inserirGolVisitante(Gol g ) {

        if (g == null) {
            throw new NullPointerException("Nao foi passado nenhum gol");

        }// fim do if (g == null)

        else {
            golsVisitante.inserir(g);
            listaGolsJogo.inserir(g);
        }
    }

    /**
     * Retorna a lista de gols do time da casa
     *
     * @return        o ConjuntoGols do time da casa
     */
    public RepositorioGols getGolsCasa() {
        return golsCasa;
    }

    /**
     * Retorna a lista de gols do time visitante
     *
     * @return        o ConjuntoGols do time visitante
     */
    public RepositorioGols getGolsVisitante() {
        return golsVisitante;
    }

    /**
     * Retorna a listagem(ordenada pelo tempo) de todos os gols
     * de uma partida
     *
     * @return       O ConjuntoGols do jogo
     */
    public RepositorioGols getGolsPartida() {
        return listaGolsJogo;
    }

    /**
     * Retorna o numero de gols da casa
     *
     * @ return      numero de elementos do conjunto de gols do time da casa
     */
    public int numGolsCasa() {
        return golsCasa.numeroDeElementos();
    }

    /**
     * Retorna o numero de gols do visitante
     *
     * @ return      numero de elementos do conjunto de gols do time visitante
     */
    public int numGolsVisitante() {
        return golsVisitante.numeroDeElementos();
    }

    /**
     * Retorna uma String que informa os gols do time da casa
     *
     */
    public String toStringCasa() {
        return golsCasa.toString();
    }

    /**
     * Retorna uma String que informa os gols do time da casa
     */
    public String toStringVisitante() {
        return golsVisitante.toString();
    }


    /**
     * Metodo para testar a classe
     *
     */
    public static void main(String a[]) {
        Placar p;
        Gol g1,g2,g3;
        Jogador j1,j2;

        j1 = new Jogador("Le",6,1000,Jogador.MEIOCAMPO);
        j2 = new Jogador("Liu",10,10000,Jogador.ATACANTE);

        g1 = new Gol(j1,10);
        g2 = new Gol(j2,44);
        g3 = new Gol(j2,90);

        p = new Placar();

        p.inserirGolVisitante(g1);
        p.inserirGolCasa(g2);
        p.inserirGolCasa(g3);

        System.out.println(p.getGolsPartida().toString() + "\n"
                           + "CASA : " + p.numGolsCasa()
                           + "\nVISITANTE : " + p.numGolsVisitante());
    }

}
