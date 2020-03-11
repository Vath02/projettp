<?php

$arrayError = array();

$regexName = '/^[a-zA-ZÀ-ÿ\' -]+$/';
$regexAddress = '/[0-9]{1,3}(?:(?:[,. ]){1,2}[-a-zA-ZÀ-ÿ]+)+$/';
$regexBirth = '/^(19|20)[0-9]{2}-[0-9]{2}-[0-9]{2}$/';
$regexPhone = '/^[0-9]{2}(-|\ ?)[0-9]{2}(-|\ ?)[0-9]{2}(-|\ ?)[0-9]{2}(-|\ ?)[0-9]{2}$/';
$regexMail = '/^[^\W][a-zA-Z0-9]+(.[a-zA-Z0-9]+)@[a-zA-Z0-9]+(.[a-zA-Z0-9]+).[a-zA-Z]{2,4}$/';
$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{3,}$/';

if (isset($_POST['submit'])) {

    // Création d'une instance de classe User. Instance de classe = OBJET
    $user = new User();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    $user->lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
    $user->firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $user->address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $user->birthdate = isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : '';
    $user->phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $user->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $user->password = isset($_POST['password']) ? $_POST['password'] : '';
    $passwordConfirmation = isset($_POST['passwordConfirmation']) ? $_POST['passwordConfirmation'] : '';
    $user->id_c19v12_roles = 2;
    // 1 = Administrateur,  2 = Client et 3 = Fournisseur
    // Validation du nom de famille
    if (empty($user->lastname)) {
        $user->formErrors['lastname'] = 'Ce champ est vide';
    } elseif (!preg_match($regexName, $user->lastname)) {
        $user->formErrors['lastname'] = 'Merci de rentrer un nom valide';
    } elseif (strlen($user->lastname) < 1 || strlen($user->lastname) > 26) {
        $user->formErrors['lastname'] = 'Le nom doit comporter entre 2 et 25 caratères';
    }

    // Validation du prénom
    if (empty($user->firstname)) {
        $user->formErrors['firstname'] = 'Ce champ est vide';
    } elseif (!preg_match($regexName, $user->firstname)) {
        $user->formErrors['firstname'] = 'Merci de rentrer un nom valide';
    } elseif (strlen($user->firstname) < 1 || strlen($user->firstname) > 26) {
        $user->formErrors['firstname'] = 'Le prénom doit comporter entre 2 et 25 caratères';
    }

    // Validation de l'adresse
    if (empty($user->address)) {
        $user->formErrors['address'] = 'Ce champ est vide';
    } elseif (!preg_match($regexAddress, $user->address)) {
        $user->formErrors['address'] = 'Merci de rentrer une adresse valide';
    } elseif (strlen($user->address) < 5 || strlen($user->address) > 151) {
        $user->formErrors['address'] = 'L\'adresse doit comporter entre 6 et 150 caratères';
    }

    // Validation de la date de naissance
    if (empty($user->birthdate)) {
        $user->formErrors['birthdate'] = 'Ce champ est vide';
    } elseif (!preg_match($regexBirth, $user->birthdate)) {
        $user->formErrors['birthdate'] = 'Merci de rentrer une date de naissance valide';
    } elseif (time() < strtotime($user->birthdate)) {
        $user->formErrors['birthdate'] = 'Cette date de naissance n\'est pas possible';
    }

    // Validation du téléphone
    if (empty($user->phone)) {
        $user->formErrors['phone'] = 'Ce champ est vide';
    } elseif (!preg_match($regexPhone, $user->phone)) {
        $user->formErrors['phone'] = 'Merci de rentrer un numéro de téléphone valide';
    }

    // Validation du mail
    if (empty($user->mail)) {
        $user->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match($regexMail, $user->mail)) {
        $user->formErrors['mail'] = 'Merci de rentrer un mail valide';
    } elseif (strlen($user->mail) > 100) {
        $user->formErrors['mail'] = 'Le mail est trop long';
    } elseif (!$user->hasUniqueMail()) {
        // Verifie si l'adresse mail existe déjà en base de données
        $user->formErrors['mail'] = 'Mail existant, veuillez saisir une adresse mail différente';
    }

    // Validation du password
    if (empty($user->password)) {
        $user->formErrors['password'] = 'Le mot de passe est vide';
    } elseif (!preg_match($regexPassword, $user->password)) {
        $user->formErrors['password'] = 'Le password doit contenir des majuscules, minuscules, chiffres et caractères spéciaux';
    } elseif ($passwordConfirmation != $user->password) {
        $user->formErrors['password'] = 'Erreur dans la confirmation du mot de passe';
    }

    // Hash du password
    if (empty($user->formErrors)) {

        $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        // Insertion de l'utilisateur dans la base de données
        $success = $user->createUser();

        // Message de notification
        if ($success) {
            $_SESSION['message'] = 'Bienvenue chez Vatminton';
        } else {
            $_SESSION['message'] = 'Votre compte n\'a pas été créé';
        }
        header('Location: userLogin.php');
        exit();
    }
}
