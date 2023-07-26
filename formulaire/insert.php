<?php

$Con = mysqli_connect('localhost', 'root', '', 'users');

if (isset($_POST['submit'])) {
    $Nom = $_POST['Nom'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $verif_Email = mysqli_query($Con, "SELECT * FROM `utilisateurs` WHERE Email = '$Email' ");
    $verif_Nom = mysqli_query($Con, "SELECT * FROM `utilisateurs` WHERE Nom = '$Nom' ");

    if (mysqli_num_rows($verif_Email)) {
        echo
        "<script>
        alert('Cet adresse Email est déjà enregistré.')
        window.location.href='inscrire.php'
        </script>";
    }


    if (mysqli_num_rows($verif_Nom)) {
        echo
        "<script>
        alert('Ce Nom d'utilisateur est déjà enregistré.')
        window.location.href='inscrire.php'
        </script>";
    } else {
        mysqli_query($Con, "INSERT INTO `utilisateurs`(`Nom`, `Email`, `Password`) VALUES ('$Nom','$Email','$Password')");

        echo
        "<script>
        alert('Enregistrement effectué.')
        window.location.href='connexion.php'
        </script>";
    }
}
