package org.example.domain;

public abstract class UI {
    protected int x;
    protected int y;

    public UI(int x, int y) {
        this.x = x;
        this.y = y;
    }

    public int getX() {
        return x;
    }

    public int getY() {
        return y;
    }
}
