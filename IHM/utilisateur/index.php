<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/IHM//utilisateur/static/style/style.css">
    <title>Home</title>
</head>
<body>
    <!-- à inclure après -->
    <?php include('include/header.php') ?>

    <section>
        <?php
            if(isset($isDeleted) && $isDeleted){
                echo "<span>L'utilisateur a été supprimé avec succès</span>";
            }
        ?>     
            <div class="banier_bg">
                <p class="banier">
                    <span class="bonjour">Bonjour Admin,</span> <br>
                    Voici la liste des candidats qui ont postulés pour ce stage.
                </p>
            </div>
            <div id="liste">
            <?php
                // if(isset($user) && !empty($users)){
                if(isset($users) && !empty($users)){
                    // print_r($users);
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom complet</th>
                            <th>Email</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($users as $user){
                        ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['nom']." ".$user['prenom']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <a class="supprimer" href="/Traitement/Utilisateurs.php?action=supprimer&data=<?php echo $user['id']; ?>">Supprimer</a>
                            </td>
                            <td>
                                <a class="modifier" href="/Traitement/Utilisateurs.php?action=modifier&data=<?php echo $user['id']; ?>">Modifier_Perso</a>
                            </td>
                        </tr>

                        <?php
                            }
                        ?>  
                    </tbody>
                </table>
        <?php
            }else{ 
        ?>
            <p>
                Vous avez aucun candidat pour l'instant.
            </p>

            </div>
        <?php
            }
        ?>
        

    </section>

    <!-- à inclure après -->
    <?php include('include/footer.php') ?>
</body>
</html>