<?php

$arrayError = array();

$regexSociety = '/^[a-zA-ZÀ-ÿ\' -]+$/';
$regexWebsite = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexSiret = '/^[0-9]{9||14}$/';
$regexMail = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)@[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';

if (isset($_POST['submit'])) {
    
    // Création d'une instance de classe User. Instance de classe = OBJET
    $updateSupplier = new Supplier();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    $updateSupplier->siret = isset($_POST['siret']) ? htmlspecialchars($_POST['siret']) : '';
    $updateSupplier->society = isset($_POST['society']) ? htmlspecialchars($_POST['society']) : '';
    $updateSupplier->website = isset($_POST['website']) ? htmlspecialchars($_POST['website']) : '';
    $updateSupplier->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    
    $updateSupplier->id_c19v12_roles = 3; // 2 correspondant à Client et 1 pour Administrateur (en dur) et 3 le fournisseur

    // Validation du Siret
    if (empty($updateSupplier->siret)) {
        $updateSupplier->formErrors['siret'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSiret, $updateSupplier->siret)) {
        $updateSupplier->formErrors['siret'] = 'Merci de rentrer un NUMERO valide';
    } elseif (strlen($updateSupplier->siret) < 8 || strlen($updateSupplier->siret) > 15) {
        $updateSupplier->formErrors['siret'] = 'Le SIRET doit comporter 9 (SIREN) ou 14 (NIC) chiffres';
    }

    // Validation de society
    if (empty($updateSupplier->society)) {
        $updateSupplier->formErrors['society'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSociety, $updateSupplier->society)) {
        $updateSupplier->formErrors['society'] = 'Merci de rentrer un nom de société valide';
    } elseif (strlen($updateSupplier->society) < 1 || strlen($updateSupplier->society) > 26) {
        $updateSupplier->formErrors['society'] = 'Le nom de la société doit comporter entre 2 et 25 caratères';
    }

    // Validation du site web
    if (empty($updateSupplier->website)) {
        $updateSupplier->formErrors['website'] = 'Ce champ est vide';
    } elseif (!preg_match($regexWebsite, $updateSupplier->website)) {
        $updateSupplier->formErrors['website'] = 'Merci de rentrer un site web valide';
    } elseif (strlen($updateSupplier->website) > 100) {
        $updateSupplier->formErrors['website'] = 'Le site web est trop long';
    }

    // Validation du mail
    if (empty($updateSupplier->mail)) {
        $updateSupplier->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match($regexMail, $updateSupplier->mail)) {
        $updateSupplier->formErrors['mail'] = 'Merci de rentrer un mail valide';
    } elseif (strlen($updateSupplier->mail) > 100) {
        $updateSupplier->formErrors['mail'] = 'Le mail est trop long';
    } elseif (!$updateSupplier->hasUniqueMail()) {
        // Verifie si l'adresse mail existe déjà en base de données
        $updateSupplier->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

      
        // Insertion de l'utilisateur dans la base de données
        $successUpdate = $updateSupplier->updateProfilSupplier();


        // Message de notification
        if ($success) {
            $_SESSION['message'] = 'La modification est effectuée avec succès';
        } else {
            $_SESSION['message'] = 'La modification a échoué';
        }
        header('Location: ../../index.php');
        exit();
    }
