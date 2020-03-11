
<?php

if (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['confirm'] == true) {

    $user = new User();
    $user->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    $success = $user->deleteUser();

    if ($success) {
        $_SESSION['message'] = 'L\'utilisateur a bien été supprimé';
    } else {
        $_SESSION['message'] = 'L\'utilisateur n\'a pas été supprimé';
    }
    header('Location: ../index.php');
    exit();
} else {
    $user = new User();
    $user->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
}
?>
