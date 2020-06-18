/*
 * Projeto Elifoot
 *
 * Tipo: Torneio
 */

package torneio;

import clubes.Clube;
import clubes.ConjuntoClubes;
import clubes.RepositorioClubes;
import partidas.Rodada;

/**
 *  Torneio é um tipo abastrato de dados que representa
 *  as regras que qualquer campeonato,copa,liga,etc. deve
 *  seguir.
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 * @see torneio 
 */
public abstract class Torneio {

    //Conjunto dos clubes que estao particpando do torneio
    private RepositorioClubes clubes;

    //Um conjunto de rodadas numa certa ordem.
    private RepositorioRodadas sequencia;

    /**
     *  Contrutor default.
     */
    public Torneio() {
        this.clubes = null;
        this.sequencia = new SequenciaRodadas();
    }

    /**
     *  Contrutor
     *
     * @param clubes     Repositorio de clubes
     *
     */
    public Torneio(RepositorioClubes clubes) {
        if (clubes != null) {
            this.clubes = clubes;
            this.sequencia = new SequenciaRodadas();
        }//fim do if (clubes != null)

        else {
            throw new NullPointerException("O repositorio de clubes é nulo.\n");
        }
    }

    /**
     * Insere um clube no repositorio de clubes
     *
     * @param  clube     um clube a ser inserido no repositorio de clubes
     *
     */
    public void inserir(Clube clube) {
        if (this.clubes == null) {
            this.clubes = new ConjuntoClubes();
        }// fim do if (this.clubes == null)
        
        this.clubes.inserir(clube);
    }

    /**
     * Metodo que executa uma rodada do torneio por completo
     *
     * @param rodada  a rodada-esima do campeonato
     *
     * @return   Uma Rodada com suas partidas ja executadas.
     */
    public abstract Rodada executar(int rodada);

    /**
     * Retorna a sequencia de rodadas do campeonato
     *
     * @return  Um repositorio de rodadas de rodadas de torneio.
     */
    public RepositorioRodadas getSequencia() {
        return this.sequencia;
    }

    /**
     * Retorna o numero da clubes do campeonato
     *
     * @return  O numero de Clubes do Campeonato.
     */
    public int getNumeroClubes() {
        return this.clubes.numeroElementos();
    }

    /**
     * Retorna o numero de rodadas do campeonato
     *
     * @return  O numero de Rodadas do Campeonato.
     */
    public abstract int getNumeroRodadas();

    /**
     * Seta o conjunto de clubes atual para o parametro passado
     *
     * @param  clubes    Um repositorio de clubes
     */
    public void setClubes(RepositorioClubes clubes) {
         this.clubes = clubes;
    }

    /**
     * Retorna o repositorio de clubes atual.
     *
     * @return     Um repositorio de clubes.
     */
    public RepositorioClubes getClubes() {
        return this.clubes;
    }
}
