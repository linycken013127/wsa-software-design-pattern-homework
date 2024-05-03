package org.example.logger.exporter;

import java.io.FileWriter;

public class FileExporter implements Exporter {
    private final String file;
    public FileExporter(String file) {
        this.file = file;
    }

    @Override
    public void output(String message) {
        try {
            FileWriter file = new FileWriter(this.file, true);
            message += "\n";
            file.write(message);
            file.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
