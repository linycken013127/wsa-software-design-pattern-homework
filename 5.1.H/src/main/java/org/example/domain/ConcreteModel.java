package org.example.domain;

public class ConcreteModel implements Model {
    private String name;
    private SingletonModel singletonModel = SingletonModel.getInstance();

    public ConcreteModel(String name) {
        this.name = name;
    }

    @Override
    public double[] calculate(double[] inputArray) {
        if (singletonModel.getName() == null || !singletonModel.getName().equals(name)) {
            singletonModel.initMatrix(name);
        }
        return singletonModel.calculate(inputArray);
    }
}
