<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/supplier.php';
require_once '../models/role.php';
require_once '../controllers/profileSupplierCtrl.php';
include 'header.php';
?>

<div id="userProfile" class="h1 text-center mt-4">Afficher les informations de mon entreprise</div>
<div class="row justify-content-center"> 
    <div class="col-md-5 text-center mt-2">

        <div class="card" style="width: 45rem;">
            <img src="../assets/img/badmintonLogoRacquetSports.jpg" class="card-img-top" alt="profil supplier">
            <h6 class="dateTime card-subtitle mt-2 text-muted"><?php echo convDateFr(); ?>
                <p class="dateTime"> </p><?= strftime('%H:%M') ?>
            </h6>
            <div class="card-body">
                <div class="profilUser card-title text-center"><?= $supplierList->siret ?><p class="firstnameUpp"> <?= $supplierList->society ?></p></div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p>Site Web : </p><?= $supplierList->website ?></li>
                <li class="list-group-item"><img src="../assets/img/mail.jpg" class="profilUser card-img-top w-25" alt="mail" /><p> </p><?= $profileOneSupplier->mail ?></li>

            </ul>
            <div class="footerCard card-body">
                <a href="../views/updateSupplier.php?id=<?= $profileOneSupplier->id ?>" class="modify2 card-link" target="_blank">Modifier</a>

            </div>
        </div>

    </div>
</div>


<?php include 'footer.php' ?>
