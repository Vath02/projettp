<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/order.php';
require_once '../models/order_item.php';
require_once '../controllers/detailsOrderCtrl.php';
require_once 'header.php';
?>

<div id="detailsProduct" class="h1 text-center mt-4">DÉTAILS DE MA COMMANDE</div>
<div class="row justify-content-center"> 
    <div class="col-md-12 text-center mr-4 mt-2">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="card" style="width: 25%;">

                <img src="../assets/img/vatmintonLogo_45x45.png" class="card-img-top" alt="vatminton">
                <div class="card-body">
                    <div class="card-title text-center">Votre numéro de commande : <?= $detailsOrder->number ?></div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p>Status : </p><?= $detailsOrder->status ?></li>
                </ul>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-8 border-right border-primary pr-4">
                                    <h5 class="text-primary">Confirmation :</h5>
                                    <p class="mt-3 mb-4">Confirmez-vous votre commande</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="../views/createOrderAndOrder_items.php">
                        <input type="button" class="btn bg-success py-2 px-5" value="oui" /></a>
                    <a href="../views/listProduct.php">
                        <input type="button" class="btn bg-danger py-2 px-5" value="non" /></a>
                </div>

            </div>
        </form>
    </div>
</div>


<?php include 'footer.php'; ?>