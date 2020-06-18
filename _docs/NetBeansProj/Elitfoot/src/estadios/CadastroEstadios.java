/*
 * Projeto Elifoot
 *
 * Tipo: CadastroEstadios
 */

package estadios;


/**
 * CadastroEstadios representa um cadastro de estadios dos torneios
 *
 * @author: Andre, Carlos, Francisco, Mardoqueu, Renato
 *
 */
public class CadastroEstadios {

    // Repositorio de Estadios
    private RepositorioEstadios estadios;

    /**
     * Construtor da classe CadastroEstadios
     *
     */
    public CadastroEstadios() {
        this.estadios = null;
    }

    /**
     * Construtor da classe CadastroEstadios
     *
     * @param estadios    Um repositorio de estadios
     *
     */
    public CadastroEstadios(RepositorioEstadios estadios) {
        this.estadios = estadios;
    }

    /**
     * Insere um estadio no conjunto de estadio
     *
     * @param estadio          um estadio a ser inserido no conjunto
     *
     */
    public void inserir(Estadio estadio) {
        if (this.estadios == null) {
            this.estadios = new ConjuntoEstadios();

        }// fim do if (this.estadios == null)

        if (estadio == null) {
            throw new NullPointerException ("Estadio nulo");

        } //fim do if (estadio == null)

        else {
            this.estadios.inserir(estadio);
        }
    }

    /**
     * Retorna o numero de estadios no conjunto
     *
     * @return          o numero de elementos inseridos no array conjunto
     *
     */
    public int numeroElementos() {

        if (this.estadios == null) {
            throw new NullPointerException ("Repositorio de estadios nulo");

        } //fim do if (this.estadios == null)

        return this.estadios.numeroElementos();
    }

    /**
     * Verifica se um estadio pertence ou não a um conjunto de estadio
     *
     * @param estadio   um estadio a ser verificado
     *
     * @return          true se o estadio pertencer ao conjunto ou false caso contrário
     *
     */
    public boolean pertence(Estadio estadio) {

        if (this.estadios == null) {
            throw new NullPointerException ("Repositorio de estadios nulo");

        } //fim do if (this.estadios == null)

        return this.estadios.pertence(estadio);
    }

    /**
     * Retorna um estadio do cadastro de estadios de acordo com um índice
     *
     * @param n        a posicao do estadio no array conjunto
     *
     * @return         o estadio da posicao n
     *
     */
    public Estadio getEstadio(int n) {

        if (this.estadios == null) {
            throw new NullPointerException ("Repositorio de estadios nulo");

        } //fim do if (this.estadios == null)

        return this.estadios.getEstadio(n);
    }

    /**
     * Retorna a posição de um estadio no cadastrode estadios
     *
     * @param estadio  um estadio do cadastro de estadios
     *
     * @return         um inteiro representando a posicao do estadio no conjunto
     *
     */
    public int getPosicao(Estadio estadio) {

        if (this.estadios == null) {
            throw new NullPointerException ("Repositorio de estadios nulo");

        } //fim do if (this.estadios == null)

        return this.estadios.getPosicao(estadio);
    }
    

    /**
     * Retorna uma string que descreve o objeto
     *
     */
    public String toString() {
        return estadios.toString();

    }

    /**
     * Metodo para testar a classe
     *
     */
    public static void main(String a[]) {

        Estadio estadio1, estadio2;

        estadio1 = new Estadio(34567, "Barradão");
        estadio2 = new Estadio (23451, "Maracanã");

        RepositorioEstadios r = new ConjuntoEstadios();

        CadastroEstadios c = new CadastroEstadios();
        c.inserir(estadio1);
        c.inserir(estadio2);
        System.out.println(c.toString());

    }

}



