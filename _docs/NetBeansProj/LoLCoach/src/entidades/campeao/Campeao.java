/**
 * Projeto LoLCoah LC
 *
 * Tipo: Campeao
 */
package entidades.campeao;

/**
 * Campeao é a classe que representa os personagens de League of Legends. Com os
 * seguintes atributos: nome, função primária e secundária, valor de ataque, de
 * defesa, de magia e de dificuldade, data de lançamento, valor de ip e rp.
 *
 * @author Mateus L. Costa, Filipe Lucas
 */
public class Campeao {

    private String nome;        //Nome do campeao
    private FuncaoEnum f1;      //Funçao primária do campeao, obrigatorio
    private FuncaoEnum f2;      //Funçao secundaria do campeao, opcional
    private int ataque;         //Qntdd base de ataque (1 a 10)
    private int defesa;         //Qntdd base de defesa (1 a 10)
    private int magia;          //Qntdd base de magia (1 a 10)
    private int dificuldade;    //Nivel de dif. do campeao (1 a 10)
//    private int pericia;        //Preço da pericia do campeao
    private String data;        //Data de lançamento
    private int ip;             //Custo em ip
    private int rp;             //Custo em rp

    /**
     * Construtor padrao
     */
    public Campeao() {
        this.nome = "";
        this.f1 = FuncaoEnum.NA;
        this.f2 = FuncaoEnum.NA;
        this.ataque = 0;
        this.defesa = 0;
        this.magia = 0;
        this.dificuldade = 0;
//        this.pericia = 0;
        this.data = "";
        this.ip = 0;
        this.rp = 0;
    }

//    /**
//     * Construtor com definiçao de todos atributos, com apenas funçao primaria.
//     *
//     * @param nome O nome do campeao
//     * @param f1 A funçao primaria do campeao (obrigatoria)
//     * @param ataque Quantidade base de ataque (1 a 10)
//     * @param defesa Quantidade base de defesa (1 a 10)
//     * @param magia Quantidade base de magia (1 a 10)
//     * @param dificuldade Nivel de dif. do campeao (1 a 10)
//     * @param pericia Valor da pericia do campeao
//     * @param data Data de lançamento do campeao
//     * @param ip Custo em ip do campeao
//     * @param rp Custo em rp do campeao
//     */
//    public Campeao(String nome, FuncaoEnum f1, int ataque, int defesa,
//            int magia, int dificuldade, int pericia, String data,
//            int ip, int rp) {
//        this.nome = nome;
//        this.f1 = f1;
//        this.f2 = "";
//        this.ataque = ataque;
//        this.defesa = defesa;
//        this.magia = magia;
//        this.dificuldade = dificuldade;
//        this.pericia = pericia;
//        this.data = data;
//        this.ip = ip;
//        this.rp = rp;
//    }
//
//    /**
//     * Construtor com definiçao de todos atributos, com funçao primaria 
//     * e funçao secundaria.
//     *
//     * @param nome O nome do campeao
//     * @param f1 A funçao primaria do campeao (obrigatoria)
//     * @param f2 A funçao secundaria do campeao (opcional)
//     * @param ataque Quantidade base de ataque (1 a 10)
//     * @param defesa Quantidade base de defesa (1 a 10)
//     * @param magia Quantidade base de magia (1 a 10)
//     * @param dificuldade Nivel de dif. do campeao (1 a 10)
//     * @param pericia Valor da pericia do campeao
//     * @param data Data de lançamento do campeao
//     * @param ip Custo em ip do campeao
//     * @param rp Custo em rp do campeao
//     */
//    public Campeao(String nome, FuncaoEnum f1, FuncaoEnum f2, int ataque, 
//              int defesa, int magia, int dificuldade, int pericia, 
//              String data, int ip, int rp) {
//        this.nome = nome;
//        this.f1 = f1;
//        this.f2 = f2;
//        this.ataque = ataque;
//        this.defesa = defesa;
//        this.magia = magia;
//        this.dificuldade = dificuldade;
//        this.pericia = pericia;
//        this.data = data;
//        this.ip = ip;
//        this.rp = rp;
//    }
//
    /**
     * Construtor sem definiçao de pericia.
     *
     * @param nome O nome do campeao
     * @param f1 A funçao primaria do campeao (obrigatoria)
     * @param f2 A funçao secundaria do campeao (opcional)
     * @param ataque Quantidade base de ataque (1 a 10)
     * @param defesa Quantidade base de defesa (1 a 10)
     * @param magia Quantidade base de magia (1 a 10)
     * @param dificuldade Nivel de dif. do campeao (1 a 10)
     * @param data Data de lançamento do campeao
     * @param ip Custo em ip do campeao
     * @param rp Custo em rp do campeao
     */
    public Campeao(String nome, FuncaoEnum f1, FuncaoEnum f2, int ataque,
            int defesa, int magia, int dificuldade, String data, int ip,
            int rp) {
        this.nome = nome;
        this.f1 = f1;
        this.f2 = f2;
        this.ataque = ataque;
        this.defesa = defesa;
        this.magia = magia;
        this.dificuldade = dificuldade;
//        this.pericia = 0;
        this.data = data;
        this.ip = ip;
        this.rp = rp;
    }

