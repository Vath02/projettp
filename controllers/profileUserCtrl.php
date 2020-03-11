    
<?php

if (isset($_SESSION['user_id'])) {

    $user = new User();
    $user->id = $_SESSION['user_id'];

    $profilUser = $user->getProfilUser();
    
}
?>
