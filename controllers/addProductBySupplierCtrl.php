<?php

$category = new Category();
$categoryList = $category->getCategories();

if (isset($_POST['submit'])) {


    // Création d'une instance de classe Product. Instance de classe = OBJET
    $product = new Product();

    // Récupération des données du formulaire
    // Affectation de chaque champ de formulaire à l'attribut auquel il est associé
    $product->name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $product->price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '';
    $product->reference = isset($_POST['reference']) ? htmlspecialchars($_POST['reference']) : '';
    $product->id_c19v12_categories = isset($_POST['category']) && $_POST['category'] > 0 ? $_POST['category'] : ''; // input name = category
//Toutes regex pour le formulaire
    $regexNameProduct = '/^[a-zA-Z0-9À-ÿ\' -]+$/';
    $regexReference = '/^[A-Z]{1,5}[0-9]{1,5}$/';
    $regexPrice = '/^\d+(\d{3})*(\.\d{1,2})?$/';
// Validation du nom du produit
    if (empty($product->name)) {
        $product->formErrors['name'] = 'Ce champ est vide';
    } elseif (!preg_match($regexNameProduct, $product->name)) {
        $product->formErrors['name'] = 'Merci de rentrer un nom de produit valide';
    } elseif (strlen($product->name) < 1 || strlen($product->name) > 26) {
        $product->formErrors['name'] = 'Le nom doit comporter entre 2 et 25 caratères';
    }

    // Validation des catégories (select)
    if (isset($_POST['categories'])) {
        if (empty($product->categories)) {
            $product->formErrors['categories'] = 'Ce champ est vide';
        } else {
            $product->formErrors['categories'] = 'champ est vide';
        }
    }

    // Validation du prix
    if (empty($product->price)) {
        $product->formErrors['price'] = 'Ce champ est vide';
    } elseif (!preg_match($regexPrice, $product->price)) {
        $product->formErrors['price'] = 'Merci de rentrer un prix valide';
    }

    // Validation de la référence
    if (empty($product->reference)) {
        $product->formErrors['reference'] = 'Ce champ est vide';
    } elseif (!preg_match($regexReference, $product->reference)) {
        $product->formErrors['reference'] = 'Merci de rentrer un numéro de référence valide';
    }

    // Validation de picture
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $filesInfo = basename($_FILES['picture']['name']);
        $extension_upload = $filesInfo['extension'];
        $extension_allowed = array('jpg','png','bmp');
        $product->picture = $filesInfo;
        if (in_array($extension_upload, $extension_allowed)) {
            echo 'Le fichier transmis est bien un fichier jpg';
        } else {
            echo '/!\ vous devez sélectionner un fichier JPG /!\ ';
        }
    }

    // Insertion du product dans la base de données
    if (empty($product->formErrors)) {
        $success = $product->addProductBySupplier();

        // Message de notification
        if ($success) {
            $_SESSION['message'] = 'Le produit a bien été créé';
        } else {
            $_SESSION['message'] = 'Le produit n\'a pas été créé';
        }
        header('Location: ../../views/listProduct.php');
        //header('Location: ../../views/detailsProduct.php?id=' . $product->id);
        exit();
    }
}
?>