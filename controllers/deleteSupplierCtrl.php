
<?php

if (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['confirm'] == true) {

    $supplier = new Supplier();
    $supplier->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    $successDelete = $supplier->deleteSupplier();

    if ($successDelete) {
        $_SESSION['message'] = 'Le fournisseur a bien été supprimé';
    } else {
        $_SESSION['message'] = 'Le fournisseur n\'a pas été supprimé';
    }
    header('Location: ../index.php');
    exit();
} else {
    $supplier = new Supplier();
    $supplier->id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
}
?>
