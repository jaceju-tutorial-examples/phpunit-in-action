<?php
/* tests/CartTest.php */

require __DIR__ . '/../Cart.php';

class CartTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     * @group update
     */
    public function testUpdateQuantitiesAndGetTotal($quantities, $expected)
    {
        $cart = new Cart();
        $cart->updateQuantities($quantities);
        $this->assertEquals($expected, $cart->getTotal());
    }

    public function provider()
    {
        return [
            [ [ 1, 0, 0, 0, 0, 0 ], 199 ],
            [ [ 1, 0, 0, 2, 0, 0 ], 797 ],
        ];
    }

    /**
     * @group update
     * @group exception
     */
    public function testUpdateQuantitiesWithException()
    {
        $this->setExpectedException('CartException');
        $cart = new Cart();
        $quantities = [ -1, 0, 0, 0, 0, 0 ];
        $cart->updateQuantities($quantities); // 預期會產生一個 Exception
    }

    /**
     * @group get
     */
    public function testGetProducts()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(0, $products[3]['quantity']);
    }
}