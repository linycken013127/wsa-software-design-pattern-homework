package org.example;

import java.util.List;

public class RealEmployee implements Employee {
    private final int id;
    private String name;
    private int age;
    private int[] subordinateIds;
    private List<Employee> subordinates;

    public RealEmployee(int id, String name, int age, int[] subordinateIds) {
        this.id = id;
        this.name = name;
        this.age = age;
        this.subordinateIds = subordinateIds;
    }

    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public int getAge() {
        return age;
    }

    public int[] getSubordinateIds() {
        return subordinateIds;
    }

    public List<Employee> getSubordinates() {
        return subordinates;
    }
}
