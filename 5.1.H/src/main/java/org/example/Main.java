package org.example;

import org.example.domain.Model;
import org.example.domain.Models;
import org.example.domain.ConcreteModels;

import java.util.Arrays;
import java.util.List;
import java.util.concurrent.CompletableFuture;
import java.util.stream.IntStream;

public class Main {
    public static void main(String[] args) {
        long startTime = System.currentTimeMillis();
        Models models = new ConcreteModels();
        List<String> modelNames = Arrays.asList("data/Reflection.mat", "data/Scaling.mat", "data/Shrinking.mat");

        double[] inputArray = new double[1000];
        Arrays.fill(inputArray, 1.0);

        CompletableFuture<?>[] futures = IntStream.range(0, 100)
                .mapToObj(i -> CompletableFuture.runAsync(() -> {
                    Model model1 = models.createModel(modelNames.get(i % 3));
                    double[] r1 = model1.calculate(inputArray);
                    System.out.println("Task " + i + ": " + Arrays.toString(r1));
                }))
                .toArray(CompletableFuture[]::new);

        CompletableFuture.allOf(futures).join();
        System.out.println("All tasks completed.");

        long endTime = System.currentTimeMillis();
        System.out.println("Total time: " + (endTime - startTime) + "ms");
    }
}
