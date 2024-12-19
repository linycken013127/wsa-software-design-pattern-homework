package org.example.domain;

import java.util.List;

public class BasicNumberedList extends NumberedList {
    public BasicNumberedList(int x, int y, List<String> list) {
        super(x, y, list);
        uppercase = false;
    }
}
