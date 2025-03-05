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
            $errors="";
            if($user){
                $isDeleted=true;
                $users = getAllUsers();
                include(ROOT.'IHM\utilisateur\index.php');
                // include('..\IHM\utilisateur\index.php');
            }else{
                $errors="Erreur de suppression ou l'utilisateur a deja ete supprimer";
                $users = getAllUsers();
                include(ROOT.'IHM\utilisateur\index.php');
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
    $errors = "";
    try{
        if(existAlready($nom,$prenom,$email,$apropos,$age,$tel)){
            $users = getAllUsers();
            $errors = "Un utilisateur avec le meme email existe deja!";
            include(ROOT.'IHM\utilisateur\index.php');
        }else{
            $user=addUser($nom,$prenom,$email,$apropos,$age,$tel);
            if($user){
                $users = getAllUsers();
                include(ROOT.'IHM\utilisateur\index.php');
                // include('..\IHM\utilisateur\index.php');
            }else{
                $users = getAllUsers();
                $errors = "Erreur d'ajout";
                include(ROOT.'IHM\utilisateur\index.php');
                // include('..\IHM\utilisateur\index.php');
            }
        }
        
    }catch(Exception $e){
        $users = getAllUsers();
        $errors = "Erreur: " . $e->getMessage();
        include(ROOT.'IHM\utilisateur\index.php');
        // include('..\IHM\utilisateur\index.php');
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
    $errors="";
    $user=updateUser($id,$nom,$prenom,$email,$apropos,$age,$tel);
    if($user>=0){
        $users = getAllUsers();
        include(ROOT.'IHM\utilisateur\index.php');
        // include('..\IHM\utilisateur\index.php');
    }else{
        $errors= "Erreur de modification";
        $users = getAllUsers();
        include(ROOT.'IHM\utilisateur\index.php');
    }
}
else{
    echo "Action non reconnue";
}