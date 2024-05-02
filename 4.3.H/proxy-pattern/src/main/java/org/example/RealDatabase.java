package org.example;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.Arrays;
import java.util.List;

public class RealDatabase implements Database {
    private static final String FILE_NAME = "table.txt";

    @Override
    public VirtualEmployeeProxy getEmployeeById(int id) {
        try {
            // TODO 這邊 OOM 會炸
            List<String> lines = Files.readAllLines(Paths.get(FILE_NAME));

            return lines.stream()
                    .skip(1)
                    .map(line -> line.split(" "))
                    .filter(parts -> Integer.parseInt(parts[0]) == id)
                    .findFirst()
                    .map(parts -> {
                        int[] subordinateIds = parts.length == 4 ? Arrays.stream(parts[3].split(",")).mapToInt(Integer::parseInt).toArray() : null;
                        return new VirtualEmployeeProxy(this, id, parts[1], Integer.parseInt(parts[2]), subordinateIds);
                    })
                    .orElse(null);
        } catch (IOException e) {
            e.printStackTrace();
        }
        return null;
    }
}
