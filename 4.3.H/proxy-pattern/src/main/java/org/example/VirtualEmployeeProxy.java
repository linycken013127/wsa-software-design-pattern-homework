package org.example;


import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class VirtualEmployeeProxy implements Employee {
    private final Database database;
    private final Employee employee;
    private List<Employee> subordinates;

    public VirtualEmployeeProxy(Database database, int id, String name, int age, int[] subordinateIds) {
        this.employee = new RealEmployee(id, name, age, subordinateIds);
        this.database = database;
    }

    private void lazyInitializationSubordinates(){
        if (subordinates == null) {
            subordinates = new ArrayList<>();
            Arrays.stream(employee.getSubordinateIds())
                    .forEach(id -> subordinates.add(database.getEmployeeById(id)));
        }
    }

    @Override
    public int getId() {
        return this.employee.getId();
    }

    @Override
    public String getName() {
        return this.employee.getName();
    }

    @Override
    public int getAge() {
        return this.employee.getAge();
    }

    @Override
    public int[] getSubordinateIds() {
        return this.employee.getSubordinateIds();
    }

    @Override
    public List<Employee> getSubordinates(){
        lazyInitializationSubordinates();
        return subordinates;
    }
}
