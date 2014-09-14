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

    $products = updateQuantities($_POST['quantity'], $products);
    $_SESSION['products'] = $products;

    $total = updateTotal($products);
    $_SESSION['total'] = $total;

    header('Location: /');
    exit;
}

require __DIR__ . '/view.php';