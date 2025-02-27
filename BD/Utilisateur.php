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

?>