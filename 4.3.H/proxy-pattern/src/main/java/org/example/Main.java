package org.example;

import java.util.List;

public class Main {
    public static void main(String[] args) {
        ProtectionDatabaseProxy database = new ProtectionDatabaseProxy("1qaz2wsx");
        VirtualEmployeeProxy employee = database.getEmployeeById(2);
        if (employee == null) {
            System.out.println("Employee not found");
            return;
        }

        System.out.printf("Employee: id=%d, name=%s, age=%d\n", employee.getId(), employee.getName(), employee.getAge());

        List<Employee> subordinates = employee.getSubordinates();
        if (subordinates == null) {
            System.out.println("No subordinates");
            return;
        }
        for (Employee subordinate : subordinates) {
            System.out.printf("Subordinate: id=%d, name=%s, age=%d\n", subordinate.getId(), subordinate.getName(), subordinate.getAge());
        }
    }
}
