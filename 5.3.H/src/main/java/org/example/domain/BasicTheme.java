package org.example.domain;

public class BasicTheme extends Theme {
    private ThemeAbstractFactory factory;

    public BasicTheme(ThemeAbstractFactory factory) {
        this.factory = factory;
    }

    public ThemeAbstractFactory getFactory() {
        return factory;
    }
}
