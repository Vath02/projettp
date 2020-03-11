<?php
session_start();
require_once 'init/functions.php';
include 'views/header.php';
?>

<div class="row d-flex justify-content-center my-4">
    <div class="col-md-12">
        <div class="news text-center my-3 p-0">Actualité n°1</div>
    </div>
</div>

<!-- 1er article -->
<div class="row lee">
    <div class="col-md-6 justify-content-center px-5 py-5">
        <img src="../assets/img/leeChongWei.jpg" class="wei my-5" alt="" /></div>

    <div class="col-md-5 px-5 py-5">
        <h1 class="display text-center">Atteint d’un cancer, Lee Chong Wei ne participera pas aux Mondiaux</h1>
        <p class="lead text-center">Atteint d’un cancer depuis l’été dernier, la star du badminton Lee Chong Wei ne participera pas aux Mondiaux en Suisse au mois d’août, a annoncé la Fédération malaisienne mercredi.</p>

        <p class="malaysia lead mt-2">Le Malaisien Lee Chong Wei, l’une des stars mondiales du badminton qui souffre depuis l’été dernier d’un cancer, ne disputera pas les Mondiaux au mois d’août en Suisse, a annoncé la Fédération malaisienne mercredi.
            L’ancien numéro 1 mondial, âgé de 36 ans et triple vice-champion olympique, s’est vu diagnostiquer en juillet dernier un cancer du nez, qui l’a contraint à cesser son activité pendant plusieurs mois.</p>


        <p class="lead mt-2">
            Tombé à la 113e place mondiale, Lee Chong Wei a repris l’entraînement au mois de janvier, mais a repoussé plusieurs fois depuis son retour à la compétition.</p>
    </div>
</div>

<!-- 2eme article -->
<div class="row d-flex justify-content-center my-4">
    <div class="col-md-12">
        <div class="news text-center my-3">Actualité n°2</div>
    </div>
</div>
<div class="row article2 w-100 px-5">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <h1 class="display text-center mt-3">Internationaux de France : Chen Long s'impose chez les hommes, la jeune Sud-Coréenne An Se Young surprend Carolina Marin</h1>
                <p class="southYoung lead mt-4">La jeune Sud-Coréenne An Se Young a laissé sans voix la championne olympique espagnole réputée pour ses cris stridents en finale des Internationaux de France de badminton (16-21, 21-18, 21-5). Dans le tableau masculin, c'est le champion olympique en titre, Chen Long, qui a remporté le tournoi.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a class="navbar-brand" href="#" ><img class="anseYoung my-3" src="../assets/img/anseYoung.jpg" alt="" /></a>
            </div>

            <div class="col-md-4">
                <p class="young lead mt-3">An Se Young victorieuse à 17 ans. Les meilleurs joueurs de badminton du monde y font apprécier leurs qualités physiques phénoménales et leur sens tactique extraordinaire, dans un mélange époustouflant de brutalité et de finesse. Peut-on posséder ce mélange délicat à 17 ans ? La Sud-Coréenne An Se Young a prouvé que oui.
                    En finale, elle fit d'abord jeu égal face à la puissance de Carolina Marin, puis se détacha irrésistiblement dans la manche décisive pour l'emporter en trois sets (16-21, 21-18, 21-5).</p></div>
            <div class="col-md-4">
                <p class="young2 lead mt-3">
                    Il est dommage que cette championne exceptionnelle, qui vient de revenir au plus haut niveau après une sérieuse blessure ne mette pas de bémol à ses décibels. Elle n'eut pas grand-chose à dire sur sa défaite et son adversaire non plus, interrogeant du regard son entraîneur pour répondre à l'interprète. An Se Young venait - il est vrai - de parler fort sur le court en matant l'Espagnole.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="young3 lead my-3 mb-4">
                    On prendra garde de s'extasier sur sa précocité. Ces dernières années, la Thaïlandaise Intanon, la Japonaise Yamaguchi et la Taïwanaise Tai, ont toutes trois remporté des tournois majeurs entre 16 et 18 ans. Ces jeunes filles sont plus précoces que leurs homologues masculins. Car c'est un champion d'âge mûr qui a décroché la timbale chez les hommes.
                </p>
            </div>
        </div>
    </div>
</div>

<p class="py-2"></p>

<div class="row">
    <div class="col-md-12 shop mb-4 text-center py-1">BOUTIQUE VATMINTON
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-3 d-flex justify-content-center w-50">
        <a href="../views/listProduct.php"><img src="../assets/img/collectionClub2020.jpg" alt="boutique Vatminton" /></a>
    </div>
</div>

<?php include 'views/footer.php'; ?>
