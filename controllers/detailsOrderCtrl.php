<?php
debug($_GET['id']);
if (isset($_GET['id']) && $_GET['id'] > 0) {

    $order = new Order();
    $order_item = new Order_item();
    $order->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    $detailsOrder = $order->getOrder();
debug($detailsOrder);

// Insertion de order_items dans la base de données

    $order_item->id_c19v12_orders = $order->getOrder()->id; // récupération de l'id

    $order_item->createOrderItems();
}
?>
