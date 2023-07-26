<?php
// je créer ou récupere une session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription d'un utilisateur</title>
    <link rel="stylesheet" href="./../style.css">
</head>

<body>
    <header>
        <h1>Inscription</h1>
        <section>

            <?php
            // est-ce qu'on a un message a afficher
            if (isset($_SESSION['creationCompte'])) {
                //Afficher le message de résultat de la création du compte
                echo $_SESSION['creationCompte'];
                // j'efface le message de résultat
                unset($_SESSION['creationCompte']);
            }
            ?>
        </section>
    </header>
    <main>
        <form action="inscription.php" method="post">
            <div>
                <label for="Nom">Nom d'Utilisateur</label>
                <input type="text" name="Nom" id="Nom" placeholder="nom" />
            </div>
            <div>
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" placeholder="email" />
            </div>
            <div>
                <label for="Password">Mot de passe</label>
                <input type="password" name="Password" id="Password" placeholder="mot de passe" />
            </div>
            <div>
                <input type="submit" value="Enregistrer" />
            </div>
        </form>

    </main>
</body>

</html>