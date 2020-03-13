<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/order.php';
require_once '../models/order_item.php';
require_once '../controllers/listOrderCtrl.php';
require_once 'header.php';
?>

<div id="detailsProduct" class="h1 text-center mt-4">LISTE DE TOUTES MES COMMANDES
</div>
<div class="row justify-content-center"> 
    <div class="col-md-12 text-center mr-4 mt-2">
        <table class="table table-responsive">
            <thead>
                <tr class="text-center text-white bg-success">
                    <th scope="col">Numéro(s) de commande(s) : </th>
                    <th scope="col">Status : </th>
                    <th scope="col">Détails : </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listOrder as $listOrder) { ?>
                    <tr class="text-center text-white bg-primary">
                        <td><?= $listOrder->number ?></td> 
                        <td><?= $listOrder->status ?></td>
                        <td><a class="text-white" href="../views/detailsOrder.php?id=<?= $listOrder->id ?>">voir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>
</div>

<?php include 'footer.php'; ?>