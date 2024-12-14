package org.example.domain;

import java.util.ArrayList;
import java.util.List;

public class Population {
    private List<Individual> individual = new ArrayList<>();

    // 樣板
    public Individual bestIndividual() {
        // 找出適應度最高的個體
        individual.sort((o1, o2) -> o2.getFitness() - o1.getFitness());
        return individual.get(0);
    }


    // Tournament Selection x
    // Rank Selection v
    // force BV type
    public Population selection(Population population) {
        // 選擇 Individuals 中適應度最高的個體
        // 假設要選取 4 個個體參與下一代的交配和繁殖，可以從原有的個體中隨機選取 2 個進行比較，再從剩下的個體中隨機選取 2 個進行比較，最後在這兩組比較中選出適應度最好的 2 個個體參與下一代的交配和繁殖。
        // 亂數從 individual.size() 中選取 2 個個體進行比較

//        Population parents = new Population();
//
//        for (int i = 0; i < individual.size(); i++) {
//            // 將 individual 亂數取出
//            int rand1 = (int) (Math.random() * individual.size());
//            Individual individual1 = individual.get(rand1);
//            individual.remove(rand1);
//
//            int rand2 = (int) (Math.random() * individual.size());
//            Individual individual2 = individual.get(rand2);
//            individual.remove(rand2);
//
//            if (individual1.getFitness() > individual2.getFitness()) {
//                parents.add(individual1);
//            } else {
//                parents.add(individual2);
//            }
//        }

        // 將 individual 依照適應度進行排序
        individual.sort((o1, o2) -> o2.getFitness() - o1.getFitness());
        Population parents = new Population();
        parents.add(individual.get(0));
        parents.add(individual.get(1));
        return parents;
    }

    // force BV type
    // 一點 v
    // 兩點 x
    // 均勻 x
    public Population crossover(Population parents) {
        // 隨機挑選兩個個體 做單點交配 => 從個體中取得任意一種基因進行交換
        Population Offspring = new Population();
        Individual parent1 = parents.individual.get(0);
        Individual parent2 = parents.individual.get(1);

        // getGenes() 隨機選一個 type 不知道 並且是各種 type <= 創建不出來
        int random = (int) (Math.random() * parent1.getChromosome().size());
        // 先假設 list 依照 gene 有特定排序
        Genetic gene1 = parent1.getChromosome().get(random);
        Genetic gene2 = parent2.getChromosome().get(random);

        // 交換基因
        parent1.getChromosome().set(random, gene2);
        parent2.getChromosome().set(random, gene1);

        Offspring.add(parent1);
        Offspring.add(parent2);
        return Offspring;
    }

    // 隨機替換一個基因
    // force BV
    // 反轉
    public Population mutation(Population population) {
        // 隨機挑選一個基因進行突變

        Population newPopulation = new Population();

        for (Individual individual : population.individual) {
            int random = (int) (Math.random() * individual.getChromosome().size());
            Genetic gene = individual.getChromosome().get(random);
            individual.getChromosome().set(random, gene);
            newPopulation.add(individual);
        }

        return newPopulation;
    }

    public void add(Individual individual) {
        this.individual.add(individual);
    }
}
