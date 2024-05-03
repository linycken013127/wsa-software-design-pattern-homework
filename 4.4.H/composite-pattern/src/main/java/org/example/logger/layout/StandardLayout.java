package org.example.logger.layout;

import org.example.logger.Level;
import org.example.logger.Logger;

import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

public class StandardLayout implements Layout {
    private Logger logger;

    @Override
    public String format(Level level, String message) {
        String timestamp = LocalDateTime.now().format(DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss.SSS"));
        return String.format("%s |-%s %s - %s", timestamp, level.toString(), logger.getName(), message);
    }

    @Override
    public void setLogger(Logger logger) {
        this.logger = logger;
    }
}
