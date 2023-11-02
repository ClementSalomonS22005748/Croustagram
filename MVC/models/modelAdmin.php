<?php
require_once '../config/connectDatabase.php';

// Connexion à la base de donnée
$connexion = connexion();

/**
 * @param $accountName
 * Renvoie un booleen (1 si le compte est admin, 0 sinon)
 */
function isAdmin($accountName){
    global $connexion;

    // Requête
    $requete = 'SELECT admin from croustagrameur where id="'. $accountName .'"';
    $result = $connexion->query($requete);

    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['admin'];
    }
    return 0;
}