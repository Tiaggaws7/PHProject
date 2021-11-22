<?php

    function supprLine($file, $line)
    {
        $ptr = fopen($file, "r");
        $contenu = fread($ptr, filesize($file));
            
        /* On a plus besoin du pointeur */
        fclose($ptr);
        
        $contenu = explode(PHP_EOL, $contenu); /* PHP_EOL contient le saut à la ligne utilisé sur le serveur (\n linux, \r\n windows ou \r Macintosh */
            
        unset($contenu[$line]); /* On supprime la ligne 52 par exemple */
        $contenu = array_values($contenu); /* Ré-indexe l'array */
            
        /* Puis on reconstruit le tout et on l'écrit */
        $contenu = implode(PHP_EOL, $contenu);
        $ptr = fopen($file, "w");
        fwrite($ptr, $contenu);
        fclose($ptr);

    }

    function supprCD($file, $lineId)
    {
        $line = $lineId - 2;
        for ($i=0; $i < 8; $i++) {
            supprLine($file,$line);
        }
        
    }

    $bdd = 'bdd_xml_cd.php';
    supprCD($bdd,'6');

    // Suppression de l'image
    /*require 'uploadFile.php';
    $upload = new uploadFile();
    $upload->suppr($name)*/
?>