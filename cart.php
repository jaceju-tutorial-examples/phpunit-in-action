<?php

class Cart
{
    private $products = [
        [
            'name'     => 'iPhone 6 (16G)',
            'quantity' => 0,
            'price'    => 199,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 (64G)',
            'quantity' => 0,
            'price'    => 299,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 (128G)',
            'quantity' => 0,
            'price'    => 399,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 Plus (16G)',
            'quantity' => 0,
            'price'    => 299,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 Plus (64G)',
            'quantity' => 0,
            'price'    => 399,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 Plus (128G)',
            'quantity' => 0,
            'price'    => 499,
            'subtotal' => 0,
        ],
    ];

    private $total = 0;

    public function getProducts()
    {
        return $this->products;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function updateQuantities($quantities)
    {
        foreach ($quantities as $key => $qty) {
            $this->products[$key]['quantity'] = $qty;
            $this->products[$key]['subtotal'] =
                $this->products[$key]['quantity'] *
                $this->products[$key]['price'];
        }

        $this->total = 0;
        foreach ($this->products as $key => $product) {
            $this->total += $product['subtotal'];
        }
    }

    public function __sleep()
    {
        return ['products', 'total'];
    }
}

// 測試碼
if (isset($argv[1]) && 'test' === strtolower($argv[1])) {

    $cart = new Cart();

    // Test 1
    $quantities = [
        1, 0, 0, 0, 0, 0,
    ];
    $cart->updateQuantities($quantities);
    if (199 !== $cart->getTotal()) {
        echo "Test 1 failed!\n";
    } else {
        echo "Test 1 OK!\n";
    }

    // Test 2
    $quantities = [
        1, 0, 0, 2, 0, 0,
    ];
    $cart->updateQuantities($quantities);
    if (797 !== $cart->getTotal()) {
        echo "Test 2 failed!\n";
    } else {
        echo "Test 2 OK!\n";
    }
}