package org.example.domain;

public class BasicButton extends Button {
    public BasicButton(int x, int y, String text, int paddingWidth, int paddingHeight) {
        super(x, y, text, paddingWidth, paddingHeight);
        corner = '+';
        horizontal = '-';
        vertical = '|';
    }
}
