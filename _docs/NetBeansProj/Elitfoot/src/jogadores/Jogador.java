/**
 * Projeto Elifoot
 *
 * Tipo: Jogador
 */

package jogadores;


/**
 * Jogador � um tipo que representa um jogador de futebol
 *
 * @author Andre,Carlos,Francisco,Mardoqueu,Renato
 */
public class Jogador implements InterfaceJogador {

    // Nome do Jogador
    private String nome;

    // For�a do Jogador
    private int forca;

    // O sal�rio do jogador
    private int salario;

    // Numero de Gols do Jogador na atual temporada
    private int numGols;

    //Posicao do Jogador
    private int posicao;

    // Valor do passe do jogador
    private long valorPasse;

    // numero de cartoes amarelos
    private int numeroCartaoAmarelo;

    // numero de cartoes vermelhos
    private int numeroCartaoVermelho;

    // informa se o jogador esta suspenso
    private boolean suspenso;

    // Numero de jogos de suspensao
    private int numeroJogosSuspenso;

    // Informa se o jogador esta machucado
    private boolean machucado;

    // Numero de jogos que o jogador ficara machucado
    private int numeroJogosMachucado;

    // informa a agressividade do jogador
    private int agressividade;

    /**
     * Construtor Default
     */
    public Jogador() {
        this.nome = null;
        this.forca = FORCAMINIMA;
        this.salario = 0;
        this.numGols = 0;
        this.posicao = 0;
        this.valorPasse = 0;
        this.numeroCartaoAmarelo = 0;
        this.numeroCartaoVermelho = 0;
        this.suspenso = false;
        this.numeroJogosSuspenso = 0;
        this.machucado = false;
        this.numeroJogosMachucado = 0;
        this.agressividade = AGRESSIVIDADEMAXIMA;
     }

   /**
    * Construtor com as defini�oes do atributos de cada jogador
    *
    * @param nome O nome do jogador
    * @param forca A forca do jogador
    * @param salario O salario do jogador
    * @param posicao A posicao do jogador
    */
    public Jogador(String nome, int forca, int salario,int posicao){
        this.nome = nome;
        this.salario = salario;
        this.numGols = 0;
        this.posicao = posicao;
        if (forca <= FORCAMAXIMA) {
            this.forca = forca;

        }// fim do if (forca <= FORCAMAXIMA)
        else {
            this.forca = FORCAMINIMA;

        }// fim do else
        this.ajustarValorPasse();
        this.numeroCartaoAmarelo = 0;
        this.numeroCartaoVermelho = 0;
        this.suspenso = false;
        this.numeroJogosSuspenso = 0;
        this.machucado = false;
        this.numeroJogosMachucado = 0;
        this.agressividade = AGRESSIVIDADEMAXIMA;
    }

   /**
    * Construtor com as defini�oes do atributos de cada jogador
    *
    * @param nome O nome do jogador
    * @param forca A forca do jogador
    * @param salario O salario do jogador
    * @param posicao A posicao do jogador
    * @param agressividade A agressividade do jogador
    */
    public Jogador(String nome, int forca, int salario,int posicao,int agressividade){
        this.nome = nome;
        this.salario = salario;
        this.numGols = 0;
        this.posicao = posicao;
        if (forca <= FORCAMAXIMA) {
            this.forca = forca;

        }// fim do if (forca <= FORCAMAXIMA)
        else {
            this.forca = FORCAMINIMA;

        }// fim do else
        this.ajustarValorPasse();
        this.numeroCartaoAmarelo = 0;
        this.numeroCartaoVermelho = 0;
        this.suspenso = false;
        this.numeroJogosSuspenso = 0;
        this.machucado = false;
        this.numeroJogosMachucado = 0;
        if ( agressividade <= AGRESSIVIDADEMAXIMA ) {
            this.agressividade = agressividade;
        }
        else {
          this.agressividade = AGRESSIVIDADEMINIMA;
        } 
    }

   /**
    * Modifica o forca do jogador, com o novo poder sendo passado como par�metro para a fun��o
    *
    * @param novaForca A nova Forca do jogador
    */
    public void setForca(int novaForca) {

        if (novaForca <= FORCAMAXIMA) {
            this.forca = novaForca;

        }// fim do if (novaForca <= FORCAMAXIMA)
    }

   /**
    * Altera o salario do jogador ,
    * com o novo sal�rio sendo passado como par�metro para a fun��o
    *
    * @param novoSalario O novo salario do jogador
    *
    */
    public void setSalario(int novoSalario) {
        this.salario = novoSalario;
    }

   /**
    * Informa que o jogador fez um gol , e dessa forma incrementa o numero de gols
    */
    public void setGol() {
        this.numGols = numGols + 1;
    }

