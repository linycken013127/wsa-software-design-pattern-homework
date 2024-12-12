package org.example.domain;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class ModelsImpl implements Models {
    private Map<String, String> models = new HashMap<>();

    public Model createModel(String name) {
        return new ModelImpl(name);
    }
}
