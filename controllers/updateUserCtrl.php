<?php

//Toutes regex pour le formulaire
$regexName = '/^[a-zA-ZÀ-ÿ\' -]+$/';
$regexBirth = '/^(19|20)[0-9]{2}-[0-9]{2}-[0-9]{2}$/';
$regexPhone = '/^[0-9]{2}(-|\ ?)[0-9]{2}(-|\ ?)[0-9]{2}(-|\ ?)[0-9]{2}(-|\ ?)[0-9]{2}$/';
$regexMail = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)@[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';

if (isset($_POST['submit'])) {
    // Création d'une instance de classe profilPatient. Instance de classe = OBJET
    $profilUser = new User();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    $profilUser->id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
    $profilUser->lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
    $profilUser->firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $profilUser->birthdate = isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : '';
    $profilUser->phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $profilUser->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';

    // Validation du nom de famille
    if (empty($profilUser->lastname)) {
        $profilUser->formErrors['lastname'] = 'Ce champ est vide';
    } elseif (!preg_match($regexName, $profilUser->lastname)) {
        $profilUser->formErrors['lastname'] = 'Merci de rentrer un nom valide';
    } elseif (strlen($profilUser->lastname) < 2 || strlen($profilUser->lastname) > 25) {
        $profilUser->formErrors['lastname'] = 'Le nom doit comporter entre 2 et 25 caratères';
    }

    // Validation du prénom
    if (empty($profilUser->firstname)) {
        $profilUser->formErrors['firstname'] = 'Ce champ est vide';
    } elseif (!preg_match($regexName, $profilUser->firstname)) {
        $profilUser->formErrors['firstname'] = 'Merci de rentrer un nom valide';
    } elseif (strlen($profilUser->firstname) < 2 || strlen($profilUser->firstname) > 25) {
        $profilUser->formErrors['firstname'] = 'Le prénom doit comporter entre 2 et 25 caratères';
    }

    // Validation de la date de naissance
    if (empty($profilUser->birthdate)) {
        $profilUser->formErrors['birthdate'] = 'Ce champ est vide';
    } elseif (!preg_match($regexBirth, $profilUser->birthdate)) {
        $profilUser->formErrors['birthdate'] = 'Merci de rentrer une date de naissance valide';
    } elseif (time() < strtotime($profilUser->birthdate)) {
        $profilUser->formErrors['birthdate'] = 'Cette date de naissance n\'est pas possible';
    }

    // Validation du téléphone
    if (empty($profilUser->phone)) {
        $profilUser->formErrors['phone'] = 'Ce champ est vide';
    } elseif (!preg_match($regexPhone, $profilUser->phone)) {
        $profilUser->formErrors['phone'] = 'Merci de rentrer un numéro de téléphone valide';
    }

    // Validation du mail
    if (empty($profilUser->mail)) {
        $profilUser->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match($regexMail, $profilUser->mail)) {
        $profilUser->formErrors['mail'] = 'Merci de rentrer un mail valide';
    } elseif (strlen($profilUser->mail) > 100) {
        $profilUser->formErrors['mail'] = 'Le mail est trop long';
//    } elseif (!$profilPatient->hasUniqueMail()) {
//        // Verifie si l'adresse mail existe déjà en base de données
//        $profilPatient->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

    // Insertion du profilUser dans la base de données
    if (empty($profilUser->formErrors)) {
        $successProfile = $profilUser->updateProfilUser();
        header('Location: ../views/profileUser.php');
        exit();
    }
    //  Récupération du message de notification
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
?>