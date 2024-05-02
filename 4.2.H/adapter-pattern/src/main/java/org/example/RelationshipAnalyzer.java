package org.example;

interface RelationshipAnalyzer {
    void parse(String script);

    String getMutualFriends(String a, String b);
}
