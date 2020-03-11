<?php

//Toutes regex pour l'espace de connexion
$regexMail = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)@[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';

if (isset($_POST['submit'])) {

    // Création d'une instance de classe User. Instance de classe = OBJET
    $supplier = new Supplier();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    // Attention pas de htmlspecialchars et pas de striptags pour les password
    $supplier->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $supplier->password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($supplier->mail)) {
        $supplier->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match($regexMail, $supplier->mail)) {
        $supplier->formErrors['mail'] = 'Merci de rentrer un mail valide';
    } elseif ($supplier->mailExist()) {
        // Verifie si l'adresse mail existe déjà en base de données
        $supplier->formErrors['mail'] = 'Mail inexistant';
    }
    
    // Validation du mot de passe
    if (empty($supplier->password)) {
        $supplier->formErrors['password'] = 'Identifiant et/ou mot de passe erronés';
    } elseif (!preg_match($regexPassword, $supplier->password)) {
        $supplier->formErrors['password'] = 'Identifiant et/ou mot de passe erronés';
    }
    
    // Insertion du mot de passe dans la base de données
    if (empty($supplier->formErrors)) {
        $supplierFound = $supplier->supplierPassword();
        
        $verifySuccess = password_verify($supplier->password, $supplierFound->password);

        if ($verifySuccess) {
            $_SESSION['user_role'] = 3; //$supplierFound->id_c19v12_roles
            $_SESSION['user_id'] = $supplierFound->id;
            
            header('Location: addProductBySupplier.php');
            exit();
        } else {
            $user->formErrors['mail'] = 'Identifiants erronés';
            $user->formErrors['password'] = 'Identifiants erronés';
        }
    }
}
