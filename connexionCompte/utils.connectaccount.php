<?php
    function connexion_page($tabErreurs = array())
    {
        ?>
        <!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset="UTF-8">
            <meta name="titre" content="Se connecter à un compte">
            <meta name="description" content="Page pour se connecter à un compte">
            <link rel="icon" href="/ressources/logo.png" />
            <title>Crousnexion</title>
        </head>
        <body <?php if(in_array('bocchi', $tabErreurs)) echo'style="background-image: url(\'https://media.tenor.com/-FrcCsUig4sAAAAC/spin-bocchi.gif\')"'?>>
            <div id="ContenuPage">
                <div id="BoxMilieu">
                    <form action="../../connexionCompte/connectAccount.php" method="post">
                        <div class="FormDiv">
                            <label>Identifiant :</label>
                            <input type="text" name="username" required>
                        </div>
                        <div class="FormDiv">
                            <label>Mot de passe :</label>
                            <input type="password" name="password" required>
                        </div>
                        <button id="FormBouton" type="submit">Se connecter</button>
                        <?php
                        if (in_array('noMatchFoundUsername', $tabErreurs))
                        {
                            echo '<strong style=\'color:red;\'>Le couple nom d\'utilisateur et mdp ne correspond à aucun compte</strong>';
                        }
                        elseif (in_array('noMatchFoundMail', $tabErreurs))
                        {
                            echo '<strong style=\'color:red;\'>Le couple adresse email et mdp ne correspond à aucun compte</strong>';
                        }
                        ?>
                    </form>
                    <h1 id="PasDeCompte">Pas de compte ?</h1>
                    <button id="InscriptionBouton" onclick="window.location.href='../CreationComptePage/index.php'">S'inscrire</button>
                </div>
            </div>
        </body>
    <?php
    }