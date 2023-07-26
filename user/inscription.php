<?php
// je créer ou récupere une session coté server et j'active la variable $_SESSION
session_start();

//recuperer les données du formulaire

// if(isset($_POST['nom'])){
//     $nom = $_POST['nom'];
// } else {
//     $nom = null;
// }

$Nom = $_POST['Nom'] ?? null; // version raccourci du if isset ci dessus
$Email = $_POST['Email'] ?? null;
$Password = $_POST['Password'] ?? null;


//je vérifie que les données du formulaire soit conformes à l'attendu
if (
    //je vérifie que le nom n'est pas null et comporte au maximum 100 caractères
    !is_null($Nom) && strlen($Nom) <= 100 &&
    //je vérifie que le mail n'est pas null, comporte au maximum 255 caractères et respecte le format d'un mail traditionel (abc@efg.ext)
    !is_null($Email) && strlen($Email) <= 255 && filter_var($Email, FILTER_VALIDATE_EMAIL) &&
    // je vérifie que le mot de passe ne soit pas null et comporte au moins 8 caracteres dont 1 majuscule, 1 minuscule, un chiffre et 1 caractère spéciale
    !is_null($Password) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $Password)

) {
    //toute les données récuperer sont valides, je peux faire l'enregistrement en base de données
    // __DIR__ renvoi le chemin du dossier ou se trouve le script
    $pathToDbCon = __DIR__ . '/../dbCon.php'; // je créer le chemin d'accès à mon fichier de connexion
    require_once $pathToDbCon; // j'inclut le fichier de connexion (je me connecte a MariaDB)

    //je prepare ma requête d'insertion (:var => represente une variable SQL PDO) )
    $sql = 'insert into utilisateurs values(null, :Nom, :Email, :Password);';
    // $sql = "insert into utilisateur values(null, $nom, $prenom, $email, $tel, $mdp, $description);";

    //je prepare ma requete pour eviter les attaques par type injection SQL
    $stmt = $pdo->prepare($sql);

    $Password = dataCleaning($Password);
    // P@ssw0rd
    //j'executer la requête en fournissant les données du formulaire
    $res = $stmt->execute([
        'Nom' => dataCleaning($Nom),
        'Email' => dataCleaning($Email),
        'Password' => password_hash($Password, PASSWORD_ARGON2I),
    ]);

    //informe l'utilisateur que l'insertion est ok
    if ($res) {
        $_SESSION['creationCompte'] = 'Le compte a été crée avec succès';
    } else {
        $_SESSION['creationCompte'] = 'Une erreur est survenue lors de la création du compte, veuillez ré essayer dans quelques instant et contacter l\'administrateur du site si le problèmeme persiste';
    }
} else {
    // les informations ne sont pas bonnes, je demande à l'utilisateur de vérifier sa saisie
    $_SESSION['creationCompte'] = 'Veuillez vérifier les informations saisie sur le formulaire';
}

//je redirige mon utilisateur vers le formulaire
header('location:form-inscription.php');
