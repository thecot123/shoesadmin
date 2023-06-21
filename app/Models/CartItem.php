<?php

namespace App\Models;

class CartItem
{
    public $product;
    public $quantity;
    public $size;

    public function __construct(Product $product, int $quantity, string $size)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->size = $size;
    }
}