<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

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
                    <img class="pochette" src="<?=$bdd->CD[$i]->image?>"/>
                </div>
            </a>
    <?php    
        }
    ?>

</body>
</html>