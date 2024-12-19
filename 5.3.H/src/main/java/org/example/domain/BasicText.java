package org.example.domain;

public class BasicText extends Text {
    public BasicText(int x, int y, String text) {
        super(x, y, text);
        uppercase = false;
    }
}
