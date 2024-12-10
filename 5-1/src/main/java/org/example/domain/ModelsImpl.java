package org.example.domain;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class ModelsImpl implements Models {
    private Map<String, String> models = new HashMap<>();


    public Model createModule(String name) {
        // return 每次都是新的
//        double[][] data = initMatrix(name);
        return new ModelImpl(name);
    }
}
