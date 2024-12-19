package org.example.domain;

import java.util.ArrayList;
import java.util.List;

public class ASCII {
    private int height;
    private int width;
    private Theme theme;
    private List<UI> uis;

    public ASCII(int height, int width, Theme theme) {
        this.height = height;
        this.width = width;
        this.theme = theme;
        this.uis = new ArrayList<>();
    }

    public void setTheme(Theme theme) {
        this.theme = theme;
    }

    public void addButton(int x, int y, String text, int paddingWidth, int paddingHeight) {
//        uis.add(new Button(x, y, text, paddingWidth, paddingHeight));
        // 必須知道 theme 才能知道 Button 是什麼
        // open: theme (外部客製化)
        // close: button
//        Button button = theme.createButton(x, y, text, paddingWidth, paddingHeight);

    }

    public void addNumberedList(int x, int y, List<String> lines) {
        uis.add(new NumberedList(x, y, lines));
    }

    public void addText(int x, int y, String text) {
        uis.add(new Text(x, y, text));
    }

    public void render() {
        char[][] canvas = new char[height][width];
        for (int i = 0; i < height; i++) {
            for (int j = 0; j < width; j++) {
                canvas[i][j] = ' ';
            }
        }

        for (UI ui : uis) {
            theme.renderUI(canvas, ui);
        }

        for (char[] row : canvas) {
            System.out.println(new String(row));
        }
    }
}
