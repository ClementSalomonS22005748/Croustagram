<?php
    require_once 'controllerPageConnexion.php';
    require_once  '../config/connectDatabase.php';
    ?>
    <link rel="stylesheet" href="../public/assets/styles/computer/style.css">
<?php

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $dbPassword = NULL;

    $tabErreurs = array();
    $connexion = connexion();

    if ($username === 'hitori' and $password === 'gotou') connexion_page(array("bocchi"));
    else
    {
        $co = connexion();

        if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $username))
        {
            // Le client se connecte avec son mail

            $query = $co->query('SELECT mdp  FROM croustagrameur WHERE email=\'' . $username . '\'');

            while($dbRow = $query->fetch(PDO::FETCH_ASSOC))
            {
                $dbPassword = $dbRow;
            }
            if (!(password_verify($password, $dbPassword['mdp'])))
            {
                $tabErreurs[] = 'noMatchFoundMail';
            }
            else
            {
                $query = $co->query('SELECT id  FROM croustagrameur WHERE email=\'' . $username . '\'');

                while($dbRow = $query->fetch(PDO::FETCH_ASSOC))
                {
                    $dbId = $dbRow;
                }
                session_start();
                $_SESSION['username'] = $dbId['id'];
                $_SESSION['suid'] = session_id();
                header('Location: ' . $_SESSION['currentUrl']);
                die();
            }
        }
        else
        {
            // Le client se connecte avec son username

            $query = $co->query('SELECT mdp  FROM croustagrameur WHERE id=\'' . $username . '\'');

            while($dbRow = $query->fetch(PDO::FETCH_ASSOC))
            {
                $dbPassword = $dbRow;
            }
            if ($dbPassword == NULL or $dbPassword['mdp'] == '' or !(password_verify($password, $dbPassword['mdp'])))
            {
                $tabErreurs[] = 'noMatchFoundUsername';
            }
            else
            {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['suid'] = session_id();

                // Actualisation de la dernière connexion
                $today = date('Y-m-d');
                $connexion->exec('UPDATE croustagrameur SET derniere_connexion =  "' . $today . '" WHERE id=\'' . $username . '\'');
                header('Location: ' . $_SESSION['currentUrl']);
                die();
            }
        }
        if (count($tabErreurs) !== 0)
        {
            session_start();
            $_SESSION['tabErreurs'] = $tabErreurs;
            header('Location:../views/viewConnexionPage.php');
            die();
        }
    }