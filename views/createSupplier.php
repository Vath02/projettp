<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/supplier.php';
require_once '../models/role.php';
require_once '../controllers/createSupplierCtrl.php';
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div id="mainForm" class="col-md-12">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div id="formulary" class="h1 text-center my-4 text-primary"><small>*</small>Inscription pour les Entreprises</div>
                    <small>*Votre inscription sera en attente de validation par l'administrateur du site</small>

                    <div class="formA p-4 mt-2">

                        <form method="POST" action="">

                            <!-- Siret 9 + 4-->
                            <div class="form-row">
                                <div class="form-group col-md-6 text-center">
                                    <label for="siret">Siret (SIRET = SIREN + NIC) : </label>
                                    <input type="text" class="form-control text-center text-info" name="siret" placeholder="9 à 14 chiffres" id="siret" value="<?= isset($supplier->siret) ? $supplier->siret : '' ?>" />
                                    <small class="text-warning"><?= isset($supplier->formErrors['siret']) ? $supplier->formErrors['siret'] : '' ?></small>
                                </div>

                                <!-- Society -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="society">Société : </label>
                                    <input type="text" class="form-control text-center text-info" name="society" id="society" placeholder="champ obligatoire" value="<?= isset($supplier->society) ? $supplier->society : '' ?>" />
                                    <small class="text-warning"><?= isset($supplier->formErrors['society']) ? $supplier->formErrors['society'] : '' ?></small>
                                </div>
                            </div>

                            <!-- Website -->
                            <div class="form-group text-center">
                                <label for="website">Site Web : </label>
                                <input type="text" class="form-control text-center text-info" name="website" id="website" placeholder="pasdesite.com si vous avez aucun " value="<?= isset($supplier->website) ? $supplier->website : '' ?>" />
                                <small class="text-warning"><?= isset($supplier->formErrors['website']) ? $supplier->formErrors['website'] : '' ?></small>
                            </div>

                            <!-- Email -->
                            <div class="form-row">
                                <div class="form-group col-md-12 text-center">
                                    <label for="mail">E-mail</label>
                                    <input type="mail" class="form-control text-center text-info" name="mail" id="mail" placeholder="champ obligatoire" value="<?= isset($supplier->mail) ? $supplier->mail : '' ?>">
                                    <small class="text-warning"><?= isset($supplier->formErrors['mail']) ? $supplier->formErrors['mail'] : '' ?></small>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group col-md-12 text-center">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-center text-info" name="password" id="password" placeholder="champ obligatoire" value="<?= isset($supplier->password) ? $supplier->password : '' ?>">
                                <small class="text-warning"><?= isset($supplier->formErrors['password']) ? $supplier->formErrors['password'] : '' ?></small>
                            </div>  

                            <!-- Confirmation password -->
                            <div class="form-group col-md-12 text-center">
                                <label for="passwordConfirmation">Confirmation password</label>
                                <input type="password" class="form-control text-center text-info" name="passwordConfirmation" id="passwordConfirmation" placeholder="champ obligatoire" value="<?= isset($supplier->passwordConfirmation) ? $supplier->passwordConfirmation : '' ?>">
                                <small class="text-warning"><?= isset($supplier->formErrors['passwordConfirmation']) ? $supplier->formErrors['passwordConfirmation'] : '' ?></small>
                            </div>
                            <a class="col-md-12 text-right my-3 mx-5" href="../../index.php">Retourner à la page d'accueil</a>
                            <small>*Vous recevrez dans les 48 heures un mail de confirmation pour l'activation de votre compte</small>
                            <div class="row">
                                <button type="submit" name="submit" class="btn btn-primary col-md-11 mx-5 my-3">Valider votre inscription</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div> 
</div>



<?php include 'footer.php' ?>