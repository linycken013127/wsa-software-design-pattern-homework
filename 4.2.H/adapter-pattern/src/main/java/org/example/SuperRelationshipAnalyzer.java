package org.example;

import org.jgrapht.Graph;
import org.jgrapht.graph.DefaultEdge;
import org.jgrapht.graph.SimpleGraph;

import java.util.Scanner;

public class SuperRelationshipAnalyzer {

    public Graph<String, DefaultEdge> getGraph() {
        return graph;
    }

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

    public boolean isMutualFriend(String targetName, String name2, String name3) {
        return this.graph.containsEdge(targetName, name2) && this.graph.containsEdge(targetName, name3);
    }
}
