<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Connexion</h1>
        <section>
            <?php
            // est-ce qu'on a un message a afficher
            if (isset($_SESSION['connexion'])) {
                //Afficher le message de résultat de la création du compte
                echo $_SESSION['connexion'];
                // j'efface le message de résultat
                unset($_SESSION['connexion']);
            }
            ?>
        </section>
    </header>
    <main>
        <form action="authentification.php" method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" name="Email" id="email" placeholder="email" />
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="Password" id="mdp" placeholder="mot de passe" />
            </div>
            <div><input type="submit" value="Connecter" /></div>
            <div><a href="inscription.php"><input type="submit" value="Inscription"></a></div>

        </form>
    </main>
</body>

</html>