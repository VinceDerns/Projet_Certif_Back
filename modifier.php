<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="../todolist/asset/style.css">

</head>

<?php
include '../todolist/composants/header.php';
?>



<?php
$id = $_GET['ID'];
include "config.php";
/*JE récupère la tache grace à son id*/
$recupTache = mysqli_query($con, "SELECT * FROM `todolist` WHERE id = $id");
/*Récupère la ligne suivante sous forme de tableau*/
$donnees = mysqli_fetch_array($recupTache);
?>

<body>
    <form action="modifier1.php" method="POST">
        <div class="container">
            <div class="ligne">
                <h3>MODIFIER</h3>
                <div>
                    <!-- affiche la tâche récupèré -->
                    <input type="text" value="<?php echo $donnees['liste'] ?>" name="liste" class="controle_form">
                </div>
                <div>
                    <button>Modifier</button>
                    <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>">
                </div>
            </div>
        </div>
    </form>
</body>

</html>