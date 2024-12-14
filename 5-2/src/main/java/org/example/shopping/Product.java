package org.example.shopping;

public class Product {
    private int price;
    private int weight;
    private String category;

    public Product(int price, int weight, String category) {
        this.price = price;
        this.weight = weight;
        this.category = category;
    }

    public int getPrice() {
        return price;
    }

    public int getWeight() {
        return weight;
    }

    public String getCategory() {
        return category;
    }
}
