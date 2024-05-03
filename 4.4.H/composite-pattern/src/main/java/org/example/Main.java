package org.example;

import org.example.game.AI;
import org.example.game.Game;
import org.example.logger.*;
import org.example.logger.exporter.CompositeExporter;
import org.example.logger.exporter.ConsoleExporter;
import org.example.logger.exporter.FileExporter;
import org.example.logger.layout.StandardLayout;

import java.util.ArrayList;
import java.util.List;
import java.util.Optional;

public class Main {
    public static void main(String[] args) {
        LoggerManager logger = new LoggerManager(new Logger(Level.DEBUG, new ConsoleExporter(), new StandardLayout()));
        logger.addLogger(
                "root",
                "app.game",
                new Logger(),
                Optional.of(Level.INFO),
                Optional.of(new CompositeExporter(
                        new ConsoleExporter(),
                        new CompositeExporter(
                                new FileExporter("game.log"),
                                new FileExporter("game.backup.log")
                        )
                )),
                Optional.of(new StandardLayout())
        );

        logger.addLogger("app.game",
                "app.game.ai",
                new Logger(),
                Optional.of(Level.TRACE),
                Optional.empty(),
                Optional.of(new StandardLayout())
        );

        List<AI> players = new ArrayList<>();
        for (int i = 1; i <= 4; i++) {
            players.add(new AI(logger, "AI " + i));
        }

        Game game = new Game(logger, players);
        game.start();
    }
}
