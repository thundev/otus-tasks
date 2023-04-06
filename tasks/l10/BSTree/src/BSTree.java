public class BSTree {
    private Node root;

    private class Node {
        private int value;
        private Node left;
        private Node right;

        public Node(int value) {
            this.value = value;
            this.left = null;
            this.right = null;
        }
    }

    public void insert(int value) {
        Node node = new Node(value);
        if (root == null) {
            root = node;
            return;
        }

        Node parent = null;
        Node current = root;
        while (current != null) {
            parent = current;

            if (value < current.value) {
                current = current.left;
                continue;
            }

            if (value > current.value) {
                current = current.right;
                continue;
            }

            return;
        }

        if (value < parent.value) {
            parent.left = node;
        } else {
            parent.right = node;
        }
    }

    public boolean search(int value) {
        Node current = root;
        while (current != null) {
            if (value < current.value) {
                current = current.left;
                continue;
            }

            if (value > current.value) {
                current = current.right;
                continue;
            }

            return true;
        }
        return false;
    }

    public void remove(int value) {
        Node parent = null;
        Node current = root;
        while (current != null && current.value != value) {
            parent = current;
            if (value < current.value) {
                current = current.left;
            } else {
                current = current.right;
            }
        }

        if (current == null) {
            return;
        }

        if (current.left == null && current.right == null) {
            if (current == root) {
                root = null;
                return;
            }

            if (current == parent.left) {
                parent.left = null;
            } else {
                parent.right = null;
            }

            return;
        }

        if (current.left == null) {
            if (current == root) {
                root = current.right;
            } else if (current == parent.left) {
                parent.left = current.right;
            } else {
                parent.right = current.right;
            }
        } else if (current.right == null) {
            if (current == root) {
                root = current.left;
            } else if (current == parent.left) {
                parent.left = current.left;
            } else {
                parent.right = current.left;
            }
        } else {
            Node successorParent = current;
            Node successor = current.right;
            while (successor.left != null) {
                successorParent = successor;
                successor = successor.left;
            }
            if (successorParent != current) {
                successorParent.left = successor.right;
                successor.right = current.right;
            }
            if (current == root) {
                root = successor;
            } else if (current == parent.left) {
                parent.left = successor;
            } else {
                parent.right = successor;
            }
            successor.left = current.left;
        }
    }
}
