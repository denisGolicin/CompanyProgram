<?php
//session_set_cookie_params(10);

session_start();

$_SESSION['auth'] = "test";

echo "Да";

?>