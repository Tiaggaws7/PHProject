<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles_panier.css" rel="stylesheet">
    <title>SuperCD panier</title>
</head>
<body>
    <h1>Votre panier</h1>

    <?php 
    
    include 'bdd_xml_panier.php';
        
        $bdd = new SimpleXMLElement($xmlstr);
        $nb_cd = $bdd->count();

        for($i = 0; $i <= $nb_cd - 1; $i++ ){
    ?>
            <p class="titre"><?=$bdd->CD[$i]->titre?></p>
                
    <?php
        }
    ?>
    <a href="paiement.php">Payer</a>
</body>
</html>