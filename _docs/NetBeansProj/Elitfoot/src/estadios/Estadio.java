/**
 * Projeto Elifoot
 *
 * Tipo: Estadio
 */

package estadios;;


/**
 * Estadio é um tipo que representa um estadio de futebol
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 */
public class Estadio {


    // Capacidade do estadio (espectadores)
    private int capacidade;

    // Nome do estadio
    private String nome;

    /**
     * Construtor default
     */
    public Estadio() {
        this.capacidade=10000;
    }

    /**
     * Construtor
     *
     * @param capacidade     A capacidade do estadio
     */
    public Estadio(int capacidade) {
        this.capacidade = capacidade;
        this.nome = "";
    }
    /**
     * Construtor
     *
     * @param capacidade    A capacidade do estadio
     * @param nome          O nome do estadio
     */
    public Estadio(int capacidade, String nome) {
        this.capacidade = capacidade;
        this.nome = nome;
    }

   /**
    * Retorna a capacidade atual do estadio
    *
    * @return Um inteiro que representa a capacidade de publico do estadio
    */
    public int getCapacidade(){
      	return capacidade;
    }

   /**
    * Retorna a capacidade atual do estadio
    *
    * @return  Retorna o nome do estadio
    */
    public String getNome(){
      	return nome;
    }

   /**
    * Ajusta a capacidade do estadio
    *
    * @param capacidade    A capacidade desejada
    */
    public void setCapacidade(int capacidade){
        this.capacidade = capacidade;
    }

   /**
    * Retorna um String que informa a capacidade do estadio
    *
    * @return     Uma string com informacoes sobre o estadio
    */
    public String toString() {
        return String.valueOf(capacidade);
    }

   /**
    * Metodo para testar a classe
    *
    */
    public static void main(String a[]) {

    	Estadio e;
    	e = new Estadio(120000, "Morumbi");

    	System.out.println("CAPACIDADE : " + e.toString());

    	e.setCapacidade(100000);

    	System.out.println("CAPACIDADE : " + e.toString());
    }


}
