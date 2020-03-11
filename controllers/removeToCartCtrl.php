<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $idProduct = htmlspecialchars($_GET['id']);

    if (isset($_SESSION['cart']) && array_key_exists($idProduct, $_SESSION['cart'])) {

        if ($_SESSION['cart'][$idProduct]['quantity'] > 1) {
            $_SESSION['cart'][$idProduct]['quantity'] -= 1;
        } else {
            unset($_SESSION['cart'][$idProduct]);
        }
    }
}

header('location: displayCart.php');
exit();
?>