<?php
if (isset($_GET['id']) && $_GET['id'] > 0) {

    $order = new Order();
    $order_item = new Order_item();
    $order->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    $detailsOrder = $order->getOrder();
}
?>
