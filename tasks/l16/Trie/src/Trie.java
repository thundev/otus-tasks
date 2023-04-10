public class Trie {
    private final Node root;

    private static class Node {
        public Node[] children;

        public boolean isEnd;

        public Node() {
            children = new Node[127];
            isEnd = false;
        }

        public boolean exists(char c) {
            return children[c] != null;
        }

        public Node next(char c) {
            if (!exists(c)) {
                children[c] = new Node();
            }

            return children[c];
        }
    }

    public Trie() {
        root = new Node();
    }

    public void insert(String word) {
        Node node = root;

        for (char c : word.toCharArray()) {
            node = node.next(c);
        }

        node.isEnd = true;
    }

    public boolean search(String word) {
        Node node = go(word);
        return node != null && node.isEnd;
    }

    public boolean startsWith(String prefix) {
        return go(prefix) != null;
    }

    private Node go(String word) {
        Node node = root;

        for (char c : word.toCharArray()) {
            if (node.exists(c)) {
                node = node.next(c);
                continue;
            }

            return null;
        }

        return node;
    }
}