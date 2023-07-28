<?php
include "config.php";
/*Récupère ce que l'utilisateur à modifier*/
$List = $_POST['liste'];
$ID = $_POST['id'];
/*Affiche la modification de la tache sur la page index.php*/
mysqli_query($con, "UPDATE `todolist` SET `liste`= '$List' WHERE id = $ID");
header("location:index.php");
