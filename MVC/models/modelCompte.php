<?php

// Connexion à la base de donnée
$dbLink = mysqli_connect("mysql-croustagramadd.alwaysdata.net", 328031, "b1Gz0000")
or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
mysqli_select_db($dbLink , "croustagramadd_bdd")
or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));

function getAllPostsData($accountName){
    global $dbLink;
    // Lecture des posts de la BD (SELECT * FROM `croustapost`)

    // Requête
    $recherche = 'SELECT * FROM croustapost WHERE croustagrameur_id="' . $accountName . '" ORDER BY ptsCrous DESC';
    $result = mysqli_query($dbLink, $recherche);

    if ($result) {
        return $result;
    }
}

function getAllCompteData($accountName){
    global $dbLink;
    // Lecture des infos du compte de la BD

    // Requête
    $recherche = 'SELECT * FROM croustagrameur WHERE id="' . $accountName . '"';
    $result = mysqli_query($dbLink, $recherche);

    if ($result) {
        return $result;
    }
}