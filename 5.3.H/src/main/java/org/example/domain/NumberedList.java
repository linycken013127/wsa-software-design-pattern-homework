package org.example.domain;

import java.util.List;

public class NumberedList extends UI {
    private List<String> lines;

    public NumberedList(int x, int y, List<String> lines) {
        super(x, y);
        this.lines = lines;
    }

    public List<String> getLines() {
        return lines;
    }
}
