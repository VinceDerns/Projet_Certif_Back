<?php
/* Je récupère l'adresse mail et le password*/
$Email = $_POST['Email'];
$Password = $_POST['Password'];

/*Je me connecte à la base de données users*/
$Con = mysqli_connect('localhost', 'root', '', 'users');
/*Je me connecte si mon email et password son dans la base de données*/
$result = mysqli_query($Con, "SELECT * FROM `utilisateurs` WHERE (Email = '$Email' OR Nom = '$Nom') AND Password = '$Password' ");


session_start();
if (mysqli_num_rows($result)) {
    /*Si les données sont dans la base de j'affiche ce message et me redirige vers la page index.php*/
    $_SESSION['user'] = $Nom;
    echo
    "<script>
        alert('Connexion réussie !')
        window.location.href='../index.php';
        </script>";
    /*Si les données ne sont pas dans la base j'affiche ce message et me redirige vers la page connexion.php*/
} else {
    echo
    "<script>
        alert('Erreur avec Email ou Password ')
        window.location.href='connexion.php';
        </script>";
}
