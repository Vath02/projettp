<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/product.php';
require_once '../controllers/displayCartCtrl.php';
include 'header.php';

// Permet d'afficher tour à tour chaque quantité produit. Echo en dur
//foreach ($_SESSION['cart'] as $item) {
//    echo $item['quantity'];
//}
?>

<div id="detailsProduct" class="h1 text-center mt-4">Panier de votre commande
</div>
<div class="row justify-content-center"> 
    <div class="col-md-12 text-center mr-4 mt-2">

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />
            <table class="table">
                <thead>

                    <tr class="text-center text-white bg-success">
                        <th scope="col">Catégorie : </th>
                        <th scope="col">Nom : </th>
                        <th scope="col">Référence : </th>
                        <th scope="col">Quantité : </th>

                        <th scope="col">Prix unitaire : </th>
                        <th scope="col">Total : </th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $counter = 0;
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $id => $value) {
                            $orderItem = $orderList[$counter];
                            $subTotal = $orderItem->price * $_SESSION['cart'][$id]['quantity'];
                            ?>
                            <tr class="text-center text-white bg-primary">
                                <td><?= $orderItem->categoryName ?></td> <!-- alias AS -->
                                <td><?= $orderItem->productName ?></td> <!-- alias AS -->
                                <td><?= $orderItem->reference ?></td>
                                <td class="d-flex justify-content-between">
                                    <div><a href="removeToCart.php?id=<?= $id ?>" class="btn bg-secondary text-white ml-5">-</a></div>
                                    <div><?= $_SESSION['cart'][$id]['quantity'] ?></div>
                                    <div><a href="addToCart.php?id=<?= $id ?>" class="btn bg-secondary text-white mr-5">+</a></div>
                                </td>

                                <td><?= $orderItem->price ?> €</td>
                                <td><?= sprintf('%0.2f', $subTotal) . ' €' ?></td> <!-- sprintf() permet d'avoir 2 décimales après la virgule -->
                            </tr>
                            <?php
                            $total += $subTotal;
                            $counter++;
                        }
                    }
                    ?>
                    <tr>
                        <td class="bg-success text-white mb-5 py-2">Montant total hors frais de livraison : <?= sprintf('%0.2f', $total) . ' €' ?></td>
                    </tr>
                    <tr>
                        <td class="bg-success text-white mb-5 py-2">Livraison : <?= ($delivery = ($total > 1) && ($total < 50) ? 5 : 0 ) . ' €' ?></td>
                    </tr>
                    <tr>
                        <td class="bg-success text-white mb-5 py-2">Montant total TTC : 
                            <?php
                            $totalTtc = $delivery + $total;
                            echo sprintf('%0.2f', $totalTtc) . ' €';
                            ?></td>

                    </tr>
                </tbody>
            </table>
        </form>
        <?php if (!isset($_SESSION['cart']) || isset($_SESSION['cart']) && empty($_SESSION['cart'])) { ?>
            <p class="emptyCart text-success">Votre panier est vide</p>
        <?php } ?>

        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <a href="listProduct.php" class="btn bg-primary text-white">Retourner vers la boutique</a>
            </div>
            <div class="col-md-4">
                <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
                <a class="btn bg-primary text-white" href="emptyCart.php">Vider mon panier</a>
                <?php }
                ?>
            </div>
            <div class="col-md-4">
                <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
                <a href="createOrderAndOrder_items.php" class="btn bg-primary text-white">Commander</a>
                <?php }
                ?>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php' ?>
