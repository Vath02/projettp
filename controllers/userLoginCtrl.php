<?php

//Toutes regex pour l'espace de connexion
$regexMail = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)@[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';

if (isset($_POST['submit'])) {

    // Création d'une instance de classe User. Instance de classe = OBJET
    $user = new User();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    // Attention pas de htmlspecialchars et pas de striptags pour les password
    $user->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $user->password = isset($_POST['password']) ? $_POST['password'] : '';

     if (empty($user->mail)) {
        $user->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match($regexMail, $user->mail)) {
        $user->formErrors['mail'] = 'Merci de rentrer un mail valide';
    } elseif ($user->mailExist()) {
        // Verifie si l'adresse mail existe déjà en base de données
        $user->formErrors['mail'] = 'Mail inexistant';
    }

// Validation du mot de passe
    if (empty($user->password)) {
        $user->formErrors['password'] = 'Champ vide';
    }
    // Insertion du mot de passe dans la base de données
    if (empty($user->formErrors)) {

        $userFound = $user->userPassword();

        $verifySuccess = password_verify($user->password, $userFound->password);

        if ($verifySuccess) {
            $_SESSION['user_role'] = $userFound->id_c19v12_roles;
            $_SESSION['user_id'] = $userFound->id;
            header('Location: ../../index.php');
            exit();
        } else {
            $user->formErrors['mail'] = 'Identifiants erronés';
            $user->formErrors['password'] = 'Identifiants erronés';
        }
        
    }
    
}
