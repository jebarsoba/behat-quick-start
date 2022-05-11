<?php

final class Basket implements Countable {
    private Shelf $shelf;
    private array $products;
    private float $productsPrice = 0.0;

    public function __construct(Shelf $shelf) {
        $this->shelf = $shelf;
    }

    public function addProduct($product): void {
        $this->products[] = $product;
        $this->productsPrice += $this->shelf->getProductPrice($product);
    }

    public function count(): int {
        return count($this->products);
    }

    public function getTotalPrice(): float {
        return $this->productsPrice
            + $this->calculateVAT($this->productsPrice)
            + $this->calculateDeliveryCost($this->productsPrice);
    }

    private function calculateVAT($productsPrice): float {
        return $productsPrice * 0.2;
    }

    private function calculateDeliveryCost($productsPrice): float {
        return $productsPrice > 10 ? 2.0 : 3.0;
    }
}