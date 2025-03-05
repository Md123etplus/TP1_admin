<?php
require_once 'Connexion.php';




function getAllUsers() {
    $bdd = connexion();
    $sql = "SELECT * FROM users";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//récupérer un utilisateur par son ID
function getUserById($id) {
    $bdd = connexion();
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne un seul utilisateur
}


function deleteUser($id) {
    $bdd = connexion();
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$id]); 
    return $stmt->rowCount(); 
}

function addUser( $nom, $prenom, $email, $age, $filiere, $annee){
    $bdd = connexion();
    $sql = "Insert into users  (nom , prenom , email ,age ,filiere, annee) values( :nom , :prenom ,:email ,:age ,:filiere ,:annee) ";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':filiere', $filiere);
    $stmt->bindParam(':annee', $annee);
    return $stmt->execute();
}

function updateUser($id, $nom, $prenom, $email, $age, $filiere, $annee) {
    $bdd = connexion();
    $sql = "UPDATE users 
            SET nom = :nom, prenom = :prenom, email = :email, 
                age = :age, filiere = :filiere, annee = :annee 
            WHERE id = :id";

    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':filiere', $filiere);
    $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);

    return $stmt->execute(); 
}


?>