package org.example.shopping;

import org.example.domain.Genetic;
import org.example.domain.GeneticAlgorithm;
import org.example.domain.Individual;
import org.example.domain.Population;

import java.util.ArrayList;
import java.util.List;
import java.util.Map;

// 目標：適應度最高 => 喜好度
// 適應度：喜好度
// 基因：預算 (Budget) 、購物袋的最大承載重量 (Capacity) 和客戶對各類產品的喜好度
// 個體：一個推薦清單（基因+適應度）
// 種群：多個推薦清單
public class ShoppingRecommend {
    private int budget = 700;
    private int capacity = 10;

    private List<Product> products = List.of(
            new Product(100, 2, "A"),
            new Product(200, 3, "A"),
            new Product(150, 5, "B"),
            new Product(300, 4, "B"),
            new Product(180, 6, "C"),
            new Product(250, 7, "C")
    );

    private Map<String, Double> preference = Map.of(
            "A", 0.8,
            "B", 0.6,
            "C", 0.2
    );

    public int calculateFitness(List<Genetic> chromosome) {
        // 但基因要給 calculateFitness 做計算
        int totalPrice = 0;
        for (int i = 0; i < chromosome.size(); i++) {
            // 取得基因 => 基因是什麼不知道
            totalPrice += (int) chromosome.get(i).getValue() * products.get(i).getPrice();
        }

        int totalWeight = 0;
        for (int i = 0; i < chromosome.size(); i++) {
            totalWeight += (int) chromosome.get(i).getValue() * products.get(i).getWeight();
        }

        double totalPreference = 0;
        for (int i = 0; i < chromosome.size(); i++) {
            if (i == 0 || i == 1) {
                totalPreference += (int) chromosome.get(i).getValue() * preference.get("A");
            } else if (i == 2 || i == 3) {
                totalPreference += (int) chromosome.get(i).getValue() * preference.get("B");
            } else {
                totalPreference += (int) chromosome.get(i).getValue() * preference.get("C");
            }
        }

        if (totalPrice > budget || totalWeight > capacity) {
            return 0;
        } else {
            return (int) totalPreference;
        }
    }

    public Individual algo() {
        Population p = initPopulation();
        GeneticAlgorithm ga = new GeneticAlgorithm();
        return ga.algorithm(p);
    }

    private Population initPopulation() {
        Population population = new Population();
        List<Genetic> chromosome = new ArrayList<>();
        chromosome.addAll(
                List.of(
                        new Genetic(1),
                        new Genetic(1),
                        new Genetic(1),
                        new Genetic(1),
                        new Genetic(1),
                        new Genetic(1)
                )
        );
        List<Genetic> chromosome2 = new ArrayList<>();
        chromosome2.addAll(
                List.of(
                        new Genetic(0),
                        new Genetic(0),
                        new Genetic(0),
                        new Genetic(0),
                        new Genetic(0),
                        new Genetic(0)
                )
        );

        List<Genetic> chromosome3 = new ArrayList<>();
        chromosome3.addAll(
                List.of(
                        new Genetic(1),
                        new Genetic(0),
                        new Genetic(1),
                        new Genetic(0),
                        new Genetic(1),
                        new Genetic(0)
                )
        );

        List<Genetic> chromosome4 = new ArrayList<>();
        chromosome4.addAll(
                List.of(
                        new Genetic(0),
                        new Genetic(1),
                        new Genetic(0),
                        new Genetic(1),
                        new Genetic(0),
                        new Genetic(1)
                )
        );


        population.add(new Individual(chromosome, calculateFitness(chromosome)));

        population.add(new Individual(chromosome2, calculateFitness(chromosome2)));

        population.add(new Individual(chromosome3, calculateFitness(chromosome3)));

        population.add(new Individual(chromosome4, calculateFitness(chromosome4)));

        return population;
    }
}
