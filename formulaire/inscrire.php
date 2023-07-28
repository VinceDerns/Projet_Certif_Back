<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/style.css">
    <title>S'inscrire</title>
</head>

<body>
    <div class="form_container">
        <div class="row">
            <p>S'inscrire</p>
            <form action="insert.php" method="POST">
                <div class="form_input">
                    <label for="">Nom :</label>
                    <input type="text" name="Nom" placeholder="Saisir votre nom d'utilisateur" class="form_control">
                </div>
                <div class="form_input">
                    <label for="">Email :</label>
                    <input type="email" name="Email" placeholder="Saisir votre Email" class="form_control">
                </div>
                <div class="form_input">
                    <label for="">Password :</label>
                    <input type="password" name="Password" placeholder="Saisir votre password" class="form_control">
                </div>
                <div class="form_input">
                    <button name="submit" class="form_btn">Inscription</button>
                </div>
                <div class="form_input">
                    <button class="form_btn"><a href="connexion.php">Déjà inscrit</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>