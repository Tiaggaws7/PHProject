<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles_add_form.css">
        <title>Formulaire Ajouter CD</title>
</head>
<body>
        <fieldset>
                <legend>Ajouter un CD dans la base de données</legend>
                <form action="ajouter_cd.php" method="post" enctype="multipart/form-data">
                <label>Titre : </label>  
                <input type="text" name="titre" required/>

                <label>Auteur :</label> 
                <input type="text" name="auteur" required />

                <label>Genre : </label> 
                <input type="text" name="genre" required/>

                <label>Prix :  </label> 
                <input type="text" name="prix" required/>

                <label>Image : </label> 
                <input class="file" type="file" name="image" />

                <label>Image Réduite : </label>
                <input class="file" type="file" name="imageReduite" />
                
                <input class="enregistrer" type="submit" value="Enregistrer" name="Enregistrer">
                </form>
        </fieldset>
</body>
</html> 
