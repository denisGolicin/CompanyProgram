<?php
    session_start();

    if (isset($_SESSION['auth'])) {

        if(empty($_SESSION['auth'])){

            header('Location: register.php');

        } else {

            header('Location: main.php');

        }


    } else {

        require_once('../page/auth.html');

    }

?>