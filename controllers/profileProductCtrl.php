    
<?php

if (isset($_SESSION['user_id'])) {

    $product = new Product();
    $product->id = $_SESSION['user_id'];

    $profilProduct = $product->getProfilProduct();
    
}
?>
