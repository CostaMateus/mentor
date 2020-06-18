/**
 * Projeto Elifoot
 *
 * Tipo: InterfaceJogador
 */
package jogadores;

/**
 * InterfaceJogador fornece constantes que representam a posicao e as forcas
 * maxima e minima de um jogador.
 *
 * IMPORTANTE: Essas constantes sao usadas em todo o pacote jogadores
 *
 * @author Andre,Carlos,Francisco,Mardoqueu,Renato
 */
public interface InterfaceJogador {

    // Constantes de Classe que classificam o jogador quanto a posicao
    // Elas sao publicas e estaticas porque sao acessadas por todos os objetos
    // da classe de forma comum,ou seja , elas nao mudam em funcao do objeto
    public static final int GOLEIRO = 1;
    public static final int ZAGUEIRO = 2;
    public static final int MEIOCAMPO = 3;
    public static final int ATACANTE = 4;

    // Constantes que definem a forca maxima e a minima dos jogadores
    public static final int FORCAMAXIMA = 10;
    public static final int FORCAMINIMA = 1;
    public static final int MAXIMODEAMARELOS = 3;

    // Constantes que definem a AGRESSIVIDADE maxima e a minima dos jogadores
    public static final int AGRESSIVIDADEMINIMA = 1;
    public static final int AGRESSIVIDADEMAXIMA = 10;

    public static final int VALORCONTUSAO = 6;
}
