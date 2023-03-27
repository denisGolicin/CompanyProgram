<?php

    session_start();

    if(isset($_SESSION['auth'])){
        if(empty($_SESSION['auth'])){

            header('Location: php/register.php');

        } else {

            header('Location: php/main.php');

        }
    } else {

        header('Location: php/auth.php');

    }


?>