<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/IHM//utilisateur/static/style/style.css">
    <title>Ajouter un cv</title>
</head>
<body>
    <?php include('include/header.php') ?>
    <section>
        <div class="banier_bg">
            <p class="banier">
                Ce formulaire vous permet d'ajouter les informations personnelles d'un candidat.
            </p>
        </div>
        <div class="container">
            <form action="/Traitement/Utilisateurs.php" method="post">
                <p>
                    Veuillez remplir le formulaire:
                </p>

                <label for="nom">Nom: </label>
                <input type="text" name="nom" id="nom" required>

                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" required>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>

                <label for="age">Age</label>
                <input type="number" name="age" id="age" required>

                <label for="tel">Tel</label>
                <input type="tel" name="tel" id="tel" required>

                <label for="apropos">A propos</label>
                <input type="text" name="apropos" id="apropos" required>

                <span>
                    <button type="submit" name="submit_add">Ajouter</button>
                    <button type="reset"><a href="/Traitement/Utilisateurs.php">Annuler</a></button>
                </span>
            </form>

            <img src="static/image/form_img.jpg" alt="serer_la_main">
        </div>    
    </section>

</body>
</html>