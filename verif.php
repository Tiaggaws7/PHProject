<?php

    $num_card = $_POST['num_card'];

    if ($num_card[0] !==  substr($num_card, -1)){
        header('Location: paiement.php?error=card');
    }
    else{
        header('Location: validation.php');
    }

?>