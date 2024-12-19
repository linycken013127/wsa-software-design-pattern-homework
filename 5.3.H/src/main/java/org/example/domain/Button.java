package org.example.domain;

public class Button extends UI {
    protected String text;
    protected int paddingWidth;
    protected int paddingHeight;

    protected char corner;
    protected char horizontal;
    protected char vertical;

    public Button(int x, int y, String text, int paddingWidth, int paddingHeight) {
        super(x, y);
        this.text = text;
        this.paddingWidth = paddingWidth;
        this.paddingHeight = paddingHeight;
    }

    public String getText() {
        return text;
    }

    public int getPaddingWidth() {
        return paddingWidth;
    }

    public int getPaddingHeight() {
        return paddingHeight;
    }

    public void renderButton(char[][] canvas, Button button) {
        int startX = button.getX();
        int startY = button.getY();
        String text = button.getText();
        int paddingWidth = button.getPaddingWidth();
        int paddingHeight = button.getPaddingHeight();

        int boxWidth = text.length() + paddingWidth * 2;
        int boxHeight = 3 + paddingHeight * 2;

        for (int i = 0; i < boxHeight; i++) {
            for (int j = 0; j < boxWidth; j++) {
                if (i == 0 && (j == 0 || j == boxWidth - 1)) {
                    canvas[startY + i][startX + j] = corner;
                } else if (i == boxHeight - 1 && (j == 0 || j == boxWidth - 1)) {
                    canvas[startY + i][startX + j] = corner;
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
}
