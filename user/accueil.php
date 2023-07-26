<?php
session_start();
// si mon utilisateur n'est pas connecté
if (!isset($_SESSION['user'])) {
    $_SESSION['login'] = 'Vous devez être identifié pour accéder a cette page';
    // je le redirige vers le formulaire de connexion
    header('location:connexion.php');
}
echo '<pre>' . print_r($_SESSION, true) . '</pre>';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <header>
        <h1>Accueil</h1>
    </header>
    <main>
        <?php
        $nom = $_SESSION['user']['Nom'];
        $prenom = $_SESSION['user']['Prenom'];
        echo "Bienvenue $prenom $nom";
        ?>
    </main>
    <p><a href="deconnexion.php">Deconnexion</a></p>
</body>

</html>