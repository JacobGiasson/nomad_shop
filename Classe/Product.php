<?php

class Product {

    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private int $stock;

    public function __construct(string $name, string $description, float $price, int $stock) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;

    }

    public function getData(): array {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock
        ];
    }

    public function isInStock(): bool {
        return $this->stock > 0;
    }
}