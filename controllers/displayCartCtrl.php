<?php
$product = new Product();

$orderList = array();

if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $id => $item) {
        $product->id = $id;

        $orderList[] = $product->detailsProduct();
    }
}
?>