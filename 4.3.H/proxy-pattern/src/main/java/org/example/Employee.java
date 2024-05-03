package org.example;

import java.util.List;

public interface Employee {
    int getId();
    String getName();
    int getAge();
    int[] getSubordinateIds();
    List<Employee> getSubordinates();
}
