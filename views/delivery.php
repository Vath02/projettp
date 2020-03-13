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


    <div class="bg-success text-black text-center">Votre numéro de commande est <?= $detailsOrder->number ?>. Veuillez vous munir d'une pièce 
        d'identité et de ce numéro de commande car il vous sera demandé lors du retrait à la livraison.
    </div>

<a href="../views/listOrder.php?id=<?= id_c19v12_users ?>">
            <input type="button" class="btn bg-primary" value="Historique de ma commande" /></a>

<?php include 'footer.php'; ?>