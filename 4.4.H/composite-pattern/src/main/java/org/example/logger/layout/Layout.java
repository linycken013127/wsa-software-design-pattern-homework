package org.example.logger.layout;

import org.example.logger.Level;
import org.example.logger.Logger;

public interface Layout {
    String format(Level level, String message);

    void setLogger(Logger logger);
}
