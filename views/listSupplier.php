<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/supplier.php';
require_once '../models/role.php';
require_once '../controllers/listSupplierCtrl.php';
require_once '../controllers/deleteSupplierCtrl.php';
require_once '../controllers/listSupplierSearchCtrl.php';
require_once 'header.php';
?>


<div id="patientList" class="h1 text-center my-4">Liste de tous les fournisseurs</div>

<div class="row">
    <div class="col-md-12 mx-3">
        <form method="POST" action="">
            <label class="search mx-5" for="search">Rechercher un fournisseur : </label>
            <input type="search" id="search" name="supplierSearch" aria-label="Search database" />
            <button type="submit" name="" class="btn btn-primary col-md-1 mx-5 my-1">Rechercher</button>
<!--            <input type="filter" id="filter" name="filter" aria-label="Search filter" />-->
            <!--            <ul><label for="filter">Filtrer par :</label>
                                        <select id="filter" name="filter">
            
                                            <option value="" disabled selected></option>
                                            <option value="" name="none">Aucun</option>
                                            <option value="5" name="5">5</option>
                                            <option value="10" name="10">10</option>
                                            <option value="15" name="15">15</option>
                                            <option value="20" name="20">20</option>
                                        </select></ul>-->
        </form>

        <?php if (isset($message)) { ?>
            <p class="messageSupplier"><?= $message ?></p>
        <?php } ?>

        <table class="table">
            <thead>
                <tr class="text-center text-white bg-success">
                    <th scope="col">#id</th>
                    <th scope="col">Siret : </th>
                    <th scope="col">Société : </th>
                    <th scope="col">Informations : </th>
                    <?php if (isAdmin()) { ?>
                        <th scope="col">Supprimer : </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($supplierList as $supplier) { ?>
                    <tr class="text-center text-white bg-primary">
                        <td><?= $supplier->id ?></td>
                        <td><?= $supplier->siret ?></td>
                        <td><?= $supplier->society ?></td>
                        <td><a href="../views/profileSupplier.php?id=<?= $supplier->id ?>" class="btn bg-success mx-5">Afficher</a></td>
                        <?php if (isAdmin()) { ?>
                            <td  class="screenProfile">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?= $supplier->id ?>">
                                    X
                                </button>
                                <!-- The Modal -->
                                <div class="modal" id="myModal<?= $supplier->id ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header bg-danger">
                                                <h4 class="modal-title">Société : <?= $supplier->society ?> <?= $supplier->siret ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body text-dark">
                                                Es-tu sûr de vouloir supprimer l'entreprise "<?= $supplier->society ?>" ?
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                                <a href="../views/listSupplier.php?id=<?= $supplier->id ?>&confirm=true" class="btn bg-danger mx-5">Confirmer</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>

                        <?php
                        }
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mx-5">
        <ul class="pagination">
            <?php if ($page > 1) { ?>
                <li class="page-item"><a class="page-link" href="listSupplier.php?page=<?= $page - 1 ?><?= isset($search) ? '&supplierSearch=' . $search : '' ?>">Précédent</a></li>
            <?php } ?>
            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="listSupplier.php?page=<?= $i ?><?= isset($search) ? '&supplierSearch=' . $search : '' ?>"><?= $i ?></a></li>
            <?php } ?>
                <?php if ($page < $totalPages) { ?>
                <li class="page-item"><a class="page-link" href="listSupplier.php?page=<?= $page + 1 ?><?= isset($search) ? '&supplierSearch=' . $search : '' ?>">Suivant</a></li>
<?php } ?>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>