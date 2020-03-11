
<?php

$perPage = 3;

// Création d'une instance de classe Patient
$user = new User();

// ----------------------------
//  Comptabilisation
// ----------------------------

if (isset($_POST['userSearch']) || isset($_GET['userSearch'])) {
    $search = isset($_POST['userSearch']) ? htmlspecialchars($_POST['userSearch']) : htmlspecialchars($_GET['userSearch']); // s'il existe en post, alors c'est bon, sinon il enregistre la valeur en GET
    // Récupération de la liste des patients filtrés
    $totalUser = $user->countUserSearch($search);
} else {
    // Récupération de la liste des patients complète
    $totalUser = $user->countUser();
}

// -------------------------------------------
//  Préparation des valeurs
// -------------------------------------------
// Calcul du nombre de page à créer. Ceil permet d'arrondir supérieur
$totalPages = ceil($totalUser / $perPage);

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

// Rangée à partir de laquelle on souhaite récupérer la liste des patients
$offset = ($page - 1) * $perPage;

// -----------------------------------------------------------------
//  Récupération de la liste des patients
//  ----------------------------------------------------------------

if (isset($_POST['userSearch']) || isset($_GET['userSearch'])) {
    $userList = $user->paginationSearchUser($perPage, $offset, $search); // $offset est à partir de 
} else {
    $userList = $user->paginationUser($perPage, $offset);
}

//  Récupération du message de notification
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
