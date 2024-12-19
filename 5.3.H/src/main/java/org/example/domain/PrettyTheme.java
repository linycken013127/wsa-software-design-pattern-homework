package org.example.domain;


public class PrettyTheme extends Theme {
    private ThemeAbstractFactory factory;

    public PrettyTheme(ThemeAbstractFactory factory) {
        this.factory = factory;
    }

    @Override
    public ThemeAbstractFactory getFactory() {
        return factory;
    }

}
