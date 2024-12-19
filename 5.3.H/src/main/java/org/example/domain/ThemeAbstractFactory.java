package org.example.domain;

import java.util.List;

public interface ThemeAbstractFactory {
    Button createButton(int x, int y, String text, int paddingWidth, int paddingHeight);
    NumberedList createNumberedList(int x, int y, List<String > list);
    Text createText(int x, int y, String text);
}
