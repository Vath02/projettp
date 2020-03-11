<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/product.php';
require_once '../models/category.php';
require_once '../controllers/listProductCtrl.php';
//require_once '../controllers/listProductSearchCtrl.php';
require_once 'header.php';
?>

<div id="detailsProduct" class="h1 text-center mt-4">LISTE DES PRODUITS
</div>
<div class="row d-flex justify-content-center mt-5">
    
        <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />
        <?php foreach ($productList as $product) { ?>

            <div class="col-md-4 d-flex justify-content-center mt-3">
                <div class="card text-black text-center bg-secondary mb-3" style="max-width: 20rem;">
                                       <div class="card-header"><?= $product->id ?><?= $product->productName ?></div>
                    <div class="card-body">
                        <div><img src="../assets/img/<?= $product->picture ?>" class="picture" alt="vatminton" /></div>
                        <h4 class="card-title">référence : <?= $product->reference ?></h4>
                        <p class="card">Catégorie de produit : <?= $product->categoryName ?></p>
                        <p class="card">Prix : <?= $product->price ?> €</p>
                        <a class="px-3" href="detailsProduct.php?id=<?= $product->id ?>">Détails</a>
                        <?php if (isUser() || isAdmin()) { ?>
                            <a class="px-3" href="addToCart.php?id=<?= $product->id ?>">Ajouter à mon panier</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }
        ?>

  
</div>






<!-- 
        <div id="raquette2" class="col-lg-4 my-2">
            <div class="thumbnail">
                <a data-toggle="modal" data-target="#modalRaquette2" href="#modalRaquette2">
                    <img src="../assets/img/raquettePromoYonex.jpg" alt="raquettePromoYonex" style="width:100%"
                         title="EXPERT POLYVALENT.
                         Côté cadre, Yonex intègre le procédé phare de sa gamme Astrox : le Rotational Generator System (RGS) et sa théorie 
                         du contre-poids. En répartissant le poids ingénieusement, vous conservez les bienfaits du poids en tête sur les phases 
                         offensives sans perdre la maniabilité nécessaire lorsque vous défendez. Couplé au poids ultra-light et à l'équilibre 
                         en tête, on obtient une raquette nerveuse/tranchante en attaque et très maniable en défense." />
                </a>
                <h5 class="mt-1">Yonex - Expert polyvalent</h5>
                <span class="font-italic">Raquette </span>
                <span>/ Ref : RAQ002</span>
                <span>- 269.90 €</span>
                <button dataImg="RAQ002" dataTitle="Gear 5" dataRef="RAQ002" dataPrice="269.90"
                        type="button" class="btn buy btn-success mt-2 mx-5">Ajouter au panier</button>
            </div>
        </div>


        <div id="raquette3" class="col-lg-4 my-2">
            <div class="thumbnail">
                <a data-toggle="modal" data-target="#modalRaquette3" href="#modalRaquette3">
                    <img src="../assets/img/raquettePromoBabolat.jpg" alt="raquettePromoBabolat" style="width:100%"
                         title="UN CONFORT INEGALABLE (3). 
                         Depuis sa conception la gamme Satelite a toujours été le fleuron technologique de la marque Babolat. Se targuant 
                         d'un aérodynamisme et d'une vitesse de frappe impressionnante, la Satelite Gravity 74 2019 ne déroge pas à la règle. 
                         Cette raquette de badminton extrêmement légère bénéfice d'une grande tolérance offrant aux joueurs un confort 
                         de jeu inégalé. Malgré son équilibre en manche, cette raquette nous propose une puissance surprenante grâce à 
                         l'intégration du MetricFlex." />

                </a>
                <h5 class="mt-1">Babolat - Un confort Inégalable (3)</h5>
                <span class="font-italic">Raquette </span>
                <span>/ Ref : RAQ003</span>
                <span>- 224,90 €</span>
                <button dataImg="RAQ003" dataTitle="babolatConfort" dataRef="RAQ003" dataPrice="224.90"
                        type="button" class="btn buy btn-success mt-2 mx-5">Ajouter au panier</button>
            </div>
        </div>
    </div> -->



<!--
<div id="shoes" class="col-lg-4 my-2">
    <div class="thumbnail">
        <a data-toggle="modal" data-target="#modalShoes2" href="#modalShoes2">
            <img src="../assets/img/shoesPromoYonex.jpg" alt="shoesPromoYonex" style="width:100%"
                 title="UN SYNONYME DE LEGERETE (2).
                 On ne présente plus cette célèbre gamme de chaussures Yonex. L'Aerus est un véritable modèle de dynamisme et de légèreté 
                 dans lequel s'inscrit la Power Cushion Aerus 3. Cette dernière profite de nombreuses innovations par rapport à la génération 
                 précédente.  On notera l'arrivée du Dura Bull Skin Light ainsi que du Power Carbon Light, changeant drastiquement la structure 
                 afin d'offrir toujours plus de stabilité et de légèreté aux joueurs de badminton en quête de réactivité." />
        </a>
        <h5 class="mt-1">Yonex - Power cushion aerus 3 men noir (2)</h5>
        <span class="font-italic">Chaussures </span>
        <span>/ Ref : SHOES002</span>
        <span>- 89,90 €</span>
        <button dataImg="SHOES002" dataTitle="Yonex - Power cushion aerus 3 men noir" dataRef="SHOES002" dataPrice="89.90"
                type="button" class="btn buy btn-success mt-2 mx-5">Ajouter au panier</button>
    </div>
</div>


<div id="shoes" class="col-lg-4 my-2">
    <div class="thumbnail">
        <a data-toggle="modal" data-target="#modalShoes3" href="#modalShoes3">
            <img src="../assets/img/shoesPromoYonex.jpg" alt="shoesPromoYonex" style="width:100%"
                 title="UN SYNONYME DE LEGERETE.
                 On ne présente plus cette célèbre gamme de chaussures Yonex. L'Aerus est un véritable modèle de dynamisme et de légèreté 
                 dans lequel s'inscrit la Power Cushion Aerus 3. Cette dernière profite de nombreuses innovations par rapport à la génération 
                 précédente.  On notera l'arrivée du Dura Bull Skin Light ainsi que du Power Carbon Light, changeant drastiquement la structure 
                 afin d'offrir toujours plus de stabilité et de légèreté aux joueurs de badminton en quête de réactivité." />
        </a>
        <h5 class="mt-1">Yonex - Power cushion aerus 3 men noir</h5>
        <span class="font-italic">Chaussures </span>
        <span>/ Ref : SHOES003</span>
        <span>- 89,90 €</span>
        <button dataImg="SHOES003" dataTitle="Yonex - Power cushion aerus 3 men noir" dataRef="SHOES003" dataPrice="89.90"
                type="button" class="btn buy btn-success mt-2 mx-5">Ajouter au panier</button>
    </div>
</div>

</div>
WARNING: 3e ligne 
<div class="row">
<div id="raquette4" class="col-lg-4 my-2">
    <div class="thumbnail">
        <a data-toggle="modal" data-target="#modalRaquette4" href="#modalRaquette4">
            <img src="../assets/img/raquettePromoBabolat.jpg" alt="raquettePromoBabolat" style="width:100%"
                 title="UN CONFORT INEGALABLE (4). 
                 Depuis sa conception la gamme Satelite a toujours été le fleuron technologique de la marque Babolat. Se targuant 
                 d'un aérodynamisme et d'une vitesse de frappe impressionnante, la Satelite Gravity 74 2019 ne déroge pas à la règle. 
                 Cette raquette de badminton extrêmement légère bénéfice d'une grande tolérance offrant aux joueurs un confort 
                 de jeu inégalé. Malgré son équilibre en manche, cette raquette nous propose une puissance surprenante grâce à 
                 l'intégration du MetricFlex." />

        </a>
        <h5 class="mt-1">Babolat - Un confort Inégalable</h5>
        <span class="font-italic">Raquette</span>
        <span>/ Ref : RAQ004</span>
        <span>- 224,90 €</span>
        <button dataImg="RAQ004" dataTitle="babolatConfort" dataRef="RAQ004" dataPrice="224.90"
                type="button" class="btn buy btn-success mt-2 mx-5">Ajouter au panier</button>
    </div>
</div>


<div id="raquette5" class="col-lg-4 my-2">
    <div class="thumbnail">
        <a data-toggle="modal" data-target="#modalRaquette5" href="#modalRaquette5">
            <img src="../assets/img/raquettePromoYonex.jpg" alt="raquettePromoYonex" style="width:100%"
                 title="EXPERT POLYVALENT (5).
                 Côté cadre, Yonex intègre le procédé phare de sa gamme Astrox : le Rotational Generator System (RGS) et sa théorie 
                 du contre-poids. En répartissant le poids ingénieusement, vous conservez les bienfaits du poids en tête sur les phases 
                 offensives sans perdre la maniabilité nécessaire lorsque vous défendez. Couplé au poids ultra-light et à l'équilibre 
                 en tête, on obtient une raquette nerveuse/tranchante en attaque et très maniable en défense." />
        </a>
        <h5 class="mt-1">Yonex - Expert polyvalent</h5>
        <span class="font-italic">Raquette </span>
        <span>/ Ref : RAQ005</span>
        <span>- 269.90 €</span>
        <button dataImg="RAQ005" dataTitle="Yonex - Power cushion aerus 3 men noir" dataRef="RAQ005" dataPrice="269.90"
                type="button" class="btn buy btn-success mt-2 mx-5">Ajouter au panier</button>
    </div>
</div>


<div id="raquette6" class="col-lg-4 my-2">
    <div class="thumbnail">
        <a data-toggle="modal" data-target="#modalRaquette6" href="#modalRaquette6">
            <img src="../assets/img/raquettePromoBabolat.jpg" alt="raquettePromoBabolat" style="width:100%"
                 title="UN CONFORT INEGALABLE (6). 
                 Depuis sa conception la gamme Satelite a toujours été le fleuron technologique de la marque Babolat. Se targuant 
                 d'un aérodynamisme et d'une vitesse de frappe impressionnante, la Satelite Gravity 74 2019 ne déroge pas à la règle. 
                 Cette raquette de badminton extrêmement légère bénéfice d'une grande tolérance offrant aux joueurs un confort 
                 de jeu inégalé. Malgré son équilibre en manche, cette raquette nous propose une puissance surprenante grâce à 
                 l'intégration du MetricFlex." />

        </a>
        <h5 class="mt-1">Babolat - Un confort Inégalable (6)</h5>
        <span class="font-italic">Raquette </span>
        <span>/ Ref : RAQ006</span>
        <span>- 224,90 €</span>
        <button dataImg="RAQ006" dataTitle="babolatConfort" dataRef="RAQ006" dataPrice="224.90"
                type="button" class="btn buy btn-success mt-2 mx-5">Ajouter au panier</button>
    </div>
</div>
</div>


Partie description (modal)

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


<div id="modalRaquette2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRaquette2Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalRaquette2Label">Yonex - We work, you win</h5>
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
                            <p class="mt-3 mb-4">Pour les experts polyvalents, côté cadre, Yonex intègre le procédé phare de sa gamme Astrox : le Rotational Generator System (RGS) et sa théorie du contre-poids. 
                                En répartissant le poids ingénieusement, vous conservez les bienfaits du poids en tête sur les phases offensives sans perdre la maniabilité nécessaire lorsque vous défendez. 
                                Couplé au poids ultra-light et à l'équilibre en tête, on obtient une raquette nerveuse/tranchante en attaque et très maniable en défense.</p>
                            <a class="mt-5" href="../assets/img/raquettePromoYonex.jpg" target="_blank"><img src="../assets/img/raquettePromoYonex.jpg" width="20%" /></a>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center text-primary">Caractéristiques :</h5>
                            <ul class="mt-3">
                                <li>Profil de la raquette : Expert - Offensif</li>
                                <li>Poids moyen : 88g (+-2g)</li>
                                <li>Flexibilité : Très rigide</li>
                                <li>Equilibre : En tête</li>
                                <li>Longueur : 675 mm</li>
                                <li>Composition : 100% H.M. Graphite</li>
                                <li>Technologie du cadre : Namd, Nanometric, Tungsten, Rotational Generator System, 
                                    New Grommet Pattern, Solid Feel Core, Aerobox Frame, Black Micro Core</li>
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



<div id="modalRaquette3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRaquette3Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalRaquette3Label">Babolat - Un confort Inégalable (3)</h5>
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


description des chaussures 

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


<div id="modalShoes2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShoes2Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalShoes2Label">Yonex men noir (2)</h5>
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


<div id="modalShoes3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShoes3Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalShoes3Label">Yonex men noir (3)</h5>
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


description contenu à ajouter après les raquettes et les chaussures

<div id="modalNuméro7" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalX7Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalX7Label">Call of Duty Modern warfare</h5>
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
                            <p class="mt-3 mb-4">Call of Duty Modern Warfare est un jeu de tir à la première personne. Le joueur incarne tour à tour un soldat du SAS ou un combattant de la liberté d'un pays du Proche-Orient. Le jeu adopte un ton sombre et mature, pour plus de réalisme.</p>
                            <a class="mt-5" href="assets/img/Consoles/XBO007.jpg" target="_blank"><img src="assets/img/Consoles/XBO007.jpg" width="20%" /></a>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center text-primary">Caractéristiques :</h5>
                            <ul class="mt-3">
                                <li>Infinity Ward | Activision</li>
                                <li>25 octobre 2020</li>
                                <li>+18 ans</li>
                                <li>FPS</li>
                                <li>Guerre | Sombre</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Ajouter au panier</button>
        </div>
    </div>
</div>
</div>
<div id="modalX8" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalX8Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalX8Label">Halo 5 Guardians</h5>
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
                            <p class="mt-3 mb-4">Halo 5: Guardians sur Xbox One est un FPS mettant en scène les aventures du Master Chief et d'un nouveau personnage, le Spartan Jameson Locke. Le jeu dispose également d'une importante partie multijoueur et reprend les modes de jeu connus de la série, mais compte également deux nouveautés, la Warzone et le mode Elimination. </p>
                            <a class="mt-5" href="assets/img/Consoles/XBO008.jpg" target="_blank"><img src="assets/img/Consoles/XBO008.jpg" width="20%" /></a>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center text-primary">Caractéristiques :</h5>
                            <ul class="mt-3">
                                <li>343 Industries | Microsofts</li>
                                <li>27 octobre 2020</li>
                                <li>+18 ans</li>
                                <li>FPS</li>
                                <li>Science-Fiction | Espace</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Ajouter au panier</button>
        </div>
    </div>
</div>
</div>
<div id="modalX9" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalX9Label" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalX9Label">World of tanks</h5>
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
                            <p class="mt-3 mb-4">Jeu de stratégie et de combat, World of Tanks vous place dans la carlingue d'un tank. Aux commandes de votre char, vous affrontez des joueurs dans des parties en 15 contre 15 quelque peu mouvementées. Plus de 60 véhicules sont disponibles, allant du char léger aux chasseurs de chars et calqués sur des modèles soviétiques, étatsuniens et même allemands.</p>
                            <a class="mt-5" href="assets/img/Consoles/XBO009.jpg" target="_blank"><img src="assets/img/Consoles/XBO009.jpg" width="20%" /></a>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center text-primary">Caractéristiques :</h5>
                            <ul class="mt-3">
                                <li>Wargaming.net</li>
                                <li>13 avr. 2020</li>
                                <li>+7 ans</li>
                                <li>Stratégie</li>
                                <li>Guerre | Tank</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Ajouter au panier</button>
        </div>
    </div>
</div> -->

<?php include 'footer.php'; ?>