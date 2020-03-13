<?php

$arrayError = array();

$regexSociety = '/^[a-zA-ZÀ-ÿ\' -]+$/';
$regexWebsite = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexSiret = '/^[0-9]{9||14}$/';
$regexMail = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)@[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';



if (isset($_POST['submit'])) {
    
    $supplier = new Supplier();
$supplier->id = isset($_GET['id']) ? $_GET['id'] : '';
$supplierList = $supplier->getSupplierList();
    
    // Création d'une instance de classe User. Instance de classe = OBJET
    $profileOneSupplier = new Supplier();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    $profileOneSupplier->siret = isset($_POST['siret']) ? htmlspecialchars($_POST['siret']) : '';
    $profileOneSupplier->society = isset($_POST['society']) ? htmlspecialchars($_POST['society']) : '';
    $profileOneSupplier->website = isset($_POST['website']) ? htmlspecialchars($_POST['website']) : '';
    $profileOneSupplier->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    
    $profileOneSupplier->id_c19v12_roles = 3; // 2 correspondant à Client et 1 pour Administrateur (en dur) et 3 le fournisseur

    // Validation du Siret
    if (empty($profileOneSupplier->siret)) {
        $profileOneSupplier->formErrors['siret'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSiret, $profileOneSupplier->siret)) {
        $profileOneSupplier->formErrors['siret'] = 'Merci de rentrer un NUMERO valide';
    } elseif (strlen($profileOneSupplier->siret) < 8 || strlen($profileOneSupplier->siret) > 15) {
        $profileOneSupplier->formErrors['siret'] = 'Le SIRET doit comporter 9 (SIREN) ou 14 (NIC) chiffres';
    }

    // Validation de society
    if (empty($profileOneSupplier->society)) {
        $profileOneSupplier->formErrors['society'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSociety, $profileOneSupplier->society)) {
        $profileOneSupplier->formErrors['society'] = 'Merci de rentrer un nom de société valide';
    } elseif (strlen($profileOneSupplier->society) < 1 || strlen($profileOneSupplier->society) > 26) {
        $profileOneSupplier->formErrors['society'] = 'Le nom de la société doit comporter entre 2 et 25 caratères';
    }

    // Validation du site web
    if (empty($profileOneSupplier->website)) {
        $profileOneSupplier->formErrors['website'] = 'Ce champ est vide';
    } elseif (!preg_match($regexWebsite, $profileOneSupplier->website)) {
        $profileOneSupplier->formErrors['website'] = 'Merci de rentrer un site web valide';
    } elseif (strlen($profileOneSupplier->website) > 100) {
        $profileOneSupplier->formErrors['website'] = 'Le site web est trop long';
    }

    // Validation du mail
    if (empty($profileOneSupplier->mail)) {
        $profileOneSupplier->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match($regexMail, $profileOneSupplier->mail)) {
        $profileOneSupplier->formErrors['mail'] = 'Merci de rentrer un mail valide';
    } elseif (strlen($profileOneSupplier->mail) > 100) {
        $profileOneSupplier->formErrors['mail'] = 'Le mail est trop long';
    } elseif (!$profileOneSupplier->hasUniqueMail()) {
        // Verifie si l'adresse mail existe déjà en base de données
        $profileOneSupplier->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

      
        // Insertion de l'utilisateur dans la base de données
        $successProfile = $profileOneSupplier->profileOneSupplier();


        // Message de notification
        if ($success) {
            $_SESSION['message'] = 'La modification est effectuée avec succès';
        } else {
            $_SESSION['message'] = 'La modification a échoué';
        }
        header('Location: ../views/listSupplier.php');
        exit();
    }
