<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="../todolist/asset/style.css">

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
    /*Je crée une variable qui me connecte à la base de données todo puis fait une requette sql qui récupère les taches dans la table todolist    */
    $donneesBrute = mysqli_query($con, "SELECT * FROM `todolist`");
    ?>

    <div class="container">

        <table class="table">
            <tbody>
                <!-- Je fais une boucle en while pour qu'a chaque fois qu'une tâche est créé elle soit sous forme de tableau puis soit affiché -->
                <?php while ($taches = mysqli_fetch_array($donneesBrute)) {

                ?>
                <tr class="todo">
                    <!-- Endroit ou son affiché les tache en cours -->
                    <td><?php echo $taches['liste'] ?></td>
                    <!-- bouton supprimer et modifier -->
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