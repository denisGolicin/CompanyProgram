<?php
    session_start();

    if (isset($_SESSION['auth'])) {

        header('Location: main.php');

    } else {

        require_once('../page/auth.html');

    }

?>