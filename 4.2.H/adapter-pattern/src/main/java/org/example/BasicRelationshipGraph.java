package org.example;

import org.jgrapht.Graph;
import org.jgrapht.graph.DefaultEdge;

public record BasicRelationshipGraph(Graph<String, DefaultEdge> graph) implements RelationshipGraph {

    @Override
    public Boolean hasConnection(String name1, String name2) {
        return graph.containsEdge(name1, name2);
    }
}
