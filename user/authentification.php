<?php
session_start();

//recuperer les données du formulaire
$email = $_POST['Email'] ?? null;
$Password = $_POST['Password'] ?? null;

if (
    //je vérifie que le mail n'est pas null, comporte au maximum 255 caractères et respecte le format d'un mail traditionel (abc@efg.ext)
    !is_null($email) && strlen($email) <= 255 && filter_var($email, FILTER_VALIDATE_EMAIL) &&
    // je vérifie que le mot de passe ne soit pas null et comporte au moins 8 caracteres dont 1 majuscule, 1 minuscule, un chiffre et 1 caractère spéciale
    !is_null($mdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $mdp)
) {
    //toute les données récuperer sont valides, je peux faire l'enregistrement en base de données
    $pathToDbCon = __DIR__ . '/../dbCon.php';
    require_once $pathToDbCon;

    //j'écrit ma requête de select
    $sql = 'select * from utilisateurs where Email = :Email';

    //je prepare ma requete pour eviter les attaques par type injection SQL
    $stmt = $pdo->prepare($sql);

    //j'execute la requête en fournissant les données du formulaire
    $res = $stmt->execute(['Email' => dataCleaning($Email)]);

    //informe l'utilisateur que l'insertion est ok
    if ($res) {
        //je vais recuperer les informations de l'utilisateur et
        $user = $stmt->fetch(); // ->fetch permet de lire une ligne du resultat SQL

        // je compare le mdp fourni avec celui stocké en bdd
        if (password_verify($mdp, $user['mdp']) === true) {
            //si le mdp est vérifié alors j
            $_SESSION['accueil'] = 'Bienvenue ' . $user['prenom'] . ' ' . $user['nom'];
            $_SESSION['user'] = $user; // j'enregistre le comtpe utilisateur en session
            //je redirige vers la homepage
            header('location:../ajouter.php');
            //j'arrete l'execution du script
            die(); // ou exit();
        } else {
            $_SESSION['connexion'] = 'Merci de vérifier votre email et/ou votre mot de passe';
        }
    } else {
        $_SESSION['connexion'] = 'Une erreur est survenue lors de la création du compte, veuillez ré essayer dans quelques instant et contacter l\'administrateur du site si le problèmeme persiste';
    }
} else {
    // les informations ne sont pas bonnes, je demande à l'utilisateur de vérifier sa saisie
    $_SESSION['connexion'] = 'Veuillez vérifier les informations saisie sur le formulaire';
}

//je redirige mon utilisateur vers le formulaire
header('location:form_inscription.php');
