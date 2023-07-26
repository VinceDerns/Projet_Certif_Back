<?php
$Email = $_POST['Email'];
$Password = $_POST['Password'];

$Con = mysqli_connect('localhost', 'root', '', 'users');
$result = mysqli_query($Con, "SELECT * FROM `utilisateurs` WHERE (Email = '$Email' OR Nom = '$Nom') AND Password = '$Password' ");


session_start();
if (mysqli_num_rows($result)) {

    $_SESSION['user'] = $Nom;
    echo
    "<script>
        alert('Connexion réussie !')
        window.location.href='../index.php';
        </script>";
} else {
    echo
    "<script>
        alert('Erreur avec Email ou Password ')
        window.location.href='connexion.php';
        </script>";
}
