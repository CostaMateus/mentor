/**
 * Projeto LoLCoah LC
 *
 * Tipo: Tecnico
 */
package entidades.tecnico;

/**
 * Tecnico é a classe que representa o coach/manager de um time. Com os
 * seguintes atributos: nome, sobrenome, nick, idade.
 *
 * @author Mateus L. Costa, Filipe Lucas
 */
public class Tecnico {

    private String nome;                    //Nome do tecnico 
    private String sobrenome;               //Sobrenome do tecnico 
    private String nick;                    //Nick do tecnico
    private int idade;                      //Idade do tecnico

    /**
     * Construtor padrão.
     */
    public Tecnico() {
        this.nome = "";
        this.sobrenome = "";
        this.nick = "";
        this.idade = 18;
    }

    /**
     * Construtor com todos os parametros.
     *
     * @param nome O nome do jogador
     * @param sobrenome O sobrenome do jogador
     * @param nick O nick do jogador
     * @param idade A idade do tecnico
     */
    public Tecnico(String nome, String sobrenome, String nick, int idade) {
        this.nome = nome;
        this.sobrenome = sobrenome;
        this.nick = nick;
        this.idade = idade;
    }

    /**
     * Retorna o nome do tecnico.
     *
     * @return Uma string contendo o nome
     */
    public String getNome() {
        return nome;
    }

    /**
     * Retorna o sobrenome do tecnico.
     *
     * @return Uma string contendo o sobrenome
     */
    public String getSobrenome() {
        return nome;
    }

    /**
     * Retorna o nick do tecnico.
     *
     * @return Uma string contendo o nick
     */
    public String getNick() {
        return nick;
    }

    /**
     * Retorna o nome completo do tecnico. Nome + nick + sobrenome.
     *
     * @return Uma string contendo o nome completo
     */
    public String getNomeCompleto() {
        return nome + " \"" + nick + "\" " + sobrenome;
    }

    /**
     * Retorna a idade do tecnico.
     *
     * @return Uma inteiro que representa a idade
     */
    public int getIdade() {
        return idade;
    }

    /**
     * Altera nome do tecnico.
     *
     * @param nome O novo nome do tecnico
     */
    public void setNome(String nome) {
        this.nome = nome;
    }

    /**
     * Altera sobrenome do tecnico.
     *
     * @param sobrenome O novo sobrenome do tecnico
     */
    public void setSobrenome(String sobrenome) {
        this.sobrenome = sobrenome;
    }

    /**
     * Altera nick do tecnico.
     *
     * @param nick O novo nick do tecnico
     */
    public void setNick(String nick) {
        this.nick = nick;
    }

    /**
     * Altera o valor da idade do tecnico.
     *
     * @param idade O novo valor da idade do tecnico
     */
    public void setIdade(int idade) {
        this.idade = idade;
    }

    @Override
    public String toString() {
        return "Nome: " + getNomeCompleto() + "\n"
                + "Idade: " + getIdade();
    }
}
