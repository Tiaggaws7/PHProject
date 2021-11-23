<?php
    $bdd = "bdd_xml_cd.php";

    function suppr_line($file, $line)
    {
        $ptr = fopen($file, "r");
        $contenu = fread($ptr, filesize($file));
            
        fclose($ptr);
        
        $contenu = explode(PHP_EOL, $contenu); 

        unset($contenu[$line]); 
        $contenu = array_values($contenu); 
            
        $contenu = implode(PHP_EOL, $contenu);
        $ptr = fopen($file, "w");
        fwrite($ptr, $contenu);
        fclose($ptr);

    }

    function suppr_CD($file, $idCD)
    {
        // Récupérer le nom des images
        include $file;
        
        $bdd = new SimpleXMLElement($xmlstr);
        $nb_cd = $bdd->count();

        for($i = 0; $i <= $nb_cd - 1; $i++ ){
            if($idCD == $bdd->CD[$i]->id){
                $numCD = $i;
                $nameImage = $bdd->CD[$i]->image;
                $nameImageReduite = $bdd->CD[$i]->imageReduite;
            }    
        }

        // Calculer le numéro de la première ligne a supprimer -1
        $line = 4 + 8 * $numCD;
        // Supprime un CD dans la base de données
        for ($i=0; $i < 9; $i++) {
            suppr_line($file, $line);
        }

        // Supprime les images corrspondantes
        require 'uploadFile.php';
        $upload = new uploadFile();
        if($nameImage != "icon_image.png"){
            $upload->suppr($nameImage);
        }
        if($nameImageReduite != "icon_image.png"){
            $upload->suppr($nameImageReduite);
        }
    }

    suppr_CD($bdd,'619cb14b99944');

    // Suppression de l'image
    
?>
