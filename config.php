<?php

/*Ouvre une connection à ma base de données avec MySQL 
(die = exit()) */

$con = mysqli_connect("localhost", "root", "", "todo") or die("La connection a échouée");
