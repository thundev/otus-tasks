public class HashTable<K extends Comparable<K>, V> {
    private static class Node<K, V> {
        public K key;
        public V value;
        public Node<K, V> next;

        public Node(K key, V value) {
            this.key = key;
            this.value = value;
        }
    }

    private Node<K, V>[] array;

    private int size;

    @SuppressWarnings("unchecked")
    public HashTable() {
        size = 0;
        array = new Node[11];
    }

    public void put(K key, V value) {
        if (needsRehashing()) {
            rehash();
        }

        int index = hash(key);

        Node<K, V> node = new Node<>(key, value);

        if (array[index] == null) {
            array[index] = node;
            size++;
            return;
        }

        Node<K, V> current = array[index];
        while (current.next != null) {
            if (current.key.equals(node.key)) {
                current.value = node.value;
                return;
            }

            current = current.next;
        }

        current.next = node;
        size++;
    }

    public V get(K key) {
        int index = hash(key);
        Node<K, V> current = array[index];

        while (current != null) {
            if (current.key.equals(key)) {
                return current.value;
            }

            current = current.next;
        }

        return null;
    }

    public V remove(K key) {
        int index = hash(key);

        Node<K, V> prev = null;
        Node<K, V> current = array[index];

        while (current != null) {
            if (current.key.equals(key)) {
                break;
            }

            prev = current;
            current = current.next;
        }

        if (current == null) {
            return null;
        }

        V value = current.value;

        if (prev != null) {
            prev.next = current.next;
        } else {
            array[index] = current.next;
        }

        size--;
        return value;
    }

    @SuppressWarnings("unchecked")
    private void rehash() {
        Node<K, V>[] old = array;

        size = 0;
        array = new Node[array.length * 2 + 1];

        for (Node<K, V> kvNode : old) {
            Node<K, V> current = kvNode;

            while (current != null) {
                put(current.key, current.value);
                current = current.next;
            }
        }
    }

    private int hash(K key) {
        return key.hashCode() % array.length;
    }

    private boolean needsRehashing() {
        if (size > 0) return (float) size / array.length >= 0.75f;

        return false;
    }
}
