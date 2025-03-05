<?php
require_once 'Connexion.php';
function getAllUsers(){
    $bdd = connexion();
    $sql="SELECT * FROM users";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    // return $users;
}
function getUserById($id){
    $bdd=connexion();
    $sql="SELECT * FROM users WHERE id=?";
    $stmt=$bdd->prepare($sql);
    $stmt->execute([$id]);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    
    // return $user;
}
function deleteUserById($id){
    $bdd=connexion();
    $sql="DELETE FROM users WHERE id=?";
    $stmt=$bdd->prepare($sql);
    $stmt->execute([$id]); 
    return $stmt->rowCount();
    // $stmt=mysqli_prepare($bdd,$sql);
    // mysqli_stmt_bind_param($stmt,'i',$id);
    // mysqli_stmt_execute($stmt);
    // return mysqli_stmt_affected_rows($stmt);

}
// $user=addUser($nom,prenom: prenom: $prenom,$email,$apropos,$age,$tel);

function addUser($nom,$prenom,$email,$apropos,$age,$tel){
    $bdd=connexion();
    $sql="INSERT INTO users(nom,prenom,email,apropos,age,tel) VALUES(?,?,?,?,?,?)";
    $stmt=$bdd->prepare($sql);
    $stmt->execute([$nom,$prenom,$email,$apropos,$age,$tel]);
    return $stmt->rowCount();
    // $stmt=mysqli_prepare($bdd,$sql);
    // mysqli_stmt_bind_param($stmt,'ssssii',$nom,$prenom,$email,$apropos,$age,$tel);
    // mysqli_stmt_execute($stmt);
    // return mysqli_stmt_affected_rows($stmt);
}
function updateUser($id,$nom,$prenom,$email,$apropos,$age,$tel){
    $bdd=connexion();
    $sql="UPDATE users SET nom=?,prenom=?,email=?,apropos=?,age=?,tel=? WHERE id=?";
    $stmt=$bdd->prepare($sql);
    $stmt->execute([$nom,$prenom,$email,$apropos,$age,$tel,$id]);
    return $stmt->rowCount();
    // $stmt=mysqli_prepare($bdd,$sql);
    // mysqli_stmt_bind_param($stmt,'ssssiii',$nom,$prenom,$email,$apropos,$age,$tel,$id);
    // mysqli_stmt_execute($stmt);
    // return mysqli_stmt_affected_rows($stmt);
}
function existAlready($nom, $prenom, $email, $apropos, $age, $tel) {
    $bdd = connexion(); // Connect to the database

    // Check if a user with the same email already exists
    $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$email]);
    
    if ($stmt->fetchColumn() > 0) {
        return true; // User already exists
    }

    return false; // User does not exist
}



?>