<?php
    class uploadFile
    {
        function upload($tmp_name, $name)
        {
            move_uploaded_file($tmp_name, 'images/'.date("G-i-s").$name);
        }

        function suppr($name)
        {
            unlink('images/'.$name);
        }
    }
?>
