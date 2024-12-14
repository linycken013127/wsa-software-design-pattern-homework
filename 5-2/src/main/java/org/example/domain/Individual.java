package org.example.domain;

import java.util.ArrayList;
import java.util.List;

public class Individual {
    private List<Genetic> chromosome;
    private Integer fitness;
    private IndividualFactory individualFactory;

    public Individual(List<Genetic> chromosome, Integer fitness) {
        this.chromosome = chromosome;
        this.fitness = fitness;
    }

    public List<Genetic> getChromosome() {
        return chromosome;
    }

    public Integer getFitness() {
        return fitness;
    }
}
