<?php

/**
 * Affiche la page de visualisation d'un post précis sur mobile
 */

require_once '../controllers/controllerPost.php';
require_once '../controllers/controllerCommentaires.php';
require_once '../controllers/CroustagramGUI_Mobile.php';

$id = $_GET['id'];

echo start_page("Croustapost");
?>
<div id="contenuPage">
    <?php

    $_SESSION['currentUrl'] = $_SERVER['REQUEST_URI'];

    $post = showOnePost($id);

    if($post!==0){
        echo $post;

        echo '<h2>Commentaires :</h2>';

        if (isset($_SESSION['username'])){
            showinterfaceAjoutCommentaire();
        }
        echo showCommentaires($id);
    }
    else echo '<strong>Ce poste n\'existe pas</strong>';

    end_page()
    ?>
</div>