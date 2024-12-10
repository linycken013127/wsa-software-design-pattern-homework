package org.example.domain;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class ModelImpl implements Model {
    private double[][] matrix;
    private String name;
    private SingletonModelImpl singletonModel = SingletonModelImpl.getInstance();

    public ModelImpl(String name) {
        this.name = name;
        singletonModel.change(name);
    }

    @Override
    public void calculate() {

    }

    public void change(String name) {
        throw new UnsupportedOperationException();
    }
}
