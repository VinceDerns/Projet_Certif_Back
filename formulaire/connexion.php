<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="../asset/style.css">

</head>

<body>
    <div class="form_container">
        <div class="row">
            <p>S'inscrire</p>
            <form action="connexion1.php" method="POST">
                <div class="form_input">
                    <label for="">Email :</label>
                    <input type="email" name="Email" placeholder="Saisir votre Email" class="form_control">
                </div>
                <div class="form_input">
                    <label for="">Password :</label>
                    <input type="password" name="Password" placeholder="Saisir votre password" class="form_control">
                </div>
                <div class="form_input">
                    <button class="form_btn">Se connecter</button>
                </div>
                <div class="form_input">
                    <button name="submit" class="form_btn"><a href="inscrire.php">s'inscrire</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>