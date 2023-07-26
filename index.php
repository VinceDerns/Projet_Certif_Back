<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
</head>

<?php
include '../todolist/composants/header.php';
?>

<body>
    <form action="ajouter.php" method="POST">
        <div class="container">
            <div class="ligne">
                <h3>À FAIRE</h3>
                <div>
                    <input type="text" name="liste" class="controle_form">
                </div>
                <div>
                    <button>Ajouter</button>
                </div>
            </div>
        </div>
    </form>

    <!-- obtenir les données -->

    <?php
    include "config.php";
    $donneesBrute = mysqli_query($con, "SELECT * FROM `todolist`");
    ?>

    <div class="container">

        <table class="table">
            <tbody>
                <?php while ($taches = mysqli_fetch_array($donneesBrute)) {

                ?>
                    <tr>
                        <td><?php echo $taches['liste'] ?></td>
                        <td><a href="supprimer.php? ID= <?php echo $taches['id'] ?>">Supprimer</a></td>
                        <td><a href="modifier.php? ID= <?php echo $taches['id'] ?>">Modifier</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>