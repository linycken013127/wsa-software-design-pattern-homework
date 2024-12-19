package org.example.domain;

import java.util.List;

public class NumberedList extends UI {
    protected List<String> lines;
    public boolean uppercase;

    public NumberedList(int x, int y, List<String> lines) {
        super(x, y);
        this.lines = lines;
    }

    public List<String> getLines() {
        return lines;
    }

    @Override
    public void render(char[][] canvas) {

        for (int i = 0; i < lines.size(); i++) {
            String line = (uppercase ? lines.get(i).toUpperCase() : lines.get(i));
            String formattedLine = (i + 1) + ". " + line;

            for (int j = 0; j < formattedLine.length(); j++) {
                canvas[y + i][x + j] = formattedLine.charAt(j);
            }
        }
    }
}
