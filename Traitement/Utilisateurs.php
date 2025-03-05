<?php
define('ROOT',str_replace('Traitement\Utilisateurs.php','',$_SERVER['SCRIPT_FILENAME']));
require_once ROOT.'BD\Utilisateur.php';
// print_r(ROOT);
if (empty($_POST)&& empty($_GET)) {
    $users = getAllUsers();
    // $_SESSION['users'] = $users;
    // header('Location: ');
    // include('..\IHM\utilisateur\index.php');
    include(ROOT.'IHM\utilisateur\index.php');
    exit();
}
else if(isset($_GET['action'])){
    $action=$_GET['action'];
    switch($action){
        case 'modifier':
            $user=getUserById($_GET['data']);
            if($user){
                // include('..\IHM\utilisateur\form_edit.php');
                include(ROOT.'IHM\utilisateur\form_edit.php');
            }else{
                echo "Utilisateur non trouvé";
            }
            break;
        case 'supprimer':
            $user=deleteUserById($_GET['data']);
            $isDeleted=false;
            if($user){
                $isDeleted=true;
                $users = getAllUsers();
                include(ROOT.'IHM\utilisateur\index.php');
                // include('..\IHM\utilisateur\index.php');
            }else{
                echo "Erreur de suppression";
            }
            break;
        // case 'add':
            
        //     require_once 'IHM/utilisateur/form_add.php';
        //     break;
        default:
            echo "Action non reconnue";
    }
}
else if(isset($_POST['submit_add'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $apropos=$_POST['apropos'];
    $age=$_POST['age'];
    $tel=$_POST['tel'];
    $user=addUser($nom,$prenom,$email,$apropos,$age,$tel);
    if($user){
        $users = getAllUsers();
        include(ROOT.'IHM\utilisateur\index.php');
        // include('..\IHM\utilisateur\index.php');
    }else{
        echo "Erreur d'ajout";
    }
}
else if(isset($_POST['submit_edit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $apropos=$_POST['apropos'];
    $age=$_POST['age'];
    $tel=$_POST['tel'];
    $id=$_POST['id'];
    $user=updateUser($id,$nom,$prenom,$email,$apropos,$age,$tel);
    if($user>0){
        $users = getAllUsers();
        include(ROOT.'IHM\utilisateur\index.php');
        // include('..\IHM\utilisateur\index.php');
    }else{
        echo "Erreur de modification";
    }
}
else{
    echo "Action non reconnue";
}