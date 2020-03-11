<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/supplier.php';
require_once '../controllers/supplierLoginCtrl.php';
include 'header.php';
?>


<div class="container">
    <div class="row">
        <div id="mainForm" class="col-md-12">

            <div class="row justify-content-center">
                <div class="col-md-12 py-3">
                    <div id="userConnexion" class="h1 text-center my-4">Espace de connexion Entreprise</div>
                    <div class="formA mt-2">

                        <form method="POST" action="">

                            <!-- Email -->
                            <div class="form-row">
                                <div class="form-group col-md-12 text-center">
                                    <label for="mail">E-mail</label>
                                    <input type="mail" class="form-control text-center text-info" name="mail" id="mail" placeholder="" value="<?= isset($supplier->mail) ? $supplier->mail : '' ?>">
                                    <small class="text-warning"><?= isset($supplier->formErrors['mail']) ? $supplier->formErrors['mail'] : '' ?></small>
                                </div>
                            </div>

                            <!-- password -->
                            <div class="form-row">
                                <div class="form-group col-md-12 text-center">
                                    <label for="password">password</label>
                                    <input type="password" class="form-control text-center text-info" name="password" id="password" placeholder="" value="<?= isset($supplier->password) ? $supplier->password : '' ?>">
                                    <small class="text-warning"><?= isset($supplier->formErrors['password']) ? $supplier->formErrors['password'] : '' ?></small>
                                </div>

                                <div class="row">
                                    <button type="submit" name="submit" class="btn btn-success col-md-6 mx-5 mt-3">Se connecter</button>
                                </div>

                                <a class="col-md-12 text-right mb-3 py-1" href="../../index.php">Retour à l'accueil</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div> 
        </div>

    </div>
</div>


<?php include 'footer.php' ?>