package org.example.domain;

import java.util.List;

public class BasicTheme extends Theme {
    // 希望只要知道怎麼做就可以做出對應的樣式
    // 核心只有 定義邊角、大小寫
    private ThemeAbstractFactory themeFactory;

    public BasicTheme(ThemeAbstractFactory themeFactory) {
        this.themeFactory = themeFactory;
    }

    @Override
    public void renderUI(char[][] canvas, UI ui) {
        if (ui instanceof Button) {
            renderButton(canvas, (Button) ui, '+', '-', '|');
        } else if (ui instanceof NumberedList) {
            renderNumberedList(canvas, (NumberedList) ui, false);
        } else if (ui instanceof Text) {
            renderText(canvas, (Text) ui, false);
        }
    }



    private void renderNumberedList(char[][] canvas, NumberedList list, boolean uppercase) {
        int startX = list.getX();
        int startY = list.getY();
        List<String> lines = list.getLines();

        for (int i = 0; i < lines.size(); i++) {
            String line = (uppercase ? lines.get(i).toUpperCase() : lines.get(i));
            String formattedLine = (i + 1) + ". " + line;

            for (int j = 0; j < formattedLine.length(); j++) {
                canvas[startY + i][startX + j] = formattedLine.charAt(j);
            }
        }
    }

    private void renderText(char[][] canvas, Text text, boolean uppercase) {
        int startX = text.getX();
        int startY = text.getY();
        String content = (uppercase ? text.getText().toUpperCase() : text.getText());

        for (int i = 0; i < content.length(); i++) {
            canvas[startY][startX + i] = content.charAt(i);
        }
    }
}
