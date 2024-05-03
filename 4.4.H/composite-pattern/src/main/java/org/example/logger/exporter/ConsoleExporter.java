package org.example.logger.exporter;

public class ConsoleExporter implements Exporter {
    @Override
    public void output(String message) {
        System.out.println(message);
    }
}
