/**
 * Projeto LoLCoah LC
 *
 * Tipo: Jogador
 */
package entidades.jogador;

import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.util.Locale;

/**
 * Jogador é a classe que representa o 'pro player' de League of Legends. Com os
 * seguintes atributos: nome, nick, valor de habilidade, de salário, de passe,
 * e posição que joga.
 *
 * @author Mateus L. Costa, Filipe Lucas
 */
public class Jogador {

    private String nome;                    //Nome do jogador 
    private String sobrenome;               //Sobrenome do jogador 
    private String nick;                    //Nick do jogador
    private int idade;                      //Idade do jogador
    private int habilidade;                 //Habilidade geral do jogador (1 a 100)
    private double salario;                 //Salário do jogador
    private double valorPasse;              //Valor do passe do jogador (transferência)
    private PosicaoEnum posicao;            //Posição do jogador
//    private ArrayList<Campeao> pericias;    //Pericias do jogador (0 a 3)

    /**
     * Construtor padrão.
     */
    public Jogador() {
        this.nome = "";
        this.sobrenome = "";
        this.nick = "";
        this.idade = 16;
        this.habilidade = 1;
        this.salario = 0.0;
        this.valorPasse = 0.0;
        this.posicao = PosicaoEnum.NA;
//        this.pericias = null;
    }

    /**
     * Construtor sem pericia.
     *
     * @param nome O nome do jogador
     * @param sobrenome O sobrenome do jogador
     * @param nick O nick do jogador
     * @param idade A idade do jogador
     * @param habilidade O valor da habilidade do jogador
     * @param salario O valor do salario do jogador
     * @param valorPasse O valor do passe do jogador
     * @param posicao PosiçãoEnum referente a posicao do jogador
     */
    public Jogador(String nome, String sobrenome, String nick, int idade,
            int habilidade, double salario, double valorPasse,
            PosicaoEnum posicao) {
        this.nome = nome;
        this.sobrenome = sobrenome;
        this.nick = nick;
        this.idade = idade;
        this.habilidade = habilidade;
        this.salario = salario;
        this.valorPasse = valorPasse;
        this.posicao = posicao;
    }

//    /**
//     * Construtor completo com todos os atributos.
//     *
//     * @param nome O nome do jogador
//     * @param sobrenome O sobrenome do jogador
//     * @param nick O nick do jogador
//     * @param habilidade O valor da habilidade do jogador
//     * @param salario O valor do salario do jogador
//     * @param valorPasse O valor do passe do jogador
//     * @param posicao PosiçãoEnum referente a posicao do jogador
//     * @param pericias Array de campeos que o jogador domina
//     */
//    public Jogador(String nome, String sobrenome, String nick, int idade, 
//          int habilidade, double salario, long valorPasse, 
//          PosicaoEnum posicao, ArrayList<Campeao> pericias) {
//        this.nome = nome;
//        this.sobrenome = sobrenome;
//        this.nick = nick;
//        this.idade = idade;
//        this.habilidade = habilidade;
//        this.salario = salario;
//        this.valorPasse = valorPasse;
//        this.posicao = posicao;
//        this.pericias = pericias;
//    }
//
    /**
     * Retorna o nome do jogador.
     *
     * @return Uma string contendo o nome
     */
    public String getNome() {
        return nome;
    }

    /**
     * Retorna o sobrenome do jogador.
     *
     * @return Uma string contendo o sobrenome
     */
    public String getSobrenome() {
        return nome;
    }

    /**
     * Retorna o nick do jogador.
     *
     * @return Uma string contendo o nick
     */
    public String getNick() {
        return nick;
    }

    /**
     * Retorna o nome completo do jogador. Nome + nick + sobrenome.
     *
     * @return Uma string contendo o nome completo
     */
    public String getNomeCompleto() {
        return nome + " \"" + nick + "\" " + sobrenome;
    }

    /**
     * Retorna a idade do jogador.
     *
     * @return Uma inteiro que representa a idade
     */
    public int getIdade() {
        return idade;
    }

    /**
     * Retorna o valor da habilidade do jogador.
     *
     * @return Um inteiro que representa a habilidade
     */
    public int getHabilidade() {
        return habilidade;
    }

    /**
     * Retorna o valor do salario do jogador.
     *
     * @return Um inteiro que representa o salario
     */
    public double getSalario() {
        return salario;
    }

    /**
     * Retorna o valor do passe do jogador.
     *
     * @return Um inteiro que representa o passe
     */
    public double getValorPasse() {
        return valorPasse;
    }

