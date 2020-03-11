<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/user.php';
require_once '../models/role.php';
require_once '../controllers/profileProductCtrl.php';
include 'header.php';
?>

<div id="userProfile" class="h1 text-center mt-4">caractéristique du produit</div>
<div class="row justify-content-center"> 
    <div class="col-md-5 text-center mt-2">

        <div class="card" style="width: 45rem;">
            <img src="../assets/img/<?= $product->picture ?>" class="picture w-25" alt="vatminton" />
            <h6 class="dateTime card-subtitle mt-2 text-muted"><?php echo convDateFr(); ?>
                <p class="dateTime"> </p><?= strftime('%H:%M') ?>
            </h6>
            <div class="card-body">
                <div class="profilUser card-title text-center"><?= $profilProduct->name ?><p class="firstnameUpp"> <?= $profilProduct->reference ?></p></div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p>prix : </p><?= $profilProduct->price ?></li>
                <li class="list-group-item"><p>prix : </p><?= $profilProduct->id_c19v12_categories ?></li>
            </ul>
            <div class="footerCard card-body">
                <a href="../views/updateProduct.php?id=<?= $profilProduct->id ?>" class="modify2 card-link" target="_blank">Modifier</a>

            </div>
        </div>

    </div>
</div>


<?php include 'footer.php' ?>
