<?php

//Toutes regex pour le formulaire
$regexNumber = '/^[a-zA-Z0-9 -]+$/';
$regexStatus = '/^[a-zA-ZÀ-ÿ\' -]+$/';
$regexQuantity = '/^[0-9]{1,2}$/';
//$regexDate = '/^(19|20)[0-9]{2}-[0-9]{2}-[0-9]{2}$/';
//$regexHour = '/^[0-9]{2}:[0-9]{2}$/';

if (!empty($_SESSION['cart'])) {

    // Création d'une instance de classe Order. Instance de classe = OBJET
    $order = new Order();
    // Création d'une instance de classe Order_item.
    $orderItem = new Order_item();

    $maxRefNum = $order->getMaxNumber();
    if (empty($maxRefNum)) {
        $order->number = 1000;  //Initialisation du numéro de réference de base
    } else {
        $order->number = $maxRefNum + 1;
    }
    $order->status = 'en cours';
    $order->id_c19v12_users = htmlspecialchars($_SESSION['user_id']);

    try {

        // Démarrage de la transaction
        $order->beginTransaction();

        // Création du nouveau order
        $successOrder = $order->createOrder();

        // Récupération du dernier ID de order créé
        $lastOrderId = $order->lastInsertId();

        // Création du orders_items (menu de la commande)

        foreach ($_SESSION['cart'] as $idProduct => $detail) {
            $orderItem->quantity = $detail['quantity'];
            $orderItem->id_c19v12_products = $idProduct;
            $orderItem->id_c19v12_orders = $lastOrderId;

            $orderItem->createOrderItems();
        }

        // Commit de la transaction qui applique de façon permanente les changements
        $order->commit();

        unset($_SESSION['cart']);

        // Redirection vers la page affichant la liste des produits
        header('Location: delivery.php');
        exit();
    } catch (Exception $ex) {
        // Rolls back de la transaction qui annule les changements opérés
        $order->rollBack();

        die('Error : ' . $e->getMessage());
    }
}
?>