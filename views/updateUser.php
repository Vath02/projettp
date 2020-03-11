<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/user.php';
require_once '../models/role.php';
require_once '../controllers/updateUserCtrl.php';
include 'header.php';
?>

<div id="formulary" class="h1 text-center mt-4">Modifier mon profil utilisateur
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

                            <!-- Nom -->
                            <div class="form-row">
                                <div class="form-group col-md-6 text-center">
                                    <label for="lastname">Nom</label>
                                    <input type="text" class="form-control text-center text-info" name="lastname" placeholder="" id="lastname" value="<?= isset($profilUser->lastname) ? $profilUser->lastname : '' ?>" />
                                    <small class="text-warning"><?= isset($profilUser->formErrors['lastname']) ? $profilUser->formErrors['lastname'] : '' ?></small>
                                </div>

                                <!-- Prénom -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="firstname">Prénom</label>
                                    <input type="text" class="form-control text-center text-info" name="firstname" id="firstname" placeholder="" value="<?= isset($profilUser->firstname) ? $profilUser->firstname : '' ?>" />
                                    <small class="text-warning"><?= isset($profilUser->formErrors['firstname']) ? $profilUser->formErrors['firstname'] : '' ?></small>
                                </div>
                            </div>

                            <!-- date of birth -->
                            <div class="form-row">
                                <!-- row -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="birthdate">Date de naissance</label>
                                    <input type="date" class="form-control text-center text-info" name="birthdate" id="birthDate" placeholder="" value="<?= isset($profilUser->birthdate) ? $profilUser->birthdate : '' ?>">
                                    <small class="text-warning"><?= isset($profilUser->formErrors['birthdate']) ? $profilUser->formErrors['birthdate'] : '' ?></small>
                                </div>   

                                <!-- Telephone -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="phone">Numéro de téléphone</label>
                                    <input type="text" class="form-control text-center text-info" name="phone" id="phone" placeholder="" value="<?= isset($profilUser->phone) ? $profilUser->phone : '' ?>">
                                    <small class="text-warning"><?= isset($profilUser->formErrors['phone']) ? $profilUser->formErrors['phone'] : '' ?></small>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-row">
                                <div class="form-group col-md-12 text-center">
                                    <label for="mail">E-mail</label>
                                    <input type="mail" class="form-control text-center text-info" name="mail" id="mail" placeholder="" value="<?= isset($profilUser->mail) ? $profilUser->mail : '' ?>">
                                    <small class="text-warning"><?= isset($profilUser->formErrors['mail']) ? $profilUser->formErrors['mail'] : '' ?></small>
                                </div>

                                <a class="col-md-12 text-right mb-3 py-1" href="../index.php">Retourner à l'accueil</a>
                            </div>


                            <div class="row">
                                <input type="submit" name="submit" class="btn btn-primary col-md-6 mx-5 mt-3" value="Valider" />
                            </div>

                        </form>

                    </div>
                </div>

            </div> 
        </div>

    </div>
</div>


<?php include 'footer.php' ?>
