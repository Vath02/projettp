
<?php

if (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['confirm'] == true) {

    $product = new Product();
    $product->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    $success = $product->deleteProduct();

    if ($success) {
        $_SESSION['message'] = 'Le produit a bien été supprimé';
    } else {
        $_SESSION['message'] = 'Le produit n\'a pas été supprimé';
    }
    header('Location: ../views/listProduct.php');
    exit();
} else {
    $product = new Product();
    $product->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
}
?>
