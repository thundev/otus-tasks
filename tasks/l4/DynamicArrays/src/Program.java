import model.*;

import java.util.Date;

public class Program {

    public static void main(String[] args) {
//        IArray singleArray = new SingleArray();
//        IArray vectorArray = new FactorArray();
//        IArray factorArray = new FactorArray();
//        IArray matrixArray = new MatrixArray();
//        testAddArray(singleArray, 10_000);
//        testAddArray(vectorArray, 100_000);
//        testAddArray(factorArray, 100_000);
//        testAddArray(matrixArray, 100_000);

        IArray array = new FactorArray();
        for (int i = 0; i < 10; i++) {
            array.add(i);
        }
        System.out.println(array.toString());

        array.add(6, 3);
        System.out.println(array.toString());

        array.remove(3);
        System.out.println(array.toString());
    }

    private static void testAddArray(IArray data, int total) {
        long start = System.currentTimeMillis();

        for (int j = 0; j < total; j ++)
            data.add(new Date());

        System.out.println(data + " testAddArray: " +
                (System.currentTimeMillis() - start));
    }
}
