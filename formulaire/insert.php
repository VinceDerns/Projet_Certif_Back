<?php
/*Je me connecte à la base de données users*/
$Con = mysqli_connect('localhost', 'root', '', 'users');

/*recuperer les données du formulaire*/
if (isset($_POST['submit'])) {
    $Nom = $_POST['Nom'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    /*Vérification de l'adresse mail et du nom dans la base de donnée*/
    $verif_Email = mysqli_query($Con, "SELECT * FROM `utilisateurs` WHERE Email = '$Email' ");
    $verif_Nom = mysqli_query($Con, "SELECT * FROM `utilisateurs` WHERE Nom = '$Nom' ");
    /*Si l'adresse mail existe déjà j'affiche ce message*/
    if (mysqli_num_rows($verif_Email)) {
        echo
        "<script>
        alert('Cet adresse Email est déjà enregistré.')
        window.location.href='inscrire.php'
        </script>";
    }

    /*Si le nom d'utilisateur existe déjà j'affiche ce message*/
    if (mysqli_num_rows($verif_Nom)) {
        echo
        "<script>
        alert('Ce Nom d'utilisateur est déjà enregistré.')
        window.location.href='inscrire.php'
        </script>";
    } else {
        mysqli_query($Con, "INSERT INTO `utilisateurs`(`Nom`, `Email`, `Password`) VALUES ('$Nom','$Email','$Password')");
        /*Si le nom et l'adresse mail n'existe pas je les ajoute à la base de données et affiche le message suivant :*/
        echo
        "<script>
        alert('Enregistrement effectué.')
        window.location.href='connexion.php'
        </script>";
    }
}
