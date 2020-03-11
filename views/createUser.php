<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/user.php';
require_once '../models/role.php';
require_once '../controllers/createUserCtrl.php';
include 'header.php';
?>


<div class="container">
    <div class="row">
        <div id="mainForm" class="col-md-12">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div id="formulary" class="h1 text-center my-4">Inscription de l'utilisateur (Client)</div>

                    <div class="formA p-4 mt-2">

                        <form method="POST" action="">

                            <!-- Role
                            <div class="form-row">
                                <div class="form-group col-md-6 text-center">

                                    <label for="roles">Roles :</label>
                                    <select id="roles" name="roles">
                                        <option value="" disabled selected></option>
                                        <option value="1" name="Administrateur"> Administrateur </option>
                                        <option value="2" name="Client"> Client </option>
                                    </select>
                                    <p><?= isset($errorArray['roles']) ? $errorArray['roles'] : '' ?></p>
                                </div>
                            </div> -->

                            <!-- Nom -->
                            <div class="form-row">
                                <div class="form-group col-md-6 text-center">
                                    <label for="lastname">Nom</label>
                                    <input type="text" class="form-control text-center text-info" name="lastname" placeholder="Nom" id="lastname" value="<?= isset($user->lastname) ? $user->lastname : '' ?>" />
                                    <small class="text-warning"><?= isset($user->formErrors['lastname']) ? $user->formErrors['lastname'] : '' ?></small>
                                </div>

                                <!-- Prénom -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="firstname">Prénom</label>
                                    <input type="text" class="form-control text-center text-info" name="firstname" id="firstname" placeholder="Prénom" value="<?= isset($user->firstname) ? $user->firstname : '' ?>" />
                                    <small class="text-warning"><?= isset($user->formErrors['firstname']) ? $user->formErrors['firstname'] : '' ?></small>
                                </div>
                            </div>

                            <!-- Adresse -->
                            <div class="form-group text-center">
                                <label for="address">Adresse</label>
                                <input type="text" class="form-control text-center text-info" name="address" id="address" placeholder="Adresse" value="<?= isset($user->address) ? $user->address : '' ?>">
                                <small class="text-warning"><?= isset($user->formErrors['address']) ? $user->formErrors['address'] : '' ?></small>
                            </div>

                            <!-- date of birth -->
                            <div class="form-row">
                                <!-- row -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="birthdate">Date de naissance</label>
                                    <input type="date" class="form-control text-center text-info" name="birthdate" id="birthDate" placeholder="jj/mm/aaaa" value="<?= isset($user->birthdate) ? $user->birthdate : '' ?>">
                                    <small class="text-warning"><?= isset($user->formErrors['birthdate']) ? $user->formErrors['birthdate'] : '' ?></small>
                                </div>   

                                <!-- Telephone -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="phone">Numéro de téléphone</label>
                                    <input type="text" class="form-control text-center text-info" name="phone" id="phone" placeholder="00 00 00 00 00" value="<?= isset($user->phone) ? $user->phone : '' ?>">
                                    <small class="text-warning"><?= isset($user->formErrors['phone']) ? $user->formErrors['phone'] : '' ?></small>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-row">
                                <div class="form-group col-md-12 text-center">
                                    <label for="mail">E-mail</label>
                                    <input type="mail" class="form-control text-center text-info" name="mail" id="mail" placeholder="exemple@ex.fr" value="<?= isset($user->mail) ? $user->mail : '' ?>">
                                    <small class="text-warning"><?= isset($user->formErrors['mail']) ? $user->formErrors['mail'] : '' ?></small>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group col-md-12 text-center">
                                <label for="password">Password</label>
                                <input type="text" class="form-control text-center text-info" name="password" id="password" placeholder="" value="<?= isset($user->password) ? $user->password : '' ?>">
                                <small class="text-warning"><?= isset($user->formErrors['password']) ? $user->formErrors['password'] : '' ?></small>
                            </div>  

                            <!-- Confirmation password -->
                            <div class="form-group col-md-12 text-center">
                                <label for="passwordConfirmation">Confirmation password</label>
                                <input type="text" class="form-control text-center text-info" name="passwordConfirmation" id="password2" placeholder="" value="<?= isset($user->passwordConfirmation) ? $user->passwordConfirmation : '' ?>">
                                <small class="text-warning"><?= isset($user->formErrors['passwordConfirmation']) ? $user->formErrors['passwordConfirmation'] : '' ?></small>
                            </div>
                    </div>


                </div>
                <div class="row">
                    <button type="submit" name="submit" class="btn btn-primary col-md-6 mx-5 mt-3">S'enregistrer</button>
                </div>

                <a class="col-md-12 text-right mb-3 py-1" href="../../index.php">Retour à l'accueil</a>


                </form>

            </div>
        </div>

    </div> 
</div>


<?php include 'footer.php' ?>