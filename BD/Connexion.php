<?php

function connexion(){
    $bdd=mysqli_connect("localhost","root","","cv_generator_db");
    if(!$bdd){
        echo "Erreur de connexion";
    }
    else{
        // echo "Connexion reussie";
        return $bdd;
    }
}
