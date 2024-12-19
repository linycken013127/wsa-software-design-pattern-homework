package org.example.domain;

import java.util.List;

public class PrettyTheme extends Theme {
    @Override
    public void renderUI(char[][] canvas, UI ui) {
        if (ui instanceof Button) {
            renderButton(canvas, (Button) ui, '┌', '─', '│', '┐', '┘', '└');
        } else if (ui instanceof NumberedList) {
            renderNumberedList(canvas, (NumberedList) ui, true);
        } else if (ui instanceof Text) {
            renderText(canvas, (Text) ui, true);
        }
    }

    private void renderButton(char[][] canvas, Button button, char topLeft, char horizontal, char vertical,
                              char topRight, char bottomRight, char bottomLeft) {
        int startX = button.getX();
        int startY = button.getY();
        String text = button.getText();
        int paddingWidth = button.getPaddingWidth();
        int paddingHeight = button.getPaddingHeight();

        int boxWidth = text.length() + paddingWidth * 2;
        int boxHeight = 3 + paddingHeight * 2;

        for (int i = 0; i < boxHeight; i++) {
            for (int j = 0; j < boxWidth; j++) {
                if (i == 0 && j == 0) {
                    canvas[startY + i][startX + j] = topLeft;
                } else if (i == 0 && j == boxWidth - 1) {
                    canvas[startY + i][startX + j] = topRight;
                } else if (i == boxHeight - 1 && j == 0) {
                    canvas[startY + i][startX + j] = bottomLeft;
                } else if (i == boxHeight - 1 && j == boxWidth - 1) {
                    canvas[startY + i][startX + j] = bottomRight;
                } else if (i == 0 || i == boxHeight - 1) {
                    canvas[startY + i][startX + j] = horizontal;
                } else if (j == 0 || j == boxWidth - 1) {
                    canvas[startY + i][startX + j] = vertical;
                } else {
                    if (i == (boxHeight-2) && j >= paddingWidth && j < paddingWidth + text.length()) {
                        canvas[startY + i][startX + j] = text.charAt(j - paddingWidth);
                    } else {
                        canvas[startY + i][startX + j] = ' ';
                    }
                }
            }
        }
    }

    private void renderNumberedList(char[][] canvas, NumberedList list, boolean uppercase) {
        int startX = list.getX();
        int startY = list.getY();
        List<String> lines = list.getLines();

        for (int i = 0; i < lines.size(); i++) {
            String line = (uppercase ? lines.get(i).toUpperCase() : lines.get(i));
            String formattedLine = getRomanNumeral(i + 1) + ". " + line;

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

    private String getRomanNumeral(int number) {
        String[] numerals = {"I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X"};
        return numerals[number - 1];
    }

}
