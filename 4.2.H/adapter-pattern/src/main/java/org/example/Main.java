package org.example;

import java.io.BufferedReader;
import java.io.FileReader;

public class Main {
    public static void main(String[] args) {
        clientMain(args);
//        superMain(args);
    }

    public static void superMain(String[] args) {
        String filePath = "super-script.txt";

        String script = readFile(filePath);

        SuperRelationshipAnalyzer superAnalyzer = new SuperRelationshipAnalyzer();

        superAnalyzer.init(script);
        System.out.printf("C 是否為 A 與 B 的共同好友: %s", superAnalyzer.isMutualFriend("C", "A", "B"));
    }

    private static void clientMain(String[] args) {
        String filePath = "script.txt";

        String script = readFile(filePath);

        SuperRelationshipAnalyzer superAnalyzer = new SuperRelationshipAnalyzer();
        RelationshipAnalyzer analyzer = new RelationshipAnalyzerAdapter(superAnalyzer);

        RelationshipGraph graph = analyzer.parse(script);
        System.out.println(analyzer.getMutualFriends("A", "B"));
        System.out.println(graph.hasConnection("A", "B"));
    }

    public static String readFile(String filePath) {
        StringBuilder content = new StringBuilder();
        try {
            FileReader script = new FileReader(filePath);

            BufferedReader reader = new BufferedReader(script);
            String line;
            while ((line = reader.readLine()) != null) {
                content.append(line).append("\n");
            }
        } catch (Exception $e) {
            System.out.println("File not found");
        }

        return content.toString();
    }
}
