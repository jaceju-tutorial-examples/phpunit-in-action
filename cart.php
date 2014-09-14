<?php

$products = [
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

$total = 0;

function updateQuantities($quantities, $products)
{
    foreach ($quantities as $key => $qty) {
        $products[$key]['quantity'] = $qty;
        $products[$key]['subtotal'] =
            $products[$key]['quantity'] * $products[$key]['price'];
    }

    return $products;
}

function updateTotal($products)
{
    $total = 0;
    foreach ($products as $key => $product) {
        $total += $products[$key]['subtotal'];
    }
    return $total;
}

// 測試碼
if (isset($argv[1]) && 'debug' === strtolower($argv[1])) {

    // Test 1
    $quantities = [
        1, 0, 0, 0, 0, 0,
    ];
    $products = updateQuantities($quantities, $products);
    $total = updateTotal($products);
    if (199 !== $total) {
        echo "Test 1 failed!\n";
    } else {
        echo "Test 1 OK!\n";
    }

    // Test 2
    $quantities = [
        1, 0, 0, 2, 0, 0,
    ];
    $products = updateQuantities($quantities, $products);
    $total = updateTotal($products);
    if (797 !== $total) {
        echo "Test 2 failed!\n";
    } else {
        echo "Test 2 OK!\n";
    }
}