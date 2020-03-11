<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/order.php';
require_once '../controllers/deliveryCtrl.php';
require_once 'header.php';
?>

<div id="detailsProduct" class="h1 text-center mt-4">* VOTRE COMMANDE EST EN COURS DE PREPARATION</div>
<small class="text-warning">* Un mail de confirmation vous sera envoyé ultérieurement lors de l'acheminement</small>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />
    <div class="bg-success text-primary">Votre numéro de commande est <?= $detailsOrder->number ?>. Veuillez vous munir d'une pièce 
        d'identité et de ce numéro de commande car il vous sera demandé lors du retrait à la livraison.
    </div>
</form>


<?php include 'footer.php'; ?>