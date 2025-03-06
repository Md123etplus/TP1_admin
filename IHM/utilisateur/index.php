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
            <div class="banier_bg">
                <p class="banier">
                    <span class="bonjour">Bonjour Admin,</span> <br>
                    Voici la liste des candidats qui ont postulés pour ce stage.
                </p>
            </div>

            <?php
                if(isset($isDeleted) && $isDeleted){
                    echo "<span style=\"color: green;\">L'utilisateur a été supprimé avec succès</span>";
                }
                else if(isset($errors)&& !empty($errors)){
                    echo "<span style=\"color: red;\"> $errors </span>";
                }
            ?>
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
                                <a class="supprimer" href="#" onclick="confirmDelete(<?php echo $user['id']; ?>); return false;">
                                Supprimer
                                </a>
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
            <div class="aucun_candidat">
                <img src="/IHM/utilisateur/static/image/a_empty.jpg" alt="">

                <p> Vous avez aucun candidat pour l'instant.</p>
            </div>

            </div>
        <?php
            }
        ?>
        

    </section>

    <!-- à inclure après -->
    <?php include('include/footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(userId) {
    Swal.fire({
        title: "Êtes-vous sûr ?",
        text: "Cette action est irréversible !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Oui, supprimer !",
        cancelButtonText: "Annuler"
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirection vers la suppression
            window.location.href = "/Traitement/Utilisateurs.php?action=supprimer&data=" + userId;
        }
    });
}
</script>
</body>

</html>