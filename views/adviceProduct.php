<?php
session_start();
require_once '../init/functions.php';
require_once '../init/credentials.php';
require_once '../models/database.php';
require_once '../models/product.php';
require_once '../controllers/adviceProductCtrl.php';
require_once 'header.php';
?>
<!-- Guide du débutant -->

<!-- les chaussures -->

<div id="promo" class="promo">
    <div class=" row mt-4">
        <div class="col-lg-12 text-center d-flex justify-content-center mt-4">
            <h1>BIENVENUE DANS LE GUIDE DU DÉBUTANT</h1>
        </div>
    </div>
    <div class=" row">
        <div class="col-lg-11 mt-4 ml-5">
            <p>Comment bien choisir son matériel de badminton ? Une question aussi simple que complexe lorsque
                l'on réalise ses premiers pas eb club de badminton ! Le guide ci-dessous a été spécialement pensé pour vous
                accompagner dans votre sélection, mais aussi afin de vous aider à comprendre les combreux enjeux qui en
                découle, et ce pour faire le choix optimal entre envies et besoins.</p>
        </div>
    </div>

    <div class=" row mt-4">
        <div class="col-lg-12 text-center d-flex justify-content-center my-2">
            <h2>CHOISIR SES CHAUSSURES DE BADMINTON</h2>
        </div>
    </div>
    <img src="../assets/img/adviceShoes.jpg" alt="adviceShoes" style="width:100%" />
    <div class=" row">
        <div class="col-lg-11 mt-4 ml-5">
            <p><a href="../views/detailsProduct.php">L'achat de chaussures </a>de badminton est souvent sous-estimé, et pourtant il s'agit du premier 
                véritable outil indispensable à l'équipement du badiste. Parfois délaissée au profit d'une meilleure 
                raquette, la chaussure répond à la fois à des impératifs de sécurité et de performance. 
                En effet, le badiste est constamment en mouvement, et multiplie les changements de direction 
                lors d'un match. Il est donc indispensable d'avoir une paire de chaussures parfaitement adaptées 
                pour le badminton. Ceci vous apportera à la fois un gain en rapidité et en maintien, tout en limitant 
                drastiquement le risque de blessure (foulures, entorses, ampoules ...). </p>
        </div>
    </div>

    <div class=" row mt-4">
        <div class="col-lg-11 ml-5">
            <h3 class="text-center">LE TYPE DE PRATIQUE</h3>
            <p>Cela peut sembler évident, mais il est important de choisir une paire adaptée à votre fréquence 
                de jeu. Ne serait-ce que pour vous aider à définir un budget afin de vous équiper d'emblée du
                produit correspond le mieux. Voici un barème qui pourra vous aider à vous situer : </p>
            <ul><li>Pratique intensive : Deux à trois séances par semaine</li>
                <li>Pratique régulière : Une séance par semaine</li>
                <li>Pratique loisir : Séances occasionnelles</li>
            </ul>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-11 ml-5">
            <h3 class="text-center">LA MORPHOLOGIE</h3>
            <p>Il est essentiel de prendre en compte votre gabarit pour choisir votre paire de chaussures
                de badminton. Il s'agit là aussi d'une question de sécurisation de votre pied et de vos articulations. 
                Si par exemple votre pied est fin et que vous choisissez une chaussure spécialement adaptée aux
                pieds larges, il y a de fortes chances pour que vous ne soyez pas bien maintenu, ce qui augmente
                les risques. Si vous avez un pied fin, il vaut mieux opter pour un modèle proche de votre pied, et 
                inversement si vous avez une morphologie à pied large afin de ne pas ressentir d'inconfort. </p>
        </div>
    </div>
    <div class=" row mt-4">
        <div class="col-lg-11 ml-5">
            <h3 class="text-center">LE STYLE</h3>
            <p>Lorsque vous achetez votre paire de chaussures, et afin de faciliter votre choix, nous 
                indiquons une orientation technique pour chaque modèle. Nous les classons selon les styles 
                suivants : </p>
            <ul><li>Stabilité : pour les joueurs qui désirent une sécurité maximale une fois sur le terrain, même sur des déplacements rapides</li>
                <li>Confort : si vous désirez un amorti conséquent et/ou que vos articulations sont fragiles, c'est vers cette catégorie qu'il faudra vous tourner</li>
                <li>Dynamisme : idéal pour les badistes athlétiques, en quête de vitesse de déplacement</li>
                <li>Légèreté : pour les joueurs toniques qui veulent optimiser leur rapidité</li>
                <li>Standard : pour les petits budgets en quête d'un bon rapport qualité/prix.</li>
            </ul>
        </div>
    </div>

    <!-- la raquette -->
    <hr class="mt-3" />
    <div class=" row mt-4">
        <div class="col-lg-12 text-center d-flex justify-content-center my-2">
            <h2>CHOISIR SA RAQUETTE DE BADMINTON</h2>
        </div>
    </div>
    <img src="../assets/img/adviceRaquette.jpg" alt="adviceRaquette" style="width:100%" />
    <div class=" row">
        <div class="col-lg-11 mt-4 ml-5">
            <p>C'est l'outil sacré du joueur de badminton ! L'achat de raquette de badminton est un cap 
                décisif pour un badiste débutant. Il convient cependant de ne pas choisir n'importe 
                quel modèle, et ce afin de pouvoir progresser rapidement, et d'éviter tout type de blessure. 
                Par exemple, une rigidité de raquette excessive peut générer des frappes forcées par manque 
                de puissance, et causer des tendinites.</p>
        </div>
    </div>

    <div class=" row mt-4">
        <div class="col-lg-11 ml-5">
            <h3 class="text-center">LA FLEXIBILITÉ</h3>
            <p>Voici une caractéristique capitale à prendre en compte lors de votre choix. Il en existe trois types principaux : </p>
            <ul><li>Souple : plus facile à jouer, avec une longueur de volant, mais moins précis</li>
                <li>Semi-rigide : le bon compromis entre puissance et précision, pour joueurs réguliers</li>
                <li>Rigide : le choix des experts car exigeant physiquement, mais très précis.</li>
            </ul>
            <p>Pour un badiste débutant, une tige souple est conseillée car elle est plus facile à tordre. 
                C'est ce qu'on appelle l'effet catapulte. Moins précise, mais offrant plus d'assistance sur 
                l'aspect puissance, elle vous offrira l'avantage d'être à la fois confortable et performante, 
                avec notamment une belle longueur de volant sans avoir à forcer votre geste. </p>
            <p>Au contraire, une tige rigide sera plébiscitée par les joueurs plus techniques et puissants afin de 
                bénéficier d'un apport en précision maximal. La tige étant plus dure, et donc plus exigeante pour le 
                joueur, ce type de cadre n'est pas à mettre entre toutes les mains. </p>
        </div>
    </div>

    <div class=" row mt-4">
        <div class="col-lg-11 ml-5">
            <h3 class="text-center">L'EQUILIBRE</h3>
            <p>Voici l'autre critère clé à prendre en compte lors de votre choix de raquette. 
                C'est aussi lui qui dictera votre manière de jouer sur le terrain. Il en existe trois types : </p>
            <ul><li>En manche : la raquette paraît pencher vers le grip</li>
                <li>Neutre : le poids de la raquette est équitablement réparti entre tête et manche</li>
                <li>En tête : l'équilibre penche vers le cadre.</li>
            </ul>
            <p>Grossièrement, plus une raquette bénéficie d'un poids en manche, plus elle sera maniable, 
                mais moins elle sera puissante. Inversement, plus le poids de la raquette se situe en tête, plus elle 
                sera puissante, mais moins vous aurez de maniabilité (et donc de facilité à défendre). Un équilibre 
                neutre sera privilégié par les joueurs en quête de polyvalence. </p>
        </div>
    </div>

    <div class=" row mt-4">
        <div class="col-lg-11 ml-5">
            <h3 class="text-center">LE POIDS</h3>
            <p>Dernier élément clé, le poids influe à la fois sur la puissance, la maniabilité et la précision de 
                la raquette. Pour l'exprimer nous utilisons le système d'intervalles imposé par Yonex, et qui 
                fonctionne de la manière suivante : </p>
            <ul><li>2U : 90 - 94 grammes</li>
                <li>3U : 85 - 89 grammes</li>
                <li>4U : 80 - 84 grammes</li>
                <li>5U : 75 - 79 grammes</li>
                <li>6U : 70 - 74 grammes</li>
            </ul>
            <p>Plus une raquette sera légère, plus elle sera maniable, et plus elle sera lourde, plus elle sera 
                puissante et précise. Ce raisonnement est bien entendu à mettre en relation avec les caractéristiques 
                de la raquette. Par exemple, un cadre à l'équilibre en manche et doté d'un poids à 90 grammes pourra
                s'avérer intéressant dans certains cas, en ajoutant plus de poids dans les frappes tout en conservant 
                une bonne maniabilité. </p>
            <p>Bien choisir sa raquette de badminton est une affaire de combinaison de caractéristiques. À vous de 
                choisir la vôtre !</p>
            <p>La raquette de badminton demeure l'élément prépondérant du matériel d'un joueur. 
                Afin de vous améliorer progressivement, il est important de compléter l'équipement de votre raquette 
                afin de maximiser ses qualités. </p>
        </div>
    </div>

    <!-- Sac de badminton -->
    <hr class="mt-3" />
    <div class=" row mt-4">
        <div class="col-lg-12 text-center d-flex justify-content-center my-2">
            <h2>CHOISIR SON SAC DE BADMINTON</h2>
        </div>
    </div>
    <img src="../assets/img/adviceSac.jpg" alt="adviceSac" style="width:100%" />
    <div class=" row">
        <div class="col-lg-11 mt-4 ml-5">
            <p>Si vous désirez transporter aisément l'ensemble de votre équipement dans le confort et la sérénité, 
                l'achat d'un thermobag, comme pour les chaussures, sera à déterminer en fonction de votre fréquence
                de pratique. Le joueur loisir pourra opter pour un backpack ou un sac à une poche, tandis que le 
                badiste régulier ou compétiteur optera pour un thermobag deux ou trois poches afin de pouvoir 
                stocker plus de matériel. </p>
            <p>Par exemple, une poche isotherme s'avérera extrêmement utile pour protéger au maximum le 
                cordage de votre raquette des écarts de température, pour une durée de vie rallongée. Par ailleurs, 
                un compartiment spécifique pour vos chaussures ou vêtements humides est toujours appréciable pour 
                une hygiène optimale. </p>
        </div>
    </div>

</div>
<?php include 'footer.php'; ?>