package zInter;

import java.awt.BorderLayout;
import java.awt.Container;
import java.awt.GridLayout;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;

/*
 * @author Eu
 */
public class Janela extends JFrame {

    public Janela() {
        super("Teste");
        JFrame frame = new JFrame();

        Container c1 = getContentPane();
        c1.setLayout(new BorderLayout());/*
        c1.add(BorderLayout.NORTH, new JButton("1"));
        c1.add(BorderLayout.SOUTH, new JButton("2"));
        c1.add(BorderLayout.EAST, new JButton("3"));
        c1.add(BorderLayout.WEST, new JButton("4"));
        c1.add(BorderLayout.CENTER, new JButton("5"));*/

        Container c2 = new JPanel();
        c2.setLayout(new GridLayout(1, 10));
        c2.add(new JButton("Q"));
        c2.add(new JButton("W"));
        c2.add(new JButton("E"));
        c2.add(new JButton("R"));
        c2.add(new JButton("T"));
        c2.add(new JButton("Y"));
        c2.add(new JButton("U"));
        c2.add(new JButton("I"));
        c2.add(new JButton("O"));
        c2.add(new JButton("P"));
        
        Container c3 = new JPanel();
        c3.setLayout(new GridLayout(1, 2));
        
        Container c4 = new JPanel();
        c4.setLayout(new GridLayout(2, 1));
        c4.add(new JButton("A Es"));
        c4.add(new JButton("S Es"));
        
        Container c5 = new JPanel();
        c5.setLayout(new GridLayout(2, 1));
        c5.add(new JButton("A Di"));
        c5.add(new JButton("S Di"));
        
        c3.add(c4);
        c3.add(c5);
        
        c1.add(BorderLayout.NORTH, c2);
        c1.add(BorderLayout.CENTER, c3);
        

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(500, 500);
        setVisible(true);
        setResizable(false);
    }

    public static void main(String[] args) {
        new Janela();

    }
}
