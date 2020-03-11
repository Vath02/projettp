<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $idProduct = htmlspecialchars($_GET['id']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (array_key_exists($idProduct, $_SESSION['cart'])) {
        $_SESSION['cart'][$idProduct]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$idProduct] = ['quantity' => 1];
    }
}

header('location: displayCart.php');
exit();
?>