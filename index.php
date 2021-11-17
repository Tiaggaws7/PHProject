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

    <p>voici un paragraphe</p>

    <div class="list_cd">
        <div class="cd_box">
            <div class="caracteristique" >        
                <p class="titre">Jeannine</p>
                <p class="auteur">Lomepal</p>
                <p class="prix" >19,99€</p>
            </div>
            <img class="pochette" src="Lomepal.jpg"/>
            </div>

            <div class="cd_box">
            <div class="caracteristique" >        
                <p class="titre">Jeannine</p>
                <p class="auteur">Lomepal</p>
                <p class="prix" >19,99€</p>
            </div>
            <img class="pochette" src="Lomepal.jpg"/>
        </div>
    </div>

    <?php 
        include 'bdd_xml_cd.php';
        
        $bdd = new SimpleXMLElement($xmlstr);
        $nb_cd = $bdd->count();


        for($i = 0; $i <= $nb_cd - 1; $i++ ){
            echo '<div class="cd_box">';
            echo '<div class="caracteristique" >';
            echo '<p class="titre">'.$bdd->CD[1]->titre.'</p>';
            echo  '<p class="auteur">'.$bdd->CD[1]->auteur.'</p>';
            echo '<p class="prix" >'.$bdd->CD[1]->prix.'</p>';
            echo '</div>';
            echo '<img class="pochette" src="Lomepal.jpg"/>';
            echo '</div>';
        }
    ?>


</body>
</html>
