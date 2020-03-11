<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/product.php';
require_once '../controllers/detailsProductCtrl.php';
//require_once '../controllers/listUserSearchCtrl.php';
require_once 'header.php';
?>

<div id="detailsProduct" class="h1 text-center mt-4">DÉTAILS D'UN PRODUIT
</div>
<div class="row justify-content-center"> 
    <div class="col-md-12 text-center mr-4 mt-2">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

            <div class="card" style="width: 100%;">
                
                <img src="../assets/img/<?= $detailsProduct->picture ?>" class="picture w-25" alt="vatminton" />
                <div class="card-body">
                    <div class="card-title text-center"><?= $detailsProduct->productName ?></div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p>Catégorie : </p><?= $detailsProduct->categoryName ?></li>
                    <li class="list-group-item"><p>Référence : </p><?= $detailsProduct->reference ?></li>
                    <li class="list-group-item"><p>Prix : </p><?= $detailsProduct->price ?></li>
                </ul>
                <?php if (isSupplier() || isAdmin()) { ?>
                <div class="footerCard card-body">
                    <a href="updateProduct.php?id=<?= $product->id ?>&confirm=true" class="btn bg-success mx-5">Modifier</a>
                
                    <a href="deleteProduct.php?id=<?= $product->id ?>&confirm=true" class="btn bg-danger mx-5">Supprimer</a>
                </div>
              <?php } ?>
                <?php if (isUser() || isAdmin()) { ?>
                <div class="footerCard card-body">
                    <a href="addToCart.php?id=<?= $product->id ?>&confirm=true" class="btn bg-success mx-5">Ajouter au panier</a>
                </div>
              <?php } ?>
                
                
                
                
                <?php if ($detailsProduct->id_c19v12_categories == 1) { ?>
<!-- Raquettes -->
<div id="modalRaquette1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRaquette1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRaquette1Label">Babolat - Un confort Inégalable</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-8 border-right border-primary pr-4">
                                    <h5 class="text-primary">Description :</h5>
                                    <p class="mt-3 mb-4">Découvrez le mélange ultime de vitesse et de puissance depuis sa conception la gamme Satelite a toujours été le fleuron technologique de la marque Babolat. 
                                        Se targuant d'un aérodynamisme et d'une vitesse de frappe impressionnante, la Satelite Gravity 74 2019 ne déroge pas à la règle. 
                                        Cette raquette de badminton extrêmement légère bénéfice d'une grande tolérance offrant aux joueurs un confort de jeu inégalé. 
                                        Malgré son équilibre en manche, cette raquette nous propose une puissance surprenante grâce à l'intégration du MetricFlex.</p>
                                    <a class="mt-5" href="../assets/img/raquettePromoBabolat.jpg" target="_blank"><img src="../assets/img/raquettePromoBabolat.jpg" width="20%" /></a>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center text-primary">Caractéristiques :</h5>
                                    <ul class="mt-3">
                                        <li>Profil de la raquette : Confirmé - Défensif</li>
                                        <li>Poids moyen : 74g (+-2g)</li>
                                        <li>Flexibilité : semi-rigide</li>
                                        <li>Longueur : 675 mm</li>
                                        <li>Composition : H.M. Graphite</li>
                                        <li>Technologie du cadre : Slim, renforts en fibre de carbone</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="../views/detailsProduct.php">
                        <input type="button" class="bg-success py-2 px-5" value="Voir le descriptif"/></a>
                    <button type="button" class="btn btn-primary">Ajouter au panier</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
        
        <?php if ($detailsProduct->id_c19v12_categories == 2) { ?>
     <!-- Chaussures -->
    <div id="modalShoes1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShoes1Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalShoes1Label">Yonex men noir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-8 border-right border-primary pr-4">
                                    <h5 class="text-primary">Description :</h5>
                                    <p class="mt-3 mb-4">Un synomyme de légèreté.
                                        On ne présente plus cette célèbre gamme de chaussures Yonex. 
                                        L'Aerus est un véritable modèle de dynamisme et de légèreté dans lequel s'inscrit la Power Cushion Aerus 3. 
                                        Cette dernière profite de nombreuses innovations par rapport à la génération précédente. 
                                        On notera l'arrivée du Dura Bull Skin Light ainsi que du Power Carbon Light, 
                                        changeant drastiquement la structure afin d'offrir toujours plus de stabilité et de légèreté aux joueurs de badminton en quête de réactivité.</p>
                                    <a class="mt-5" href="../assets/img/shoesPromoYonex.jpg" target="_blank"><img src="../assets/img/shoesPromoYonex.jpg" width="20%" /></a>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center text-primary">Caractéristiques :</h5>
                                    <ul class="mt-3">
                                        <li>Chaussures pour : Hommes</li>
                                        <li>Tailles existantes : Du 40 au 47</li>
                                        <li>Tige : Fibre synthétique, Toe Assit Shape, Synchro-Fit Insole</li>
                                        <li>Doublure : Fibre synthétique</li>
                                        <li>Style de chaussures : Légèreté</li>
                                        <li>Gabarit : Près du pied</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="../views/detailsProduct.php">
                        <input type="button" class="bg-success py-2 px-5" value="Voir le descriptif"/></a>
                    <button type="button" class="btn btn-primary">Ajouter au panier</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
        
                              
                
                
                               
            </div>
        </form>
    </div>
</div>


<?php include 'footer.php'; ?>