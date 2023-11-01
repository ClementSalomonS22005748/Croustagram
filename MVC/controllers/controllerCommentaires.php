<?php
require_once '../models/modelCommentaires.php';
require_once '../models/modelCompte.php';

/**
 * @param $id_post
 * @return string
 * Fonction qui prend en paramètre l'id d'un post et le transforme
 * en HTML grace à la fonction showOneCommentaire()
 */
function showCommentaires($id_post): string
{
    $result = getAllCommentaires($id_post);
    $commentaires = ' ';

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $accountData = getAllCompteData($row['croustagrameur_id']);
        $account = $accountData->fetch(PDO::FETCH_ASSOC);
        $accountName = $account['pseudo'];

        $commentaires . '<section id="commentaire">';
        $commentaires . showOneCommentaire($row['texte'], $row['croustagrameur_id'], $accountName, $row['date'], $row['id'], $row['croustapost_id']);
        $commentaires . '</section>';
    }
    return $commentaires;
}

/**
 * @param $texte
 * @param $croustagrameur_id
 * @param $pseudo
 * @param $date
 * @param $id
 * @param $idPost
 * @return void
 * Fonction qui affichage un commentaire
 */
function showOneCommentaire($texte, $croustagrameur_id, $pseudo, $date, $id, $idPost): void
{
    ?>
    <br>
        <div class="commentaire" style="margin-bottom: 25px">
            <div class="hautCommentaireDiv">
                <div class="postUserDiv">
                    <img alt="Photo de profil" <?php echo 'onclick="window.location.href = \'viewCompte.php?id=' . $croustagrameur_id . '\';"' ?> src="../public/assets/images/profil.png" class="imgProfilCommentaire">
                    <label class="nomUserPost"> <?php echo $pseudo ?> </label>
                </div>
                <label> <?php echo $date ?> </label>
            </div>

            <label class="messageCommentaire"> <?php echo wordwrap($texte, 30, '<br>', true) ?> </label>

            <?php
            if(isset($_SESSION['username']) and $_SESSION['username'] === $croustagrameur_id){
                echo '<button onclick="window.location.href = ' . '\'../models/deleteCommsAndPosts.php?postId=' . $idPost . '&commId=' . $id . '\' ">Supprimer le commentaire</button><br>';
            }
            ?>
        </div>
<?php
}

/**
 * @return void
 * Affiche une textarea et un bouton submit pour ajouter un commentaire
 */
function showinterfaceAjoutCommentaire(){
    ?>
    <form action="../controllers/addComment.php?id=<?php echo $_GET['id'] ?>" method="post">
        <div id="addComment">
            <textarea name="commentContent" placeholder="Contenu du commentaire" class="commentBox" rows="6" cols="50"></textarea>
            <br><br>
            <button type="submit">Ajouter un commentaire</button>
        </div>
    </form>
    <?php
}
