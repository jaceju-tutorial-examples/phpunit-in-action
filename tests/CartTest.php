<?php
/* tests/CartTest.php */

require __DIR__ . '/../Cart.php';

class CartTest extends PHPUnit_Framework_TestCase
{
    public function testUpdateQuantitiesAndGetTotal()
    {
        $cart = new Cart();

        // Test 1
        $quantities = [
            1, 0, 0, 0, 0, 0,
        ];
        $cart->updateQuantities($quantities);
        $this->assertEquals(199, $cart->getTotal());

        // Test 2
        $quantities = [
            1, 0, 0, 2, 0, 0,
        ];
        $cart->updateQuantities($quantities);
        $this->assertEquals(797, $cart->getTotal());
    }

    public function testGetProducts()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(2, $products[3]['quantity']);
    }
}