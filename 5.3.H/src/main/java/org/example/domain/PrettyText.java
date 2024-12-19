package org.example.domain;

public class PrettyText extends Text {
    public PrettyText(int x, int y, String text) {
        super(x, y, text);
        uppercase = true;
    }
}
