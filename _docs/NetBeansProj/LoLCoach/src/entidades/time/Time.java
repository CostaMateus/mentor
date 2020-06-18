/**
 * Projeto LoLCoah LC
 *
 * Tipo: Time
 */
package entidades.time;

import entidades.jogador.Jogador;
import entidades.tecnico.Tecnico;
import java.util.ArrayList;

/**
 * Time é a classe que representa as equipes que disputam os campeonatos. Com os
 * seguintes atributos: nome, elenco e moral.
 *
 * @author Mateus L. Costa
 */
public class Time {

    private final static int MoralMINIMA = 1;   //A moral minima do time
    private final static int MoralMAXIMA = 10;  //A moral maxima do time
    private final static int ElencoMAXIMO = 15; //O numero maximo de jogadores
    private final static int ConfMINIMA = 0;    //A moral minima do time
    private final static int ConfMAXIMA = 100;  //A moral maxima do time
    private String nome;                        //Nome do time
    private ArrayList<Jogador> elenco;          //Elenco de jogadores
    private Tecnico tecnico;                    //Tecnico do time
    private int moral;                          //Moral(motivação) do time, 1-10
    private int confiancaTorcida;               //Confiança da torcida
    private int confiancaDiretoria;             //Confiança da diretoria
//    private double caixa;                       //Caixa do time
//    private double receita;                     //Receita do time
//    private double despesas;                    //Despesas do time

    /**
     * Construtor padrão, apenas com o nome do time.
     *
     * @param nome Nome do time a ser criado
     */
    public Time(String nome) {
        this.nome = nome;
        this.elenco = null;
        this.tecnico = null;
        this.moral = Time.MoralMAXIMA / 2;
        this.confiancaTorcida = Time.ConfMAXIMA / 2;
        this.confiancaDiretoria = Time.ConfMAXIMA / 2;
    }

    /**
     * Construtor com nome e elenco já composto.
     *
     * @param nome Nome do time a ser criado
     * @param elenco Elenco do time
     * @param tecnico Tecnico do time
     */
    public Time(String nome, ArrayList elenco, Tecnico tecnico) {
        this.nome = nome;
        this.elenco = elenco;
        this.tecnico = tecnico;
        this.moral = MoralMAXIMA / 2;
        this.confiancaTorcida = Time.ConfMAXIMA;
        this.confiancaDiretoria = Time.ConfMAXIMA;
    }

    /**
     * Consulta nome do time.
     *
     * @return String que representa o nome do time
     */
    public String getNome() {
        return nome;
    }

    /**
     * Consulta o elenco do time.
     *
     * @return Um Array que representa o elenco do time
     */
    public ArrayList<Jogador> getElenco() {
        return elenco;
    }

    /**
     * Consulta o 'nome completo' do tecnico.
     *
     * @return Uma string que representa o 'nome completo' do tecnico
     */
    public String getTecnico() {
        return tecnico.getNomeCompleto();
    }

    /**
     * Consulta a atual moral do time.
     *
     * @return Um inteiro que representa a moral do time
     */
    public int getMoral() {
        return moral;
    }

    /**
     * Consulta a atual confiança da torcida no treinador.
     *
     * @return Um inteiro que representa a confiança da torcida
     */
    public int getConfiancaTorcida() {
        return confiancaTorcida;
    }

    /**
     * Consulta a atual confiança da diretoria no treinador.
     *
     * @return Um inteiro que representa a confiança da diretoria
     */
    public int getConfiancaDiretoria() {
        return confiancaDiretoria;
    }

    /**
     * Altera o nome do time.
     *
     * @param nome Novo nome do tiem
     */
    public void setNome(String nome) {
        this.nome = nome;
    }

    /**
     * Altera todo o elenco do time.
     *
     * @param elenco Novo elenco do time
     */
    public void setElenco(ArrayList<Jogador> elenco) {
        this.elenco = elenco;
    }

    /**
     * Altera o tecnico do time.
     *
     * @param tecnico O novo tecnico do time
     */
    public void setTecnico(Tecnico tecnico) {
        this.tecnico = tecnico;
    }

    /**
     * Altera a moral do time.
     *
     * @param moral Novo valor da moral do time
     */
    public void setMoral(int moral) {
        if (moral < Time.MoralMINIMA) {
            this.moral = Time.MoralMINIMA;
        } else if (moral <= Time.MoralMAXIMA) {
            this.moral = moral;
        } else {
            this.moral = Time.MoralMAXIMA;
        }
    }

    /**
     * Reajusta a moral do time.
     *
     * @param b Indica se a moral irá aumentar ou diminuir. Verdadeiro para
     * aumentar, falso para diminuir.
     */
    public void reajustaMoral(boolean b) {
        if (b && this.moral < Time.MoralMAXIMA) {
            this.moral += 1;
        } else if (!b && this.moral > Time.MoralMINIMA) {
            this.moral -= 1;
        }
    }

