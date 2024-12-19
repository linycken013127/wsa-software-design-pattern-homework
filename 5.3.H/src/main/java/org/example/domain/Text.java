package org.example.domain;

public class Text extends UI {
    protected String text;
    protected boolean uppercase;

    public Text(int x, int y, String text) {
        super(x, y);
        this.text = text;
    }

    @Override
    public void render(char[][] canvas) {
        String content = (uppercase ? text.toUpperCase() : text);

        for (int i = 0; i < content.length(); i++) {
            canvas[y][x + i] = content.charAt(i);
        }
    }
}