    /**
     * Retorna a posicao do jogador.
     *
     * @return Uma string contendo a posicao
     */
    public String getPosicao() {
        return posicao.name();
    }

//    /**
//     * Retorna um array de campeoes que o jogador tem pericia.
//     *
//     * @return Um array de campeoes
//     */
//    public ArrayList<Campeao> getPericias() {
//        return pericias;
//    }
//
//    /**
//     * Retorna um array de campeoes que o jogador tem pericia
//     *
//     * @return Um array de campeoes
//     */
//    public String getPericiasNomes() {
//        String nomes = "";
//        if (pericias != null) {
//            for (int i = 0; i < pericias.size(); i++) {
//                if (i == pericias.size() - 1) {
//                    nomes += pericias.get(i).getNome();
//                } else {
//                    nomes += pericias.get(i).getNome() + ", ";
//                }
//            }
//        } else {
//            nomes = "Sem pericia";
//        }
//        return nomes;
//    }
//
    /**
     * Altera nome do jogador.
     *
     * @param nome O novo nome do jogador
     */
    public void setNome(String nome) {
        this.nome = nome;
    }

    /**
     * Altera sobrenome do jogador.
     *
     * @param sobrenome O novo sobrenome do jogador
     */
    public void setSobrenome(String sobrenome) {
        this.sobrenome = sobrenome;
    }

    /**
     * Altera nick do jogador.
     *
     * @param nick O novo nick do jogador
     */
    public void setNick(String nick) {
        this.nick = nick;
    }

    /**
     * Altera o valor da idade do jogador.
     *
     * @param idade O novo valor da idade do jogador
     */
    public void setIdade(int idade) {
        this.idade = idade;
    }

    /**
     * Altera o valor da habilidade do jogador.
     *
     * @param habilidade O novo valor da habilidade do jogador
     */
    public void setHabilidade(int habilidade) {
        this.habilidade = habilidade;
    }

    /**
     * Reajusta o salario do jogador.
     *
     * @param perc A porcentagem de aumento do salario do jogador. Se zero,
     * aumento é igual a 15%
     */
    public void reajusteSalario(double perc) {
        if (perc == 0) {
            perc = 15;
        }
        double valor = ((salario * perc) / 100) + salario;
        setSalario(valor);
    }

    /**
     * Altera o valor do salario do jogador.
     *
     * @param salario O novo valor do salario do jogador
     */
    public void setSalario(double salario) {
        this.salario = salario;
    }

    /**
     * Reajusta o valor do passe do jogador.
     *
     * @param perc eh o q?
     */
    public void reajusteValorPasse(double perc) {
        // tem q implementar
    }

    /**
     * Altera o valor do passe do jogador.
     *
     * @param valorPasse O novo valor do passe do jogador
     */
    public void setValorPasse(double valorPasse) {
        this.valorPasse = valorPasse;
    }

    /**
     * Altera a posicao em que o jogador joga.
     *
     * @param posicao A nova posicao do jogador
     */
    public void setPosicao(PosicaoEnum posicao) {
        this.posicao = posicao;
    }

//    /**
//     * Altera todas as pericias do jogador.
//     *
//     * @param pericias Novo array de pericias do jogador
//     */
//    public void setPericias(ArrayList<Campeao> pericias) {
//        this.pericias = pericias;
//    }
//
//    public void addPericia(Campeao campeao) {
//        boolean tem = false;
//        if (pericias != null) {
//            if (campeao instanceof Campeao) {
//                for (Campeao c : pericias) {
//                    if (!tem) {
//                        if (campeao.getNome().equals(c.getNome())) {
//                            tem = true;
//                        }
//                    }
//                }
//            }
//            if (!tem) {
//                pericias.add(campeao);
//            }
//        } else {
//            pericias = new ArrayList<>();
//            pericias.add(campeao);
//        }
//    }
//
    /**
     * Metodo enumerado de posições.
     * NA = não aplicável
     */
    public static enum PosicaoEnum {
        TOPO, CAÇADOR, MEIO, ATIRADOR, SUPORTE, NA;
    }

    @Override
    public String toString() {
        DecimalFormat meuFormt = new DecimalFormat("R$ ###,###,##0.00", new DecimalFormatSymbols(new Locale("pt", "BR")));
        return "Nome: " + getNomeCompleto() + "\n"
                + "Idade: " + getIdade() + "\n"
                + "Habilidade: " + getHabilidade() + "\n"
                + "Salário: " + meuFormt.format(getSalario()) + "\n"
                + "Valor passe: " + meuFormt.format(getValorPasse()) + "\n"
                + "Posição: " + getPosicao(); //+ "\n"
//                + "Pericias: " + getPericiasNomes();
    }
}
