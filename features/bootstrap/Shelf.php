<?php

final class Shelf {
    private array $priceMap = array();

    public function setProductPrice($product, float $price): void {
        $this->priceMap[$product] = $price;
    }

    public function getProductPrice($product) {
        return $this->priceMap[$product];
    }
}