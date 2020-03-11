<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/product.php';
require_once '../models/category.php';
require_once '../models/role.php';
require_once '../controllers/updateProductCtrl.php';
include 'header.php';
?>


<div id="formulary" class="h1 text-center my-4">Espace fournisseur</div>
<h2 class="text-center mb-4">Modifier un produit</h2>
<div class="container">
    <div class="row">
        <div id="mainForm" class="col-md-12">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="formA p-4 mt-2">

                        <form method="POST" action="" enctype="multipart/form-data">

                            <!-- Nom -->
                            <div class="form-row">
                                <div class="form-group col-md-6 text-center">
                                    <label for="name">Nom : </label>
                                    <input type="text" class="form-control text-center text-info" name="name" placeholder="" id="name" value="<?= isset($detailsProduct->productName) ? $detailsProduct->productName : '' ?>" />
                                    <small class="text-warning"><?= isset($profilProduct->formErrors['name']) ? $profilProduct->formErrors['name'] : '' ?></small>
                                </div>


                                <!-- Price -->
                                <div class="form-group col-md-6 text-center">
                                    <label for="price">Prix : </label>
                                    <input type="text" class="form-control text-center text-info" name="price" id="price" placeholder="" value="<?= isset($detailsProduct->price) ? $detailsProduct->price : '' ?>" />
                                    <small class="text-warning"><?= isset($profilProduct->formErrors['price']) ? $profilProduct->formErrors['price'] : '' ?></small>
                                </div>



                                <!-- Reference -->
                                <div class="form-group col-md-8 text-center">
                                    <label for="reference">Référence du produit : </label>
                                    <input type="text" class="form-control text-center text-info" name="reference" id="reference" placeholder="" value="<?= isset($detailsProduct->reference) ? $detailsProduct->reference : '' ?>">
                                    <small class="text-warning"><?= isset($profilProduct->formErrors['reference']) ? $profilProduct->formErrors['reference'] : '' ?></small>
                                </div>

                                <!-- Categories -->
                                <div class="form-group col-md-4 text-center">
                                    <label for="categories">Catégorie : </label>
                                    <select id="categories" name="category" class="form-control"> <!-- le name="category" est lié à $category dans le controller -->
                                        <option value="<?= $detailsProduct->id_c19v12_categories ?>" selected><?= $detailsProduct->categoryName ?></option>
                                        <?php foreach ($categoryList as $item) { ?>
                                            <option class="text-white" value="<?= $item->id ?>"><?= ucfirst($item->name) ?></option> <!-- uppercase first letter -->
                                        <?php } ?>
                                    </select>
                                    <small class="text-warning"><?= isset($profilProduct->formErrors['categories']) ? $profilProduct->formErrors['categories'] : '' ?></small>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12 text-center">
                                        <input type="file" name="picture" />
                                    </div>
                                    <input type="submit" name="submit" value="Enregistrer" />

                                </div>
                            </div>
                        </form>


                    </div>

                </div> 
            </div>

        </div>
    </div>


<?php include 'footer.php' ?>
