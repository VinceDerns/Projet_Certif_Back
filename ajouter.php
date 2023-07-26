<?php 
$LIST = $_POST['liste'];
include "config.php";
mysqli_query($con, "INSERT INTO `todolist`(`liste`) VALUES ('$LIST')");
header('location:index.php');
