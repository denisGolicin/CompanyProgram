<?php

session_start();

if (isset($_SESSION['auth'])) {

    require_once('../page/main.html');
    
} else {

    header('Location: auth.php');

}

?>