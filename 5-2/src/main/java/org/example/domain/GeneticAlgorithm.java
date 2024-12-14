package org.example.domain;

public class GeneticAlgorithm {
    protected int evolutionCount = 0;
    protected int stopCount;
    // 種群 = 初始化種群()
    //fun 基因演算法(種群): 個體 {
    //  for loop 迭代一定的次數:
    //    新的種群 = 基因篩選、交配、變異(種群)
    //  回傳最新種群中最優秀的個體
    //}
    // Evolve 演化
    public Individual algorithm(Population population) {
        for (int i = 0; i < 100; i++) {
            Population currentPopulation = evolve(population);
            if (terminationCondition(currentPopulation)) {
                break;
            }
        }
        return population.bestIndividual();
    }

    // 工廠
    protected boolean terminationCondition(Population currentPopulation) {
        return evolutionCount++ == stopCount;
    }

    private Population evolve(Population population) {
        Population parents = population.crossover(population);
        Population offspring = population.mutation(parents);
        return population.selection(offspring);
    }

    public void setStopCount(int stopCount) {
        this.stopCount = stopCount;
    }
}
