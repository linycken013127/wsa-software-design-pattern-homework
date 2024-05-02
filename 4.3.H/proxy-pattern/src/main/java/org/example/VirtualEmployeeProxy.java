package org.example;


import java.util.stream.IntStream;

public class VirtualEmployeeProxy implements Employee {
    private final Database database;
    private final Employee employee;
    private Employee[] subordinates;

    public VirtualEmployeeProxy(Database database, int id, String name, int age, int[] subordinateIds) {
        this.employee = new RealEmployee(id, name, age, subordinateIds);
        this.database = database;
    }

    private void lazyInitializationSubordinates(){
        if (subordinates == null) {
            subordinates = new Employee[this.employee.getSubordinateIds().length];

            IntStream.range(0, this.employee.getSubordinateIds().length)
                    .forEach(i -> subordinates[i] = database.getEmployeeById(this.employee.getSubordinateIds()[i]));
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
    public Employee[] getSubordinates(){
        lazyInitializationSubordinates();
        return subordinates;
    }
}
