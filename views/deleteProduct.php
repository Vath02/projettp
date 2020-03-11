<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/product.php';
require_once '../controllers/deleteProductCtrl.php';
require_once '../views/header.php';
?>
<div class="row">
    <div class="col-md-12 text-center my-5">Êtes-vous sûr de vouloir supprimer le produit ?</div>
</div>
<div class="row">
    <div class="col-md-6 text-center">
        <a class="btn  bg-success mx-5" href="../views/detailsProduct.php">Annuler</a>
    </div>
    <div class="col-md-6 text-center">
        <a href="deleteProduct.php?id=<?= $product->id ?>&confirm=true" class="btn bg-danger mx-5">Confirmer</a>
    </div>
</div>

<?php include 'footer.php' ?>
