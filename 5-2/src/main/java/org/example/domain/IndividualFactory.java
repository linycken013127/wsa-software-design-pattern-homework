package org.example.domain;

import java.util.List;

public abstract class IndividualFactory {
    // 工廠方法 個別實作 必須知道 chromosome 的基因是什麼
    public abstract int calculateFitness(List<Genetic> chromosome);
}
