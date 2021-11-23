<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles_cd_suppr.css" rel="stylesheet">
    <title>SuperCD Supprimer</title>
</head>
<body>

    <h1>Veuillez choisir le cd à supprimer</h1>

    <div class="all_cd" >
    <?php 
        include 'bdd_xml_cd.php';
        
        $bdd = new SimpleXMLElement($xmlstr);
        $nb_cd = $bdd->count();


        for($i = 0; $i <= $nb_cd - 1; $i++ ){
        
    ?>
            <a href="supprimer_cd.php?id=<?=$bdd->CD[$i]->id?>">
                <div class="cd_box">
                    <div class="caracteristique" >
                        <p class="titre"><?=$bdd->CD[$i]->titre?></p>
                        <p class="auteur"><?=$bdd->CD[$i]->auteur?></p>
                        <p class="prix" ><?=$bdd->CD[$i]->prix?> €</p>
                    </div>
                    <img class="pochette" src="images/<?=$bdd->CD[$i]->imageReduite?>"/>
                </div>
            </a>
    <?php    
        }

    ?>
    </div>

    <a class="go_back" href="back-office.php">Retourner au back office</a>
</body>
</html>