<?php
/*Je récupère ce que l'utilisateur écrit*/
$LIST = $_POST['liste'];
include "config.php";
/* je le rajoute à la base de donnée todolist*/
mysqli_query($con, "INSERT INTO `todolist`(`liste`) VALUES ('$LIST')");
/* affiche ce que l'utilisateur à écrit directement sur la page index.php*/
header('location:index.php');