   /**
    * Retorna o nome do jogador
    *
    * @return Uma string contendo o nome do jogador
    */
    public String getNome() {
        return this.nome;
    }

   /**
    * Retorna a forca do jogador
    *
    * @return Um inteiro que representa a forca do jogador
    *
    */
    public int getForca(){
        return this.forca;
    }

   /**
    * Retorna a posicao do Jogador
    *
    * @return Um inteiro que representa a posicao do jogador
    */
    public int getPosicao(){
        return this.posicao;
    }


   /**
    * Retorna o salario do jogador
    *
    * @return Um inteiro que representa o salario do jogador
    */
    public int getSalario(){
        return this.salario;
    }

   /**
    * Retorna o numero de gols feito pelo jogador
    *
    * @return Um inteiro que representa o numero de gols feito pelo jogador
    */
    public int getnumGols(){
        return this.numGols;
    }

   /**
    * Retorn a agressividade do jogador
    *
    * @return Um inteiro que representa a agressividade do jogador
    */
    public int getAgressividade(){
        return this.agressividade;
    }

   /**
    * Ajusta o valor do passe do jogador
    *
    */
    public void ajustarValorPasse(){
        this.valorPasse = ((this.getForca() * 1000)
                            + (this.getSalario() * 10 + (this.getPosicao() * 100) )
                             * (int) (Math.random() * 100));
    }

   /**
    * Retorna o valor do passe do jogador
    *
    *@return Um long que informa o pre�o do passe do jogador
    */
    public long getValorPasse(){
        return this.valorPasse;
    }

   /**
    * Informa que o jogador tomou um cartao amarelo e
    * ajusta os atributos de acordo com essa informa�ao
    *
    */
    public void cartaoAmarelo(){
        this.numeroCartaoAmarelo = this.numeroCartaoAmarelo + 1;

        if(this.numeroCartaoAmarelo >= MAXIMODEAMARELOS) {
            this.suspenso = true;
            this.numeroCartaoAmarelo = 0;
        }
    }

   /**
    * Informa que o jogador tomou um cartao vermelho e
    * ajusta os atributos de acordo com essa informa�ao
    *
    */
    public void cartaoVermelho(){
        this.numeroCartaoVermelho = this.numeroCartaoVermelho + 1;
        this.suspenso = true;
    }

   /**
    * Informa que o jogador jogou e ajusta os atributos
    * de acordo com essa informa�ao (decrementa os jogos de suspensao ,etc.)
    *
    */
    public void jogou(){

        if (this.numeroJogosMachucado >= 1) {
            this.numeroJogosMachucado = 0;
            this.machucado = false;
        }
        else {
            this.numeroJogosMachucado = this.numeroJogosMachucado - 1;
        }

        if (this.numeroJogosSuspenso <= 1) {
            this.numeroJogosSuspenso = 0;
            this.suspenso = false;
        }
        else {
            this.numeroJogosSuspenso = this.numeroJogosSuspenso - 1;
        }
    }

   /**
    * Retorna um boolean informando se o jogador esta suspenso
    *
    *@return Um boolean que informa se esta suspenso ou nao
    */
    public boolean suspenso(){
        return this.suspenso;
    }

   /**
    * Informa que o jogador foi suspenso
    *
    *@param numeroJogosSuspensao O numero de jogos de suspensao
    */
    public void suspender(int numeroJogosSuspensao){
        this.numeroJogosSuspenso = numeroJogosSuspensao;
        this.suspenso = true;
    }

   /**
    * Informa que o jogador se machucou
    *
    *@param numeroJogosMachucado O numero de jogos que ele ficar� machucado
    */
    public void machucar(int numeroJogosMachucado){
        this.machucado = true;
        this.numeroJogosMachucado = numeroJogosMachucado;
        this.setForca(this.getForca() - (int)(numeroJogosMachucado * 0.8) );
    }

   /**
    *  Informa se o jogador esta machucado
    *
    *@return Um boolean que informa se o jogador esta machucado
    */
    public boolean machucado(){
        return this.machucado;
    }

   /**
    * String que contem informa�oes sobre o objeto
    *
    * @return Uma string que contem informacao sobre o jogador
    */
    public String toString() {
        return ("Nome : " + nome + "\n" +"Forca : " + forca + "\n"
                + "Salario : " + salario + "\n" +"Numero de Gols : "
                + numGols + "\n" + "Posicao : " + posicao + "\n");
        }

//   /**
//    * Metodo para testar a classe
//    *
//     * @param a
//    */
//    public static void main(String a[]) {
//
//        Jogador j = new Jogador("JACKSON",13,12000,Jogador.ATACANTE);
//        System.out.println(j.toString());
//
//    }
}
