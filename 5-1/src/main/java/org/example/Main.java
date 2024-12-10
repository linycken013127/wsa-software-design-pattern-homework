package org.example;

import org.example.domain.Model;
import org.example.domain.Models;
import org.example.domain.ModelsImpl;

public class Main {
    public static void main(String[] args) {
        Models models = new ModelsImpl();
        Model model1 = models.createModule("data/Reflection.mat");
        Model model2 = models.createModule("data/Scaling.mat");
        Model model3 = models.createModule("data/Shrinking.mat");
    }
}