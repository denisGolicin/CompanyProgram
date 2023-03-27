<?php
    session_start();

    if (isset($_SESSION['auth'])) {

        header('Location: php/main.php');
    
    } else {

        header('Location: php/auth.php');
        
    }


?>