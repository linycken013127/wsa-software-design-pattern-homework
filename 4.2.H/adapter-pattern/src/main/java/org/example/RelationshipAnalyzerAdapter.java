package org.example;

import java.util.Scanner;

public class RelationshipAnalyzerAdapter implements RelationshipAnalyzer {

    private final SuperRelationshipAnalyzer superAnalyzer;

    private BasicRelationshipGraph basicRelationshipGraph;

    public RelationshipAnalyzerAdapter(SuperRelationshipAnalyzer superAnalyzer) {
        this.superAnalyzer = superAnalyzer;
    }

    @Override
    public RelationshipGraph parse(String script) {
        script = convertToSuperScript(script);

        superAnalyzer.init(script);

        this.basicRelationshipGraph = new BasicRelationshipGraph(superAnalyzer.getGraph());

        return this.basicRelationshipGraph;
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
    public String getMutualFriends(String name1, String name2) {

        StringBuilder mutualFriends = new StringBuilder();
        for (String c : this.basicRelationshipGraph.graph().vertexSet()) {
            if (superAnalyzer.isMutualFriend(c, name1, name2)) {
                mutualFriends.append(c).append(" ");
            }
        }
        return mutualFriends.toString();
    }
}
