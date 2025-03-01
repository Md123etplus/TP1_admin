<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <!-- à inclure après -->
    <header>
        <!-- <img src="static/images/ants.jpg" alt="logo"> -->
        <a href="/form_add.php">Ajouter cv</a>
    </header>

    <section>
        <?php
            if(isset($isDeleted) && $isDeleted){
        ?>
            <span>L'utilisateur a été supprimé avec succès</span>
        <?php
            }

            // if(isset($user) && !empty($users)){
            if(isset($users) && !empty($users)){
                print_r($users);
        ?>
            <p>
                Bonjour Admin, <br>
                Voici la liste de candidats qui a postulé pour ce stage.
            </p>
            <table border="1">
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
                        <td><a href="/Traitement/Utilisateurs.php?action=supprimer&data=<?php echo $user['id']; ?>">Supprimer</a></td>
                        <td><a href="/Traitement/Utilisateurs.php?action=modifier&data=<?php echo $user['id']; ?>">Modifier_Perso</a></td>
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

        <?php
            }
        ?>
        

    </section>

    <!-- à inclure après -->
    <footer>
    
    </footer>
</body>
</html>