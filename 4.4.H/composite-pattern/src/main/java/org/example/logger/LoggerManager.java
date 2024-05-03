package org.example.logger;

import org.example.logger.exporter.Exporter;
import org.example.logger.layout.Layout;

import java.util.HashMap;
import java.util.Map;
import java.util.Optional;

public class LoggerManager {
    private final Logger rootLogger;
    private final Map<String, Logger> loggers = new HashMap<>();

    public LoggerManager(Logger rootLogger) {
        this.rootLogger = rootLogger;
        this.rootLogger.setName("root");
        loggers.put("root", rootLogger);
    }

    public Logger getRootLogger() {
        return rootLogger;
    }

    public Logger getLoggerByName(String name) {
        return loggers.get(name);
    }

    public void addLogger(String parentName, String name, Logger logger, Optional<Level> level, Optional<Exporter> exporter, Optional<Layout> layout) {
        if (loggers.containsKey(name)) {
            throw new IllegalArgumentException("Logger with name " + name + " already exists.");
        }
        Logger parent = getLoggerByName(parentName);
        logger.setParent(parent);

        // Force: OCP 每當 logger 結構變動 Code 也要跟著改
        if (level.isEmpty()) {
            logger.setLevel(parent.getLevel());
        } else {
            logger.setLevel(level.get());
        }

        if (exporter.isEmpty()) {
            logger.setExporter(parent.getExporter());
        } else {
            logger.setExporter(exporter.get());
        }

        if (layout.isEmpty()) {
            logger.setLayout(parent.getLayout());
        } else {
            logger.setLayout(layout.get());
        }

        logger.setName(name);
        loggers.put(name, logger);
    }
}