    /**
     * Retorna o nome do campeao.
     *
     * @return Uma string contendo o nome do campeao
     */
    public String getNome() {
        return nome;
    }

    /**
     * Retorna a funçao primaria do campeao.
     *
     * @return Uma string contendo a funçao primaria
     */
    public String getF1() {
        return f1.name();
    }

    /**
     * Retorna a funçao secundaria do campeao.
     *
     * @return Uma string contendo a funçao secundaria
     */
    public String getF2() {
        return f2.name();
    }

    /**
     * Retorna o valor base de ataque do campeao.
     *
     * @return Um inteiro que representa o valor de ataque base
     */
    public int getAtaque() {
        return ataque;
    }

    /**
     * Retorna o valor base de defesa do campeao.
     *
     * @return Um inteiro que representa o valor de defesa base
     */
    public int getDefesa() {
        return defesa;
    }

    /**
     * Retorna o valor base de magia do campeao.
     *
     * @return Um inteiro que representa o valor de magia base
     */
    public int getMagia() {
        return magia;
    }

    /**
     * Retorna o valor de dificuldade do campeao.
     *
     * @return Um inteiro que representa o valor de dificuldade
     */
    public int getDificuldade() {
        return dificuldade;
    }

//    /**
//     * Retorna o valor da pericia do campeao.
//     * @return Um inteiro que representa o valor de pericia
//     */
//    public int getPericia() {
//        return pericia;
//    }
//
    /**
     * Retorna a data de lançamento do campeao.
     *
     * @return Uma string contendo a data de lançamento
     */
    public String getData() {
        return data;
    }

    /**
     * Retorna o valor em ip do campeao.
     *
     * @return Um inteiro que representa o custo em ip
     */
    public int getIp() {
        return ip;
    }

    /**
     * Retorna o valor em rp do campeao.
     *
     * @return Um inteiro que representa o custo em rp
     */
    public int getRp() {
        return rp;
    }

    /**
     * Modifica a função primária do campeão.
     *
     * @param f1 Nova função primária do campeao
     */
    public void setF1(FuncaoEnum f1) {
        this.f1 = f1;
    }

    /**
     * Modifica a função secundária do campeão.
     *
     * @param f2 Nova função secundária do campeão
     */
    public void setF2(FuncaoEnum f2) {
        this.f2 = f2;
    }

    /**
     * Modifica o valor de ataque base do campeao.
     *
     * @param ataque O novo valor do ataque base
     */
    public void setAtaque(int ataque) {
        this.ataque = ataque;
    }

    /**
     * Modifica o valor de defesa base do campeao.
     *
     * @param defesa O novo valor da defesa base
     */
    public void setDefesa(int defesa) {
        this.defesa = defesa;
    }

    /**
     * Modifica o valor de magia base do campeao.
     *
     * @param magia O novo valor da magia base
     */
    public void setMagia(int magia) {
        this.magia = magia;
    }

    /**
     * Modifica o valor de dificuldade do campeao.
     *
     * @param dificuldade O novo valor da dificuldade
     */
    public void setDificuldade(int dificuldade) {
        this.dificuldade = dificuldade;
    }

//    /**
//     * Modifica o valor da pericia do campeao.
//     * @param pericia O novo valor da pericia
//     */
//    public void setPericia(int pericia) {
//        this.pericia = pericia;
//    }
//
    /**
     * Modifica o valor do custo em ip do campeao.
     *
     * @param ip O novo valor de ip
     */
    public void setIp(int ip) {
        this.ip = ip;
    }

    /**
     * Modifica o valor do custo em rp do campeao.
     *
     * @param rp O novo valor de rp
     */
    public void setRp(int rp) {
        this.rp = rp;
    }

    /**
     * Metodo enumerado de funções. NA = não aplicável (somente para função
     * secundária)
     */
    public static enum FuncaoEnum {
        TANQUE, LUTADOR, ASSASSINO, MAGO, SUPORTE, ATIRADOR, NA;
    }

    /**
     * String que contem todas as infos do objeto campeao.
     *
     * @return Uma string com as infos do campeao
     */
    @Override
    public String toString() {
        return ("Nome: " + this.getNome() + "\n"
                + "Funçao 1: " + this.getF1() + "\n"
                + "Funçao 2: " + this.getF2() + "\n"
                + "Ataque: " + this.getAtaque() + "\n"
                + "Defesa: " + this.getDefesa() + "\n"
                + "Magia: " + this.getMagia() + "\n"
                + "Dificuldade: " + this.getDificuldade() + "\n"
                //                + "Valor pericia: " + this.getPericia() + "\n"
                + "Data: " + this.getData() + "\n"
                + "IP: " + this.getIp() + "\n"
                + "RP: " + this.getRp() + "\n");
    }
}
