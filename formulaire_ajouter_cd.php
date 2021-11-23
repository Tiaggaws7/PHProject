<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire Ajouter CD</title>
</head>
<body>
        <fieldset>
                <legend>Ajouter un CD dans la base de données</legend>
                <form action="ajouter_cd.php" method="post" enctype="multipart/form-data">
                <p>Titre : <input type="text" name="titre" /></p>
                <p>Auteur : <input type="text" name="auteur" /></p>
                <p>Genre : <input type="text" name="genre" /></p>
                <p>Prix : <input type="text" name="prix" /></p>
                <p>Image : <input type="file" name="image" /></p>
                <p>Image Réduite : <input type="file" name="imageReduite" /></p>
                
                <p><input type="submit" value="Enregistrer" name="Enregistrer"></p>
                </form>
        </fieldset>
</body>
</html> 
