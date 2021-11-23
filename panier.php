<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles_panier.css" rel="stylesheet">
    <title>SuperCD panier</title>
</head>

<nav class="header_nav">
    <a href="index.php">Accueil</a>
    <p>SuperCD</p>
    <a href="panier.php"><img alt="logo panier" src="panier.png"/></a>
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
                <p class="article"><?=$bdd->CD[$i]->titre?> - <?=$bdd->CD[$i]->auteur?> - <?=$bdd->CD[$i]->prix?> €</p>
                    
        <?php
            $total += $bdd->CD[$i]->prix;
            }

        ?>
        <p class="total">Total à payer : <?=$total?> €</p>
        <a class="payer" href="paiement.php">Payer</a>
</body>
</html>
