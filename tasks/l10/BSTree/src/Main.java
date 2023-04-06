import java.util.Random;

public class Main {
    public static void main(String[] args) {
        long start, end;

        int numElements = 100_000;
        Random random = new Random();

        // creation
        System.out.println("Creation:");
        start = System.currentTimeMillis();
        BSTree orderedTree = getOrderedTree(numElements);
        end = System.currentTimeMillis() - start;
        System.out.println("OrderedTree of " + numElements + "nodes created in " + end + "ms");

        start = System.currentTimeMillis();
        BSTree randomTree = getRandomTree(numElements);
        end = System.currentTimeMillis() - start;
        System.out.println("RandomTree of " + numElements + " nodes created in " + end + "ms");

        // search
        System.out.println("Search:");
        start = System.currentTimeMillis();
        for (int i = 0; i < numElements / 10; i++) {
            int search = random.nextInt(numElements);
            orderedTree.search(search);
        }
        end = System.currentTimeMillis() - start;
        System.out.println("OrderedTree (" + numElements + " nodes): search of " + numElements / 10 + " random elements finished in " + end + "ms");

        start = System.currentTimeMillis();
        for (int i = 0; i < numElements / 10; i++) {
            int search = random.nextInt(numElements);
            randomTree.search(search);
        }
        end = System.currentTimeMillis() - start;
        System.out.println("RandomTree (" + numElements + " nodes): search of " + numElements / 10 + " random elements finished in " + end + "ms");

        // remove
        System.out.println("Remove:");

        start = System.currentTimeMillis();
        for (int i = 0; i < numElements / 10; i++) {
            int search = random.nextInt(numElements);
            orderedTree.search(search);
        }
        end = System.currentTimeMillis() - start;
        System.out.println("OrderedTree (" + numElements + " nodes): removal of " + numElements / 10 + " random elements finished in " + end + "ms.");

        start = System.currentTimeMillis();
        for (int i = 0; i < numElements / 10; i++) {
            int search = random.nextInt(numElements);
            randomTree.remove(search);
        }
        end = System.currentTimeMillis() - start;
        System.out.println("RandomTree (" + numElements + " nodes): removal of " + numElements / 10 + " random elements finished in " + end + "ms.");
    }

    private static BSTree getRandomTree(int n) {
        BSTree tree = new BSTree();

        Random random = new Random();
        for (int i = 0; i < n; i++) {
            tree.insert(random.nextInt(n));
        }

        return tree;
    }

    private static BSTree getOrderedTree(int n) {
        BSTree tree = new BSTree();

        for (int i = 0; i < n; i++) {
            tree.insert(i + 1);
        }

        return tree;
    }
}