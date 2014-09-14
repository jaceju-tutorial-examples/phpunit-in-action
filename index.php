<?php

require __DIR__ . '/cart.php';

session_start();

if (isset($_SESSION['products'])) {
    $products = $_SESSION['products'];
}

if (isset($_SESSION['total'])) {
    $total = $_SESSION['total'];
}

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $quantities = $_POST['quantity'];

    foreach ($quantities as $key => $qty) {
        $products[$key]['quantity'] = $qty;
        $products[$key]['subtotal'] =
            $products[$key]['quantity'] * $products[$key]['price'];
    }

    $_SESSION['products'] = $products;

    $total = 0;
    foreach ($products as $product) {
        $total += $products[$key]['subtotal'];
    }

    $_SESSION['total'] = $total;

    header('Location: /');
    exit;
}

require __DIR__ . '/view.php';
