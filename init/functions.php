<?php

function debug($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
}

function debugPrint($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function debugSession() {
    if (isset($_SESSION['user_role'])) {
        echo '<p>user_role = ' .$_SESSION['user_role'] .'</p>';
    }
    if (isset($_SESSION['user_id'])) {
        echo '<p>user_id = ' . $_SESSION['user_id'] . '</p>';
    }
}

// Méthode certifiant que l'utilisateur est un administrateur
function isAdmin() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}

// Méthode certifiant que l'utilisateur est un client enregistré
function isUser() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {
        return TRUE;
    } else {
        return FALSE;
    }
}

// Méthode certifiant que l'utilisateur est un fournisseur
function isSupplier() {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {
        return TRUE;
    } else {
        return FALSE;
    }
}

// Convertisseur de date en français
// echo strftime('%H:%M');
function convDateFr() {
    // déclaration du tableau des noms de jours en Français 
    //-------- ici 
    $j_fr[0] = "Dimanche";
    $j_fr[1] = "Lundi";
    $j_fr[2] = "Mardi";
    $j_fr[3] = "Mercredi";
    $j_fr[4] = "Jeudi";
    $j_fr[5] = "Vendredi";
    $j_fr[6] = "Samedi";

    // déclaration du tableau des noms de jours en Français 
    $m_fr[1] = "Janvier";
    $m_fr[2] = "Février";
    $m_fr[3] = "Mars";
    $m_fr[4] = "Avril";
    $m_fr[5] = "Mai";
    $m_fr[6] = "Juin";
    $m_fr[7] = "Juillet";
    $m_fr[8] = "Août";
    $m_fr[9] = "Septembre";
    $m_fr[10] = "Octobre";
    $m_fr[11] = "Novembre";
    $m_fr[12] = "Décembre";

    // déclaration du tableau des noms de jours en Anglais 
    $j_uk[1] = "Sunday";
    $j_uk[2] = "Monday";
    $j_uk[3] = "Tuesday";
    $j_uk[4] = "Wednesday";
    $j_uk[5] = "Thirsday";
    $j_uk[6] = "Friday";
    $j_uk[7] = "Saturday";

    // récupération de la date du jour 
    $aujourdhui = getdate();

    // conversion du nom du jour en Français 
    $jour_l = $j_fr[$aujourdhui['wday']];


    // récupération du jour en chiffre 
    $jour = $aujourdhui['mday'];

    // récupération du mois en chiffre 
    $mois = $aujourdhui['mon'];

    // conversion du nom du mois en Français 
    $mois_l = $m_fr[$mois];

    // récupération de l'annee` 
    $annee = $aujourdhui['year'];

    // stockage de la date complète dans la variable $dtfr 
    $dtfr = "$jour_l $jour $mois_l $annee";

    // retourne le résultat 
    return $dtfr;
}

?>