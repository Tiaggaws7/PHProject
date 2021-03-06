<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles_du_panier.css" rel="stylesheet">
    <title>SuperCD panier</title>
</head>

<nav class="header_nav">
    <a href="home.php">Accueil</a>
    <a href="deconnexion.php">Se déconnecter</a>
    <p>SuperCD</p>
    <a href="panier.php"><img alt="logo panier" src="images/panier.png"/></a>
</nav>

<body>
        <h1>Votre panier</h1>
        <?php 
        
        include 'bdd_xml_panier.php';
            
            $bdd = new SimpleXMLElement($xmlstr);
            $nb_cd = $bdd->count();

            $total = 0;

            for($i = 0; $i <= $nb_cd - 1; $i++ ){
        ?>
                <p class="article"><?=$bdd->CD[$i]->titre?> de <?=$bdd->CD[$i]->auteur?> : <?=$bdd->CD[$i]->prix?> €</p><p class="payer"><a  href="supprimer_cd_panier.php?id=<?=$bdd->CD[$i]->id?>"> Supprimer</a></p> 
                    
        <?php
            $total += $bdd->CD[$i]->prix;
            }

        ?>
        <p class="total">Total à payer : <?=$total?> €</p>
        <p class="payer"><a  href="paiement.php">Payer</a></p>
</body>
</html>