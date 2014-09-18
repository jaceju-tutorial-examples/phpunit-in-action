<?php

class Cart
{
    private $products = [
        'R' => [],
        'G' => [],
    ];

    private $total = 0;

    public function addProduct(Product $product)
    {
        // 將紅標商品和綠標商品分組存放。
        $this->products[$product->getTag()][] = $product;
    }

    public function checkout()
    {
        // 比對紅標商品數是否等於綠標商品數
        $redCount = count($this->products['R']);
        $greenCount = count($this->products['G']);

        if ($redCount !== $greenCount) {
            throw new CartException('商品配對錯誤');
        }

        foreach ($this->products['R'] as $product) {
            $this->total += $product->getPrice();
        }

        foreach ($this->products['G'] as $product) {
            $this->total += $product->getPrice();
        }

        $this->total *= 0.75;
    }

    public function getTotal()
    {
        return $this->total;
    }
}

class CartException extends Exception
{
}