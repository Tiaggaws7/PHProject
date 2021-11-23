<?php

    $id = $_GET["id"];

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


    $line = 4;

    include 'bdd_xml_cd.php';
                
    $bdd = new SimpleXMLElement($xmlstr);
    $nb_cd = $bdd->count();


    for($i = 0; $i <= $nb_cd - 1; $i++ ){
        if ($bdd->CD[$i]->id == $id ){

            $titre = $bdd->CD[$i]->titre;
            $auteur = $bdd->CD[$i]->auteur;
            $genre = $bdd->CD[$i]->genre;
            $prix = $bdd->CD[$i]->prix;
            $image = $bdd->CD[$i]->image;

            finsert_ligne("bdd_xml_panier.php", "<CD>", $line); $line++;
            finsert_ligne("bdd_xml_panier.php", "<id>$id</id>", $line); $line++;
            finsert_ligne("bdd_xml_panier.php", "<titre>$titre</titre>", $line); $line++;
            finsert_ligne("bdd_xml_panier.php", "<auteur>$auteur</auteur> ", $line); $line++;
            finsert_ligne("bdd_xml_panier.php", "<genre>$genre</genre>", $line); $line++;
            finsert_ligne("bdd_xml_panier.php", "<prix>$prix</prix> ", $line); $line++;
            finsert_ligne("bdd_xml_panier.php", "<image>$image</image> ", $line); $line++;
            finsert_ligne("bdd_xml_panier.php", "</CD>", $line); $line++;

            file_put_contents("bdd_xml_panier.php", str_replace('$xmlstr = <<<XML ', '$xmlstr = <<<XML', file_get_contents("bdd_xml_panier.php")));
        }
    }
   header('Location: home.php');

?>