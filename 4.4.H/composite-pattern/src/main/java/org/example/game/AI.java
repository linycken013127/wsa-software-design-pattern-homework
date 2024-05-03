package org.example.game;

import org.example.logger.Logger;
import org.example.logger.LoggerManager;

import java.util.Scanner;

public class AI {
    private final String name;
    private Logger logger;
    public AI(LoggerManager logger, String name) {
        this.logger = logger.getLoggerByName("app.game.ai");
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public void makeDecision() {
        logger.trace(String.format("%s starts making decisions...", getName()));

        logger.warn(String.format("%s decides to give up.", getName()));
        logger.error("Something goes wrong when AI gives up.");

        logger.trace(String.format("%s completes its decision.", getName()));
    }
}
