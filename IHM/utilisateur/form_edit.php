<?php
// print_r($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/IHM//utilisateur/static/style/style.css">
    <title>Editer un <?php echo $user['id']; ?></title>
</head>
<body>
    <?php include('include/header.php') ?>    

    <section>
        <div class="banier_bg">
            <p class="banier">
                Ce formulaire vous permet d'éditer les informations personnelles d'un candidat.
            </p>
        </div>

        <div class="container">
            <form action="/Traitement/Utilisateurs.php" method="post">
                <input type="number" name="id" value="<?php echo isset($user['id'])? $user['id'] : '' ?>" hidden>

                <p>
                    Veuillez modifier votre information:
                </p>
            
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" value="<?php echo isset($user['nom'])? $user['nom'] : '' ?>" required>
            

        
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" value="<?php echo isset($user['prenom'])? $user['prenom'] : '' ?>" required>
            

        
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo isset($user['email'])? $user['email'] : '' ?>" required>
            

        
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="<?php echo isset($user['age'])? $user['age'] : 0 ?>" required>
            

        
                <label for="tel">Tel</label>
                <input type="tel" name="tel" id="tel" value="<?php echo isset($user['tel'])? $user['tel'] : '' ?>" required>
            

        
                <label for="apropos">A propos</label>
                <input type="text" name="apropos" id="apropos" value="<?php echo isset($user['apropos'])? $user['apropos'] : '' ?>" required>
                

                <span>
                    <button type="submit" name="submit_edit">Modifier</button>
                    <button type="reset"><a href="/Traitement/Utilisateurs.php">Annuler</a></button>
                </span>
            </form>

            <img src="/IHM/utilisateur/static/image/form_img.jpg" alt="serer_la_main">

        </div>
    </section>

    <?php include('include/footer.php') ?>
</body>
</html>