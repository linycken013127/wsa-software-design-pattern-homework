package org.example.domain;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class SingletonModelImpl implements Model {
    private static final SingletonModelImpl instance = new SingletonModelImpl();
    private String name;

    private SingletonModelImpl() {
    }

    public static SingletonModelImpl getInstance() {
        return instance;
    }

    @Override
    public void calculate() {

    }

    @Override
    public void change(String name) {
        this.name = name;
    }

    // todo 延遲載入
    private double[][] initMatrix(String name) {
        int rows = 1000;
        int cols = 1000;
        double[][] matrix = new double[rows][cols];
        try (BufferedReader br = new BufferedReader(new FileReader(name))) {
            String line;
            int row = 0;
            while ((line = br.readLine()) != null && row < rows) {
                String[] values = line.split(" ");
                for (int col = 0; col < cols; col++) {
                    matrix[row][col] = Double.parseDouble(values[col]);
                }
                row++;
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return matrix;
    }
}
