<?php

$arrayError = array();

$regexSociety = '/^[a-zA-ZÀ-ÿ\' -]+$/';
$regexWebsite = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexSiret = '/^[0-9]{9||14}$/';
$regexMail = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)@[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';

if (isset($_POST['submit'])) {
    
    // Création d'une instance de classe User. Instance de classe = OBJET
    $supplier = new Supplier();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    $supplier->siret = isset($_POST['siret']) ? htmlspecialchars($_POST['siret']) : '';
    $supplier->society = isset($_POST['society']) ? htmlspecialchars($_POST['society']) : '';
    $supplier->website = isset($_POST['website']) ? htmlspecialchars($_POST['website']) : '';
    $supplier->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $supplier->password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordConfirmation = isset($_POST['passwordConfirmation']) ? $_POST['passwordConfirmation'] : '';
    $supplier->id_c19v12_roles = 3; // 2 correspondant à Client et 1 pour Administrateur (en dur) et 3 le fournisseur

    // Validation du Siret
    if (empty($supplier->siret)) {
        $supplier->formErrors['siret'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSiret, $supplier->siret)) {
        $supplier->formErrors['siret'] = 'Merci de rentrer un NUMERO valide';
    } elseif (strlen($supplier->siret) < 8 || strlen($supplier->siret) > 15) {
        $supplier->formErrors['siret'] = 'Le SIRET doit comporter 9 (SIREN) ou 14 (NIC) chiffres';
    }

    // Validation de society
    if (empty($supplier->society)) {
        $supplier->formErrors['society'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSociety, $supplier->society)) {
        $supplier->formErrors['society'] = 'Merci de rentrer un nom de société valide';
    } elseif (strlen($supplier->society) < 1 || strlen($supplier->society) > 26) {
        $supplier->formErrors['society'] = 'Le nom de la société doit comporter entre 2 et 25 caratères';
    }

    // Validation du site web
    if (empty($supplier->website)) {
        $supplier->formErrors['website'] = 'Ce champ est vide';
    } elseif (!preg_match($regexWebsite, $supplier->website)) {
        $supplier->formErrors['website'] = 'Merci de rentrer un site web valide';
    } elseif (strlen($supplier->website) > 100) {
        $supplier->formErrors['website'] = 'Le site web est trop long';
    }

    // Validation du mail
    if (empty($supplier->mail)) {
        $supplier->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match($regexMail, $supplier->mail)) {
        $supplier->formErrors['mail'] = 'Merci de rentrer un mail valide';
    } elseif (strlen($supplier->mail) > 100) {
        $supplier->formErrors['mail'] = 'Le mail est trop long';
    } elseif (!$supplier->hasUniqueMail()) {
        // Verifie si l'adresse mail existe déjà en base de données
        $supplier->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

    // Validation du password
    if (empty($supplier->password)) {
        $supplier->formErrors['password'] = 'Le mot de passe est vide';
    } elseif (!preg_match($regexPassword, $supplier->password)) {
        $supplier->formErrors['password'] = 'Le password doit contenir des majuscules, minuscules, chiffres et caractères spéciaux';
    } elseif ($passwordConfirmation != $supplier->password) {
        $supplier->formErrors['password'] = 'Le password ne correspond pas à sa confirmation';
    }

    // Hash du password
    if (empty($supplier->formErrors)) {
        $supplier->password = password_hash($supplier->password, PASSWORD_DEFAULT);

        // Insertion de l'utilisateur dans la base de données
        $success = $supplier->createSupplier();


        // Message de notification
        if ($success) {
            $_SESSION['message'] = 'Bienvenue chez Vatminton';
        } else {
            $_SESSION['message'] = 'Le fournisseur n\'a pas été créé';
        }
        header('Location: ../../index.php');
        exit();
    }
}
