
<?php

$perPage = 1;

// Création d'une instance de classe fournisseurs
$supplier = new Supplier();

$supplierList = $supplier->getSupplierList();



// ----------------------------
//  Comptabilisation
// ----------------------------

if (isset($_POST['supplierSearch']) || isset($_GET['supplierSearch'])) {
    $search = isset($_POST['supplierSearch']) ? htmlspecialchars($_POST['supplierSearch']) : htmlspecialchars($_GET['supplierSearch']); // s'il existe en post, alors c'est bon, sinon il enregistre la valeur en GET
    // Récupération de la liste des fournisseurs filtrés
    $totalSupplier = $supplier->countSupplierSearch($search);
} else {
    // Récupération de la liste des fournisseurs complète
    $totalSupplier = $supplier->countSupplier();
}

// -------------------------------------------
//  Préparation des valeurs
// -------------------------------------------
// Calcul du nombre de page à créer. Ceil permet d'arrondir supérieur
$totalPages = ceil($totalSupplier / $perPage);

// Récupération de mon paramètre pagination page
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;
// ou
// $page = htmlspecialchars($_GET['page']) ?? 1;

// Vérification de l'intégriter de ma donnée page
if (!preg_match('/^[0-9]+$/', $page)) {
    $page = 1;
} elseif ($page > $totalPages) {
    $page = $totalPages;
} elseif ($page < 1) {
    $page = 1;
}

// Rangée à partir de laquelle on souhaite récupérer la liste des fournisseurs
$offset = ($page - 1) * $perPage;

// -----------------------------------------------------------------
//  Récupération de la liste des fournisseurs
//  ----------------------------------------------------------------

if (isset($_POST['supplierSearch']) || isset($_GET['supplierSearch'])) {
    $supplierList = $supplier->paginationSearchSupplier($perPage, $offset, $search); // $offset est à partir de 
} else {
    $supplierList = $supplier->paginationSupplier($perPage, $offset);
}

//  Récupération du message de notification
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
