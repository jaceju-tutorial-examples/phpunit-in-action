<?php
/* tests/CartTest.php */

require __DIR__ . '/../cart.php';

class CartTest extends PHPUnit_Framework_TestCase
{
    public function testCart()
    {
        $products = $GLOBALS['products'];

        // Test 1
        $quantities = [
            1, 0, 0, 0, 0, 0,
        ];
        $products = updateQuantities($quantities, $products);
        $total = updateTotal($products);
        $this->assertEquals(199, $total);

        // Test 2
        $quantities = [
            1, 0, 0, 2, 0, 0,
        ];
        $products = updateQuantities($quantities, $products);
        $total = updateTotal($products);
        $this->assertEquals(797, $total);
    }
}