package org.example.domain;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

public class ConcreteModels implements Models {
    private Map<String, double[][]> models = new HashMap<>();

    public ConcreteModels() {
        SingletonModel.getInstance().setModels(this);
    }

    public Model createModel(String name) {
        return new ConcreteModel(name);
    }

    @Override
    public double[][] initModel(String name) {
        if (models.containsKey(name)) {
            return models.get(name);
        }

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

        models.put(name, matrix);

        return matrix;
    }
}
