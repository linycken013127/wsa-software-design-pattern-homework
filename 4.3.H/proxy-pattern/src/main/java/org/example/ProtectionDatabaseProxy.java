package org.example;

public class ProtectionDatabaseProxy implements Database {
    private final RealDatabase realDatabase;
    private final String PASSWORD = "1qaz2wsx";
    private String password;

    public ProtectionDatabaseProxy(String password) {
        this.password = password;
        this.realDatabase = new RealDatabase();
    }

    @Override
    public VirtualEmployeeProxy getEmployeeById(int id) {
        if (password.equals(PASSWORD)) {
            return realDatabase.getEmployeeById(id);
        } else {
            throw new IllegalArgumentException("Password is incorrect!");
        }
    }

}
