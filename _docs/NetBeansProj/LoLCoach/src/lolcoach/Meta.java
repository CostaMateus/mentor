package lolcoach;

import java.util.Random;

/*
 * @author Eu
 */
public class Meta {

    private static String top;
    private static String jun;
    private static String mid;
    private static String adc;
    private static String sup;

    public Meta() {
        getMetas();
    }

    private static void getMetas() {
        String mTop[] = {"ASSASSINO", "LUTADOR", "MAGO", "TANK"};
        top = mTop[new Random().nextInt(mTop.length)];

        String mJun[] = {"ASSASSINO", "LUTADOR", "MAGO", "TANK", "ATIRADOR"};
        jun = mJun[new Random().nextInt(mJun.length)];

        String mMid[] = {"ASSASSINO", "LUTADOR", "MAGO"};
        mid = mMid[new Random().nextInt(mMid.length)];

        String mAdc[] = {"NORMAL", "UTIL", "HYPER"};
        adc = mAdc[new Random().nextInt(mAdc.length)];

        String mSup[] = {"TANK", "UTIL"};
        sup = mSup[new Random().nextInt(mSup.length)];
    }

    public String getTop() {
        return top;
    }

    public String getJun() {
        return jun;
    }

    public String getMid() {
        return mid;
    }
    
    public String getAdc() {
        return adc;
    }

    public String getSup() {
        return sup;
    }

}
