<?php

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

    include 'copie_bdd_xml_cd.php';
        
    $bdd = new SimpleXMLElement($xmlstr);
    $nb_cd = $bdd->count();
    $newId = $nb_cd + 1;
    $line = 4;

    finsert_ligne("copie_bdd_xml_cd.php", "<CD>", $line); $line++;
    finsert_ligne("copie_bdd_xml_cd.php", "<id>$newId</id>", $line); $line++;
    finsert_ligne("copie_bdd_xml_cd.php", "<titre></titre>", $line); $line++;
    finsert_ligne("copie_bdd_xml_cd.php", "<auteur></auteur> ", $line); $line++;
    finsert_ligne("copie_bdd_xml_cd.php", "<genre></genre>", $line); $line++;
    finsert_ligne("copie_bdd_xml_cd.php", "<prix></prix> ", $line); $line++;
    finsert_ligne("copie_bdd_xml_cd.php", "<image></image> ", $line); $line++;
    finsert_ligne("copie_bdd_xml_cd.php", "</CD>", $line); $line++;

    
?>