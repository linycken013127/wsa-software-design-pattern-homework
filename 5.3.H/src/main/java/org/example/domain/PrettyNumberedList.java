package org.example.domain;

import java.util.List;

public class PrettyNumberedList extends NumberedList {
    public PrettyNumberedList(int x, int y, List<String> list) {
        super(x, y, list);
        uppercase = true;
    }
}
