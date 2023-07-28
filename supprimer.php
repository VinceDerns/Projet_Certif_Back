<?php
include "config.php";
/*Je Récupère et affiche l'id  dans la base de donnée todolist */
echo $id = $_GET['ID'];
/*Supprime la tâche associer à l'id récupèré sur la page index.php*/
mysqli_query($con, "DELETE FROM `todolist` WHERE id = $id");
header("location:index.php");
