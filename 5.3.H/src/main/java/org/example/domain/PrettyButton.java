package org.example.domain;

public class PrettyButton extends Button {
    public PrettyButton(int x, int y, String text, int paddingWidth, int paddingHeight) {
        super(x, y, text, paddingWidth, paddingHeight);
        horizontal = '─';
        vertical = '│';

    }

    @Override
    public void render(char[][] canvas) {
        char topLeft = '┌';
        char topRight = '┐';
        char bottomLeft = '└';
        char bottomRight = '┘';

        int boxWidth = text.length() + paddingWidth * 2;
        int boxHeight = 3 + paddingHeight * 2;

        for (int i = 0; i < boxHeight; i++) {
            for (int j = 0; j < boxWidth; j++) {
                if (i == 0 && j == 0) {
                    canvas[y + i][x + j] = topLeft;
                } else if (i == 0 && j == boxWidth - 1) {
                    canvas[y + i][x + j] = topRight;
                } else if (i == boxHeight - 1 && j == 0) {
                    canvas[y + i][x + j] = bottomLeft;
                } else if (i == boxHeight - 1 && j == boxWidth - 1) {
                    canvas[y + i][x + j] = bottomRight;
                } else if (i == 0 || i == boxHeight - 1) {
                    canvas[y + i][x + j] = horizontal;
                } else if (j == 0 || j == boxWidth - 1) {
                    canvas[y + i][x + j] = vertical;
                } else {
                    if (i == (boxHeight-2) && j >= paddingWidth && j < paddingWidth + text.length()) {
                        canvas[y + i][x + j] = text.charAt(j - paddingWidth);
                    } else {
                        canvas[y + i][x + j] = ' ';
                    }
                }
            }
        }
    }
}
