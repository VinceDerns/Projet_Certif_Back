<?php
include "config.php";
$List = $_POST['liste'];
$ID = $_POST['id'];
mysqli_query($con, "UPDATE `todolist` SET `liste`= '$List' WHERE id = $ID");
header("location:index.php");
