<?php
require_once 'BD/Utilisateur.php';
if (empty($_POST)&& empty($_GET)) {
    $users = getAllUsers();
    // $_SESSION['users'] = $users;
    // header('Location: ');
    include('IHM/utilisateur/index.php');
    exit();
}
else if(isset($_GET['action'])){
    $action=$_GET['action'];
    switch($action){
        case 'edit':
            $user=getUserById($_GET['data']);
            if($user){
                include('IHM/utilisateur/form_edit.php');
            }else{
                echo "Utilisateur non trouvé";
            }
            break;
        case 'delete':
            $user=deleteUserById($_GET['data']);
            if($user>0){
                $users = getAllUsers();
                include('IHM/utilisateur/index.php');
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
else if(isset($_POST['submit'])){
    
}