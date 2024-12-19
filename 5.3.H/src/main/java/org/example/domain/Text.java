package org.example.domain;

public class Text extends UI {
    private String text;

    public Text(int x, int y, String text) {
        super(x, y);
        this.text = text;
    }

    public String getText() {
        return text;
    }
}
