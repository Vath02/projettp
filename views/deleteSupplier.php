<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/user.php';
require_once '../controllers/deleteUserCtrl.php';
require_once '../views/header.php';
?>
<div class="row">
    <div class="col-md-12 text-center my-5">Êtes-vous sûr de vouloir supprimer l'utilisateur ?</div>
</div>
<div class="row">
    <div class="col-md-6 text-center">
        <a class="btn  bg-success mx-5" href="../index.php">Annuler</a>
    </div>
    <div class="col-md-6 text-center">
        <a href="deleteUser.php?id=<?= $user->id ?>&confirm=true" class="btn bg-danger mx-5">Confirmer</a>
    </div>
</div>

<?php include 'footer.php' ?>
