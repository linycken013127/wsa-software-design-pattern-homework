package org.example.logger;

import org.example.logger.exporter.Exporter;
import org.example.logger.layout.Layout;

public class Logger {
    private String name;
    private Logger parent;
    private Level level;
    private Exporter exporter;
    private Layout layout;

    public Logger(Level level, Exporter exporter, Layout layout) {
        this.level = level;
        this.exporter = exporter;
        setLayout(layout);
    }

    public Logger() {

    }

    public void log(Level level, String message) {
        if (levelThreshold(level)) {
            exporter.output(layout.format(level, message));
        }
    }

    private boolean levelThreshold(Level level) {
        return level.ordinal() >= this.level.ordinal();
    }

    public void trace(String message) {
        log(Level.TRACE, message);
    }

    public void info(String message) {
        log(Level.INFO, message);
    }

    public void debug(String message) {
        log(Level.DEBUG, message);
    }

    public void warn(String message) {
        log(Level.WARN, message);
    }

    public void error(String message) {
        log(Level.ERROR, message);
    }

    public String getName() {
        return name;
    }

    public Level getLevel() {
        return level;
    }

    public Exporter getExporter() {
        return exporter;
    }

    public Layout getLayout() {
        return layout;
    }

    public Logger getParent() {
        return parent;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setLevel(Level level) {
        this.level = level;
    }

    public void setExporter(Exporter exporter) {
        this.exporter = exporter;
    }

    public void setLayout(Layout layout) {
        this.layout = layout;
        if (this.layout != null) {
            this.layout.setLogger(this);
        }
    }

    public void setParent(Logger parent) {
        this.parent = parent;
    }
}
