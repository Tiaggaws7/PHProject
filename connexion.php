<?php 
    session_start(); // Démarrage de la session
    require_once 'config.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['login']) && !empty($_POST['password'])) // Si il existe les champs login, password et qu'il sont pas vident
    {
        // Patch XSS
        $login = htmlspecialchars($_POST['login']); 
        $password = htmlspecialchars($_POST['password']);
        
        $login = strtolower($login); // email transformé en minuscule

        $nb_login = $bdd->count();
        $identifant = "notOk";
        $motDePasse = "notOk";
        for($i = 0; $i <= $nb_login - 1; $i++ ){
            if($bdd->USER[$i]->login == $login){
                $identifant = "ok";
                if($bdd->USER[$i]->mdp == $password){
                    $motDePasse = "ok";
                }
            }
        }

        if($identifant == "ok"){ 
            if($motDePasse == "ok"){ 
                header('Location: home.php');
                die();
            }else{ header('Location: index.php?login_err=password'); die(); }
        }else{ header('Location: index.php?login_err=email'); die(); }
    }
?>