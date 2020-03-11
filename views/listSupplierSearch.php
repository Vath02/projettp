<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../controllers/exo12_listPatientSearchCtrl.php';
require_once 'header.php';
?>

<form method="GET" action="">


<label for="search">Rechercher un patient : </label>
<input type="search" id=search<?= $search->lastname ?> <?= $search->firstname ?>" name="nameSearch"
       aria-label="Search database">

<button type="submit" name="submit" class="btn btn-primary col-md-6 mx-5 mt-3">Rechercher <?= $search ?></button>


</form>


