<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles_detail.css" rel="stylesheet">
    <title>SuperCD article</title>
</head> 

<nav class="header_nav">
    <a href="index.php">Accueil</a>
    <p>SuperCD</p>
    <a href="panier.php"><img alt="logo panier" src="panier.png"/></a>
</nav>

<body>

    <?php
        $id = $_GET["id"]
    ?>

    <?php 

        include 'bdd_xml_cd.php';
                
        $bdd = new SimpleXMLElement($xmlstr);
        $nb_cd = $bdd->count();


        for($i = 0; $i <= $nb_cd - 1; $i++ ){
            if ($bdd->CD[$i]->id == $id ){
    ?>
                <div class="cd_box">
                    <div class="caracteristique" >
                        <p class="titre">Titre : <strong><?=$bdd->CD[$i]->titre?></strong></p> 
                        <p class="auteur">Auteur : <strong><?=$bdd->CD[$i]->auteur?></strong></p>
                        <p class="genre" >Genre :<strong> <?=$bdd->CD[$i]->genre?></strong></p>
                        <p class="prix" >Prix :<strong> <?=$bdd->CD[$i]->prix?> €</strong></p>
                    </div>
                    <img class="pochette" src="<?=$bdd->CD[$i]->image?>"/>
                </div>
    
    <?php
            }
        }
    
    ?>
    <form action="ajouter_panier.php?id=<?=$id?>" method="post">
        <button value="submit" class="ajouter_panier" >Ajouter au panier</button>
    </form>

</body>
</html>
