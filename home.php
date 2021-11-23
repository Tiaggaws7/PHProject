<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles_index.css" rel="stylesheet">
    <title>SuperCD</title>
</head>

<nav class="header_nav">
    <a href="home.php">Accueil</a>
    <p>SuperCD</p>
    <a href="panier.php"><img alt="logo panier" src="panier.png"/></a>
</nav>
<body>


    <div class="all_cd" >
    <?php 
        include 'bdd_xml_cd.php';
        
        $bdd = new SimpleXMLElement($xmlstr);
        $nb_cd = $bdd->count();


        for($i = 0; $i <= $nb_cd - 1; $i++ ){
        
    ?>
            <a href="detail.php?id=<?=$bdd->CD[$i]->id?>">
                <div class="cd_box">
                    <div class="caracteristique" >
                        <p class="titre"><?=$bdd->CD[$i]->titre?></p>
                        <p class="auteur"><?=$bdd->CD[$i]->auteur?></p>
                        <p class="prix" ><?=$bdd->CD[$i]->prix?>€</p>
                    </div>
                    <img class="pochette" src="<?=$bdd->CD[$i]->image_reduite?>"/>
                </div>
            </a>
    <?php    
        }

    ?>
    </div>

    <p class="voir_panier"><a  href="panier.php">Voir mon panier</a></p>

</body>
</html>
