package org.example;

import org.jgrapht.Graph;
import org.jgrapht.graph.DefaultEdge;

import java.util.Scanner;

public class RelationshipAnalyzerAdapter implements RelationshipAnalyzer {

    private final SuperRelationshipAnalyzer superAnalyzer;

    public RelationshipAnalyzerAdapter(SuperRelationshipAnalyzer superAnalyzer) {
        this.superAnalyzer = superAnalyzer;
    }

    @Override
    public void parse(String script) {
        script = convertToSuperScript(script);

        superAnalyzer.init(script);
    }

    private String convertToSuperScript(String script) {
        Scanner scanner = new Scanner(script);
        StringBuilder superScript = new StringBuilder();
        while (scanner.hasNextLine()) {
            String line = scanner.nextLine();
            String[] names = line.split(": ");
            String a = names[0];
            String[] friends = names[1].split(" ");
            for (String friend : friends) {
                superScript.append(a).append(" -- ").append(friend).append("\n");
            }
        }
        return superScript.toString();
    }

    @Override
    public String getMutualFriends(String a, String b) {
        Graph<String, DefaultEdge> graph = superAnalyzer.getGraph();

        StringBuilder mutualFriends = new StringBuilder();
        for (String c : graph.vertexSet()) {
            if (superAnalyzer.isMutualFriend(c, a, b)) {
                mutualFriends.append(c).append(" ");
            }
        }
        return mutualFriends.toString();
    }
}
