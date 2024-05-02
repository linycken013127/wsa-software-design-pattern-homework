package org.example;

import org.jgrapht.Graph;
import org.jgrapht.graph.DefaultEdge;
import org.jgrapht.graph.SimpleGraph;

import java.util.Scanner;

public class SuperRelationshipAnalyzer {

    private final Graph<String, DefaultEdge> graph;

    public SuperRelationshipAnalyzer() {
        this.graph = new SimpleGraph<>(DefaultEdge.class);
    }

    public void init(String script) {
        Scanner scanner = new Scanner(script);
        while (scanner.hasNextLine()) {
            String line = scanner.nextLine();

            String[] names = line.split(" -- ");

            this.graph.addVertex(names[0]);
            this.graph.addVertex(names[1]);
            this.graph.addEdge(names[0], names[1]);
        }
        scanner.close();
    }

    // C 是否為 A 與 B 的共同好友
    public boolean isMutualFriend(String c, String a, String b) {
        System.out.println(this.graph.containsEdge(c, a));
        System.out.println(this.graph.containsEdge(c, b));
        return this.graph.containsEdge(c, a) && this.graph.containsEdge(c, b);
    }
}
