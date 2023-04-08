public class Main {
    public static void main(String[] args) {
        HashTable<String, Integer> table = new HashTable<>();

        table.put("cat", 1);
        table.put("cab", 2);
        table.put("cap", 3);
        table.put("lap", 4);
        table.put("gap", 5);
        table.put("bar", 6);
        table.put("far", 7);
        table.put("man", 8);
        table.put("men", 9);
        table.put("ann", 10);
        table.put("ben", 11);

        System.out.println(table.get("far"));
        System.out.println(table.get("man"));
        table.remove("man");
        System.out.println(table.get("man"));
        System.out.println(table.get("ten"));

        System.out.println("test");
    }
}