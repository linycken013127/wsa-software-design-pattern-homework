package org.example.game;

import org.example.logger.Logger;
import org.example.logger.LoggerManager;

import java.util.List;

public class Game {
    private Logger logger;
    private List<AI> players;

    public Game(LoggerManager logger, List<AI> players) {
        this.logger = logger.getLoggerByName("app.game");
        this.players = players;
    }

    public void start() {
        logger.info("The game begins.");

        for (AI ai : players) {
            logger.trace("The player " + ai.getName() + " begins his turn.");
            ai.makeDecision();
            logger.trace("The player " + ai.getName() + " finishes his turn.");
        }

        logger.debug("Game ends.");
    }
}