    /**
     * Insere um jogador na lista de atletas.
     *
     * @param jogador Um jogador a ser inserido
     */
    public void inserirJogador(Jogador jogador) {
        if ((jogador != null)
                && (!pertenceAoElenco(jogador))
                && (getNumeroElenco() < ElencoMAXIMO)) {
            elenco.add(jogador);
        }
    }

    /**
     * Remove um jogador da lista de atletas.
     *
     * @param jogador Um jogador a ser removido
     */
//    @Deprecated
    public void removerJogador(Jogador jogador) {
        if ((jogador != null) && (pertenceAoElenco(jogador))) {
            elenco.remove(jogador);
        }
    }

    /**
     * Remove um jogador da lista de atletas.
     *
     * @param nick Nick do jogador a ser removido
     */
    public void removerJogador(String nick) {
        if (!nick.isEmpty()) {
            for (Jogador j : elenco) {
                if (j.getNick().equals(nick) && (pertenceAoElenco(j))) {
                    elenco.remove(j);
                }
            }
        }
    }

    /**
     * Verifica se um jogador pertenceAoElenco a lista de atletas.
     *
     * @param jogador Um jogador a ser verificado
     * @return Retorna verdadeiro se um jogador pertenceAoElenco a lista de de
     * atletas e falso caso contrario
     */
    public boolean pertenceAoElenco(Jogador jogador) {
        if (jogador != null) {
            for (Jogador j : elenco) {
                if (j.getNick().equals(jogador.getNick())) {
                    return true;
                }
            }
        }
        return false;
    }

//    /**
//     * Verifica se a lista esta com a quantidade maxima permitida de atletas.
//     *
//     * @return Retorna verdadeiro se o elenco conter 15 atletas e falso caso
//     * contrario
//     */
//    public boolean taNoLimite() {
//        if (elenco.size() == MAXIMO) {
//            return true;
//        }
//        return false;
//    }
// 
    /**
     * Busca jogador pelo nick.
     *
     * @param nick Nick do jogador a ser procurado
     * @return Jogador com o nick procurado
     */
    public Jogador getJogador(String nick) {
        if ((!nick.isEmpty()) && (elenco != null)) {
            for (Jogador j : elenco) {
                if (j.getNick().equals(nick)) {
                    return j;
                }
            }
        }
        return null;
    }

    /**
     * Busca jogadores pelo nivel de habilidade.
     *
     * @param hab Valor da habilidade procurada
     * @return Um array de jogadores com a habilidade procurada
     */
    public ArrayList<Jogador> getJogadores(int hab) {
        ArrayList<Jogador> aux = new ArrayList<>();
        if ((hab > 0) && (elenco != null)) {
            for (Jogador j : elenco) {
                if (j.getHabilidade() == hab) {
                    aux.add(j);
                }
            }
        }
        return aux;
    }

    /**
     * Busca jogadores com passe igual ou maior ao passado.
     *
     * @param passe Valor do passe procurado
     * @return Um array de jogadores com passe maior ou igual ao procurado
     */
    public ArrayList<Jogador> getJogadores(double passe) {
        ArrayList<Jogador> aux = new ArrayList<>();
        if ((passe > 0) && (elenco != null)) {
            for (Jogador j : elenco) {
                if (j.getSalario() >= passe) {
                    aux.add(j);
                }
            }
        }
        return aux;
    }

    /**
     * Busca jogadores por posição jogada.
     *
     * @param posicao Posicao jogada procurada
     * @return Um array de jogadores que jogam na posicao procurada
     */
    public ArrayList<Jogador> getJogadores(Jogador.PosicaoEnum posicao) {
        ArrayList<Jogador> aux = new ArrayList<>();
        if ((posicao != Jogador.PosicaoEnum.NA) && (elenco != null)) {
            for (Jogador j : elenco) {
                if (j.getPosicao().equals(posicao.name())) {
                    aux.add(j);
                }
            }
        }
        return aux;
    }

    /**
     * Consulta o tamanho atual do elenco.
     *
     * @return Um inteiro que representa a quantidade de jogadores no elenco
     */
    public int getNumeroElenco() {
        return elenco.size();
    }

    /**
     * Consulta o nick e a posição dos jogadores.
     *
     * @return Uma string que contem o nick e a posição de todos jogadores
     */
    public String getNickPosicao() {
        String aux = "";
        for (Jogador j : elenco) {
            aux += j.getNick() + " - " + j.getPosicao() + "\n";
        }
        return aux;
    }

    /**
     * Consulta o nick e a posição dos jogadores.
     *
     * @return Uma string que contem o nick e a posição de todos jogadores
     */
    private String getNickPosicao2() {
        String aux = "";
        for (Jogador j : elenco) {
            aux += "\t" + j.getNick() + " - " + j.getPosicao() + "\n";
        }
        return aux;
    }

    /**
     * Retorna uma String que representa o conteudo do objeto Time.
     *
     * @return Uma string que representa o time descrito
     */
    @Override
    public String toString() {
        return "Time: " + getNome() + "\n"
                + "Tecnico: " + getTecnico() + "\n"
                + "Moral: " + getMoral() + "\n"
                + "Elenco: \n" + getNickPosicao2();
    }

}
