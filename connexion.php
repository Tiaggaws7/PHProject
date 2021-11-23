<?php 
    // Démarrage de la session
    session_start(); 
    // On inclut la connexion à la base de données grace au fichier config.php
    require_once 'config.php'; 

    // Si les champs login et password ne sont pas vident
    if(!empty($_POST['login']) && !empty($_POST['password'])) 
    {
        // Encodage
        $login = htmlspecialchars($_POST['login']); 
        $password = htmlspecialchars($_POST['password']);
        
        // Identifiant transformé en minuscule
        $login = strtolower($login); 

        // Initialisation des variables
        $nb_login = $bdd->count();
        $identifant = "notOk";
        $motDePasse = "notOk";

        //Vérification de l'identifiant et du mot de passe
        for($i = 0; $i <= $nb_login - 1; $i++ ){
            if($bdd->USER[$i]->login == $login){
                $identifant = "ok";
                if($bdd->USER[$i]->mdp == $password){
                    $motDePasse = "ok";
                }
            }
            if(($bdd->USER[$i]->login == $login) && ($login == "root")){
                $identifant = "root";
                if(($bdd->USER[$i]->mdp == $password) && ($password == "root")){
                    $motDePasse = "root";
                }
            }
        }

        // Action en fonction de la validité de l'identifiant et du mot de passe
        if($identifant == "ok"){ 
            if($motDePasse == "ok"){ 
                header('Location: home.php');
                die();
            }
            else{ 
                header('Location: index.php?login_err=password'); 
                die(); 
            }
        }
        elseif($identifant == "root"){
            if($motDePasse == "root"){ 
                header('Location: back-office.php');
                die();
            }
            else{ 
                header('Location: index.php?login_err=password'); 
                die(); 
            }
        }
        else{ 
            header('Location: index.php?login_err=email'); 
            die(); 
        }
    }
?>
