package org.example.domain;

import java.util.List;

public class PrettyAbstractFactory implements ThemeAbstractFactory {
    @Override
    public Button createButton(int x, int y, String text, int paddingWidth, int paddingHeight) {
        return new PrettyButton(x, y, text, paddingWidth, paddingHeight);
    }

    @Override
    public NumberedList createNumberedList(int x, int y, List<String> list) {
        return new PrettyNumberedList(x, y, list);
    }

    @Override
    public Text createText(int x, int y, String text) {
        return new PrettyText(x, y, text);
    }
}
