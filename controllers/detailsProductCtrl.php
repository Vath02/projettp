<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $product = new Product();
    $product->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    $detailsProduct = $product->detailsProduct();
}
?>
