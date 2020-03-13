<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $order = new Order();
    $order_item = new Order_item();
    $order->id_c19v12_users = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    $listOrder = $order->getOrderByUser();

}
?>
