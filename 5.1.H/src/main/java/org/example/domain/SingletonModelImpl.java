package org.example.domain;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class SingletonModelImpl implements Model {
    private static final SingletonModelImpl instance = new SingletonModelImpl();
    private String name;
    private double[][] matrix;
    private final Object lock = new Object();

    private SingletonModelImpl() {
    }

    public static SingletonModelImpl getInstance() {
        return instance;
    }

    @Override
    public double[] calculate(double[] vector) {
        synchronized (lock) {
            int rows = matrix.length;
            int cols = matrix[0].length;

            if (vector.length != cols) {
                throw new IllegalArgumentException("向量的大小必須等於矩陣的列數！");
            }

            double[] result = new double[rows];
            for (int i = 0; i < rows; i++) {
                for (int j = 0; j < cols; j++) {
                    result[i] += matrix[i][j] * vector[j];
                }
            }
            return result;
        }
    }

    public void change(String name) {
        if (name != null && name.equals(this.name)) {
            return;
        }
        synchronized (lock) {
            this.name = name;
            matrix = initMatrix();
        }
    }

    private double[][] initMatrix() {
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
            throw new RuntimeException("mat 檔案讀取失敗！");
        }

        return matrix;
    }
}
