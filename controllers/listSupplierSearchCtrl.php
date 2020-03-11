
<?php

$regexSearch = '/^[a-zA-Z0-9À-ÿ\' -]+$/';


if (isset($_POST['submit'])) {

    // Création d'une instance de classe Patient. Instance de classe = OBJET
    $search = new Supplier();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé

    $supplierSearch = isset($_POST['supplierSearch']) ? htmlspecialchars($_POST['supplierSearch']) : ''; // le name dans mon input

    if (empty($search)) {
        $search->formErrors['society'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSearch, $search->society)) {
        $search->formErrors['society'] = 'Merci de rentrer une recherche valide';
    } elseif (strlen($search) < 1 || strlen($search->society) > 25) {
        $search->formErrors['society'] = 'La recherche doit comporter entre 1 et 25 caratères';
    }
    if (empty($search)) {
        $search->formErrors['siret'] = 'Ce champ est vide';
    } elseif (!preg_match($regexSearch, $search->siret)) {
        $search->formErrors['siret'] = 'Merci de rentrer une recherche valide';
    } elseif (strlen($search) < 1 || strlen($search->siret) > 25) {
        $search->formErrors['siret'] = 'La recherche doit comporter entre 1 et 25 caratères';
    }
    if (empty($formErrors)) {
        $success = $search->searchSupplier($supplierSearch);

        // Message de notification
        if ($success) {
            $_SESSION['message'] = 'Le patient a bien été créé';
        } else {
            $_SESSION['message'] = 'Le patient n\'a pas été créé';
        }
        header('Location: ../views/listSupplier.php');
        exit();
    }
}
?>
