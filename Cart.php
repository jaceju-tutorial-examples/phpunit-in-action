<?php

class Cart
{
    public function addProduct(Product $product)
    {
    }

    public function checkout()
    {
        throw new CartException('商品配對錯誤');
    }

    public function getTotal()
    {

    }
}

class CartException extends Exception
{
}