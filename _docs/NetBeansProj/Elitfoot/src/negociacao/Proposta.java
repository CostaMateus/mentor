/*
 * projeto : elifoot
 *
 * Tipo : Proposta
 *
 * 
 */

package negociacao;


import clubes.Clube;
import estadios.Estadio;

/**
 *   Proposta representa uma feita por um clube
 *
 * @author : Andre, Carlos, Francisco, Mardoqueu, Renato
 */
public class Proposta {


    // O clube que faz a proposta
    private Clube clube;

    // A proposta
    private int proposta;

   /**
    * O construtor da classe proposta
    *
    *@param clube O clube que faz a proposta
    *@param proposta A proposta feita
    */
    public Proposta(Clube clube,int proposta) {
        this.clube = clube;
        this.proposta = proposta;
    }

   /**
    * Retorna o valor da proposta
    *
    *@return A proposta
    */
    public int getValorProposta() {
        return proposta;
    }

   /**
    * Retorna o clube
    *
    *@return O clube que fez a proposta
    */
    public Clube getClubeProposta() {
        return clube;
    }

   /**
    * Metodo para testar a classe
    *
    */
    public static void main(String a[]) {

        Clube clube1;
        Proposta p;

        clube1 = new Clube("SPORT",new Estadio(100000));
        p = new Proposta(clube1,145000);

        System.out.println(p.getClubeProposta().getNome() + p.getValorProposta()  );
    }
}
