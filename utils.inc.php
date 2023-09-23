<?php

/*
 * Fonction start_page
 */

function start_page($title) :void
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="titre" content="Page d'accueil">
        <link rel="icon" href="/ressources/logo.png" />
        <meta name="description" content="Page d'accueil de Croustagram - Mobile">
        <link rel="stylesheet" href="style.css">
        <title>Croustagram</title>
    </head>
    <body>
        <header>
            <div id="DivLogoBarre">
                <img id="Logo" src="../../ressources/logo.png">
                <div id="DivBarreRecherche">
                    <button id="Recherche" onclick=""></button>
                    <input id="BarreRecherche" type="text">
                    <button id="EffacerRecherche" onclick=""></button>
                    <button id="FiltrerRecherche" onclick=""></button>
                </div>
            </div>
            <h1><?php echo $title ?></h1>
        </header>
    <?php
}

function end_page($title): void
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">
        <footer>
            <button id="BoutonHome" onclick="window.location.href='../HomePage/index.php';"></button>
            <button id="BoutonLeaderboard" onclick="window.location.href='../LeaderboardPage/index.php';"></button>
            <button id="BoutonProfil" onclick="window.location.href='../ProfilPage/index.php';"></button>
        </footer>
    </body>
    <?php
}
?>

<!-- Afficher un post --> 
<?php
    function afficher_post($croustagrameur, $titre, $message, $date, $categorie, $ptsCrous): void
    {
?>
<br><br><br><br>
<div id="post">
    <table id="tabPost">
        <tr>
            <th><img src="../../ressources/profil.png" id="imgProfil"> <?php echo $croustagrameur ?> </th>
            <th id="titrePost"><?php
                echo '<h1>' . $titre . '</h1>';
                ?></th>
            <th><?php
                echo $date;
            ?></th>
        </tr>
        <tr>
            <th colspan="3"><?php
                echo '<h2>' . $message . '</h2>';
                ?></th>
        </tr>
        <tr>
            <th> <?php echo $ptsCrous ?>
                <img src="../../ressources/fleche-vers-le-haut.png" id="imgProfil">
                <img src="../../ressources/fleche-vers-le-bas.png" id="imgProfil">
            </th>
            <th> <?php echo $categorie ?> </th>
            <th><img src="../../ressources/commentaire.png" id="imgProfil"></th>
        </tr>
    </table>
</div>
<?php
}
?>
<!---------------------->