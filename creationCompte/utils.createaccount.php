<!-- Page de création du compte -->
<?php
function account_page($errorType = NULL, $def_username = NULL): void
{

?><!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset="UTF-8">
    <meta name="titre" content="Créer un compte">
    <meta name="description" content="Page pour créer un compte">
    <title>Devenir croustagrameur</title>
</head>

<body>
    <h1>Ceci est la page de création d'un compte</h1>
    <form action="/creationCompte/createAccount.php" method="post">
        <label>Username :</label>
        <input type='text' name='username' required value=<?php echo '\'' . $def_username . '\''; ?><br><br>
        <?php
            if ($errorType === 'username' or $errorType === 'both')
            {
                echo '<label style="color=red size=10">Le nom d\'utilisateur ne peut contenir que des caractères alphanumériques</label>';
            }
        ?>
        <br><label>Password :</label>
        <input type='password' name='password' required><br>
        <?php
            if ($errorType === 'password' or $errorType === 'both') {
                echo '<label style=\'color=red size=10·\'>Le mot de passe doit faire minimum 8 caractères</label>';
            }
        ?>
        <br><button type="submit" value="mailer" name="action">Rejoindre Croustagram !</button>
    </form>
</body>
<?php
}
?>
<!--------------------------------->