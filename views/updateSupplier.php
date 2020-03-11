<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/supplier.php';
require_once '../models/role.php';
require_once '../controllers/updateSupplierCtrl.php';
include 'header.php';
?>

<div id="formulary" class="h1 text-center mt-4">Modifier mes informations fournisseur
</div>
<?php if (isset($message)) { ?>
    <p class="messageSupplier"><?= $message ?></p>
<?php } ?>
<div class="container">
    <div class="row">
        <div id="mainForm" class="col-md-12">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="formA p-4 mt-2">

                        <form method="POST" action="">

                            <input type="hidden" name="id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>" />

                            <!-- Siret 9 + 4-->
                            <div class="form-row">
                                <div class="form-group col-md-6 text-center">
                                    <label for="siret">Siret (SIRET = SIREN + NIC) : </label>
                                    <input type="text" class="form-control text-center text-info" name="siret" placeholder="9 à 14 chiffres" id="siret" value="<?= isset($updateSupplier->siret) ? $updateSupplier->siret : '' ?>" />
                                    <small class="text-warning"><?= isset($updateSupplier->formErrors['siret']) ? $updateSupplier->formErrors['siret'] : '' ?></small>
                                </div>

                                <!-- Society -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="society">Société : </label>
                                    <input type="text" class="form-control text-center text-info" name="society" id="society" placeholder="champ obligatoire" value="<?= isset($updateSupplier->society) ? $updateSupplier->society : '' ?>" />
                                    <small class="text-warning"><?= isset($updateSupplier->formErrors['society']) ? $updateSupplier->formErrors['society'] : '' ?></small>
                                </div>
                            </div>

                            <!-- Website -->
                            <div class="form-group text-center">
                                <label for="website">Site Web : </label>
                                <input type="text" class="form-control text-center text-info" name="website" id="website" placeholder="pasdesite.com si vous avez aucun " value="<?= isset($updateSupplier->website) ? $updateSupplier->website : '' ?>" />
                                <small class="text-warning"><?= isset($updateSupplier->formErrors['website']) ? $updateSupplier->formErrors['website'] : '' ?></small>
                            </div>

                            <!-- Email -->
                            <div class="form-row">
                                <div class="form-group col-md-12 text-center">
                                    <label for="mail">E-mail</label>
                                    <input type="mail" class="form-control text-center text-info" name="mail" id="mail" placeholder="champ obligatoire" value="<?= isset($updateSupplier->mail) ? $updateSupplier->mail : '' ?>">
                                    <small class="text-warning"><?= isset($updateSupplier->formErrors['mail']) ? $updateSupplier->formErrors['mail'] : '' ?></small>
                                </div>
                            </div>

                            
                            <a class="col-md-12 text-right my-3 mx-5" href="../../index.php">Retourner à la page d'accueil</a>
                                                        <div class="row">
                                <button type="submit" name="submit" class="btn btn-primary col-md-11 mx-5 my-3">Modifier les informations</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div> 
        </div>

    </div>
</div>


<?php include 'footer.php' ?>
