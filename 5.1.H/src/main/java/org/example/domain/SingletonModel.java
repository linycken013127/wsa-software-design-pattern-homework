package org.example.domain;

public class SingletonModel implements Model {
    private static final SingletonModel instance = new SingletonModel();
    private String name;
    private double[][] matrix;
    private Models models;
    private final Object lock = new Object();

    private SingletonModel() {
    }

    public static SingletonModel getInstance() {
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
        }
    }

    protected void initMatrix(String name) {
        if (this.name != null && this.name.equals(name)) {
            return;
        }

        synchronized (lock) {
            matrix = models.initModel(name);
            this.name = name;
        }
    }

    public void setModels(Models models) {
        this.models = models;
    }

    public String getName() {
        return name;
    }
}
