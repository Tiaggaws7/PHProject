<?php 
    include 'bdd_xml_login.php';
    try 
    {
        $bdd = new SimpleXMLElement($xmllogin);
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>