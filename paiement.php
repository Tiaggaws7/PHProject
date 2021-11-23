<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<nav class="header_nav">
    <a href="home.php">Accueil</a>
    <p>SuperCD</p>
    <a href="panier.php"><img alt="logo panier" src="panier.png"/></a>
</nav>

<body>

    <?php
        if(isset($_GET['error'])){
            $error = $_GET["error"];
        }
        else {
            $error="";
        }
        if ($error == "card"){
            $error = "Les chiffres du début et de fin de sont pas égaux";
        }

        $trois_mois = time() + (12 * 7 * 24 * 60 * 60);
        $date_trois_mois = date("Y-m",$trois_mois);
    ?>

    <p><?=$error?></p>
    <form action="verif.php" method="post">
        <p>Veuillez saisir votre numéro de carte bleue :</p>
        <input name="num_card" placeholder="numéro de carte bleue " 
        pattern="[0-9]{16}" required>
        <p>Date de validité :</p>
        <input name="mois" class="mois" type="month" min="<?=$date_trois_mois?>" required>
        <p>Cryptogramme :</p>
        <input name="crypto" placeholder="ex: 123" pattern="[0-9]{3}" required>
        <button type="submit" >Valider</button>
    </form>
</body>
</html>