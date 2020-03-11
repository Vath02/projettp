<!DOCTYPE html>
<html lang=fr dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name= "viewport" content="width=device-width, initial-scale=1" />
        <title>Projet pour le Titre de Professionalisation</title>

        <link href="../assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="../assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/style.css" />

    </head>
    <body>
        <header>

            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand mx-3" href="../index.php" ><img src="../assets/img/vatmintonLogo_45x45.png" alt="vatminton" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link btn btn-danger hvr-shutter-in-horozontal bg-primary text-white mx-3" href="#competition">Compétition <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger hvr-shutter-in-horozontal bg-primary text-white" href="../views/adviceProduct.php">Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger hvr-shutter-in-horozontal text-white mx-3 px-3" href="../views/listProduct.php">Boutique</a>
                        </li>
                    </ul>
                    <div class="col-6">
                        <?= convDateFr(); ?>
                        <p><?= strftime('%H:%M') ?></p>

                        <?php if (isset($message)) { ?>
                            <p class="text-black"><?= $message ?></p>
                        <?php } ?>
                    </div>



                    <?php if (isUser()) { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger bg-success py-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon Espace Utilisateur</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../views/listOrder.php?id=<?= $product->id ?>">Liste de toutes mes commandes</a>
                                <a class="dropdown-item" href="../views/profileUser.php">Détails de mon compte</a>
                                <a class="dropdown-item" href="../views/updateUser.php">Modifié mon utilisateur</a>
                                <a class="dropdown-item" href="../views/deleteUser.php">Supprimer mon utilisateur</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../views/userLogout.php">Me déconnecter</a>
                            </div>
                        </div>
                        <div class="nav-item mx-3">
                            <a class="nav-link btn btn-danger hvr-shutter-in-horozontal text-white" href="../views/displayCart.php"><img src="../assets/img/cart.png" class="cart mr-4" alt="vatminton" />Mon panier</a>
                        </div>
                    <?php } ?>


                    <?php if (isSupplier()) { ?>
                                                <div class="btn-group">
                            <button type="button" class="btn btn-secondary bg-success py-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon Espace Entreprise</button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../views/profileSupplier.php">Détails de mon entreprise</a>
                                <a class="dropdown-item" href="../views/updateSupplier.php">Modifier mes coordonnées</a>
                                <a class="dropdown-item" href="../views/deleteSupplier.php">Supprimer mon espace professionnel</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../views/supplierLogout.php">Me déconnecter</a>
                            </div>
                        </div>
                    <div class="nav-item mx-3 my-1">
                            <a class="nav-link btn btn-success hvr-shutter-in-horozontal text-white" href="../views/addProductBySupplier.php">Ajouter un produit</a>
                        </div>
                    <?php } ?>

                    <?php if (isAdmin()) { ?>
                        <div class="row">
                            <div class="col-6">
                                <li class="nav-item">
                                    <a class="nav-link btn btn-danger hvr-shutter-in-horozontal bg-warning text-white" href="../index.php">ADMINISTRATEUR</a>
                                </li>
                            </div>
                            <div class="col-6">
                                <li class="nav-item">
                                    <a class="nav-link btn btn-danger hvr-shutter-in-horozontal bg-secondary text-white px-3" href="../views/userLogout.php">DECONNECTION</a>
                                </li>
                            </div>
                        </div>

                    <?php } ?>


                    <!-- pour les invités -->
                    <?php if (!isUser() && !isAdmin() && !isSupplier()) { ?>
                        <!-- Example split danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger bg-success">Mon Espace Utilisateur</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split mr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../views/userLogin.php">Me connecter</a>
                                <a class="dropdown-item" href="../views/createUser.php">Je n'ai pas de compte</a>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary bg-success">Mon Espace Entreprise</button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../views/supplierLogin.php">Connexion entreprise</a>
                                <a class="dropdown-item" href="../views/createSupplier.php">Inscription entreprise</a>
                            </div>
                        </div>
                    </div>
                </nav>


                <div id="carousel" class="carousel slide carousel-fade mb-3 w-100 p-0" data-ride="carousel" data-interval="2500">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img id="pic1" class="d-block w-100" src="../assets/img/badminton-france.jpg" alt="First slide" />
                        </div>
                        <div class="carousel-item">
                            <img id="pic2" class="d-block w-100" src="../assets/img/badminton-1060x523.jpg" alt="Second slide" />
                        </div>
                        <div class="carousel-item">
                            <a target="_blank" href="../views/listProduct.php">
                                <img id="pic3" class="d-block w-100" src="../assets/img/header_accueil_yonex_promo2019_1060x523.png" alt="Third slide" /></a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            <?php } ?>


        </header>

        <?php if (isAdmin()) { ?>
            <div class="row admin">
                <div id="admin" class="col-md-12">
                    <img src="../assets/img/admin.png" class="adminImg" alt="admin" />
                    <h1 class="text-center bg-success">PARTIE USER</h1>
                    <ul class="text-center">
                        <li><a class="" href="../views/createUser.php"><h2>Inscrire un client</h2></a></li>
                        <li><a class="" href="../views/listUser.php"><h2>Lister tous les clients</h2></a></li>
                        <li><a class="" href="../views/updateUser.php"><h2>Modifier un client</h2></a></li>
                        <li><a class="" href="../views/deleteUser.php"><h2>Supprimer un client</h2></a></li>
                    </ul>

                    <h1 class="text-center">PARTIE SUPPLIER</h1>
                    <ul class="text-center">
                        <li><a class="" href="../views/createSupplier.php"><h2>Inscrire un fournisseur</h2></a></li>
                        <li><a class="" href="../views/listSupplier.php"><h2>Lister tous les fournisseurs</h2></a></li>
                        <li><a class="" href="../views/updateSupplier.php"><h2>Modifier un fournisseur</h2></a></li>
                        <li><a class="" href="../views/deleteSupplier.php"><h2>Supprimer un fournisseur</h2></a></li>
                    </ul>

                    <h1 class="text-center">PARTIE PRODUCT</h1>
                    <ul class="text-center">
                        <li><a class="" href="../views/addProductBySupplier.php"><h2>Ajouter un produit</h2></a></li>
                        <li><a class="" href="../views/listProduct.php"><h2>Lister tous les produits</h2></a></li>
                        <li><a class="" href="../views/updateProduct.php"><h2>Modifier un produit</h2></a></li>
                        <li><a class="" href="../views/deleteProduct.php"><h2>Supprimer un produit</h2></a></li>
                    </ul>

                </div>
            </div>
            <hr class="mt-5" />

        <?php } ?>
        <!--  <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
        </nav>-->

