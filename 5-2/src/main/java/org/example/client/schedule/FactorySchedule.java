package org.example.client.schedule;

import org.example.domain.GeneticAlgorithm;
import org.example.domain.Population;

import java.util.List;

// 目標：適應度最高 => 最短時間滿足數量
// 適應度：時間越短，適應度越高
// 基因：生產時間、機器和工人的使用進行組合
// 個體：一個生產計劃（基因+適應度）
// 種群：多個生產計劃
public class FactorySchedule extends GeneticAlgorithm {
    private List<Product> products = List.of(
            new Product("A", 2, 100),
            new Product("B", 4, 200),
            new Product("C", 6, 300)
    );

    @Override
    protected boolean terminationCondition(Population currentPopulation) {
        return false;
    }
}
