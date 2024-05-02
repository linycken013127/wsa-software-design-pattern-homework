package org.example;

public interface Employee {
    int getId();
    String getName();
    int getAge();
    int[] getSubordinateIds();
    Employee[] getSubordinates();
}
