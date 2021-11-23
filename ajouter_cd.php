<?php
    // Base de données
    include 'bdd_xml_cd.php';
    $bdd = 'bdd_xml_cd.php';

    // Fonction premettant d'inserer du texte a une ligne donnée
    function finsert_ligne($fichier , $texte , $i){

        // on lit le fichier dans un tableau.
            $contenu_fichier = file($fichier);
        // on ajoute le texte a la fin de la $i-ieme ligne.
            $contenu_fichier[$i]=trim($texte)."\n".trim($contenu_fichier[$i])." \n";
        // on va ecrire le nouveau contenu dans le fichier
            $fp = fopen ($fichier, "w+");
        //on re-insere toutes les lignes du tableau dans le fichier
            for ($k=0;$k<sizeof($contenu_fichier);$k++) {
                fwrite($fp, (trim($contenu_fichier[$k])." \n"));
            };
            fclose ($fp);
            return true;
    }

    function insert_CD($bdd, $titreCD, $auteurCD, $genreCD, $prixCD, $imageCD, $imageReduiteCD)
    {
        // Ligne de l'entrer dans la base de données d'un CD -1
        $line = 4;
        
        // Génération d'un identifiant unique
        $newId = uniqid();

        // Insertion des valeurs du CD dans la base de données
        finsert_ligne($bdd, "<CD>", $line); $line++;
        finsert_ligne($bdd, "<id>$newId</id>", $line); $line++;
        finsert_ligne($bdd, "<titre>$titreCD</titre>", $line); $line++;
        finsert_ligne($bdd, "<auteur>$auteurCD</auteur> ", $line); $line++;
        finsert_ligne($bdd, "<genre>$genreCD</genre>", $line); $line++;
        finsert_ligne($bdd, "<prix>$prixCD</prix> ", $line); $line++;
        finsert_ligne($bdd, "<image>$imageCD</image> ", $line); $line++;
        finsert_ligne($bdd, "<imageReduite>$imageReduiteCD</imageReduite> ", $line); $line++;
        finsert_ligne($bdd, "</CD>", $line);
            
    }

    // Upload de l'image
    require 'uploadFile.php';
    $upload = new uploadFile();
    if(isset($_POST['Enregistrer']) && !empty($_POST['Enregistrer']))
    {
            $tmp_name=$_FILES['image']['tmp_name'];
            $name=$_FILES['image']['name'];
            $upload->upload($tmp_name, $name);
    }
    if(isset($_POST['Enregistrer']) && !empty($_POST['Enregistrer']))
    {
            $tmp_name_reduite=$_FILES['imageReduite']['tmp_name'];
            $name_reduite=$_FILES['imageReduite']['name'];
            $upload->upload($tmp_name_reduite, $name_reduite);
    }

    // Récupération des valeurs à rentrer dans la base de données venant du formulaire
    $titreCD = $_POST['titre'];
    $auteurCD = $_POST['auteur'];
    $genreCD = $_POST['genre'];
    $prixCD = $_POST['prix'];
    if(!empty ($name)){
        $imageCD = date("G-i-s").$name;
    }else { $imageCD = "icon_image.png"; }
    if(!empty ($name_reduite)){
        $imageReduiteCD = date("G-i-s").$name_reduite;
    }else { $imageReduiteCD = "icon_image.png"; }
    

    // Insertion des valeurs du CD dans la base de données
    insert_CD($bdd, $titreCD, $auteurCD, $genreCD, $prixCD, $imageCD, $imageReduiteCD);

    // On remplace la ligne : $xmlstr = <<<XML , car un espace se génère et cela entraine un disfonctionnement de la base de donées
    file_put_contents($bdd, str_replace('$xmlstr = <<<XML ', '$xmlstr = <<<XML', file_get_contents($bdd)));
?>

<a href="back-office.php">retourner au back office</a>

    
