<?php
//session_set_cookie_params(10);

session_start();
$data = $_POST['data'];

$db = new SQLite3('sqldata.db');
$result = $db->query("SELECT * FROM users WHERE key = '$data'");

$row = $result->fetchArray();
$key = $row['key'];
$login = $row['login'];

if($key == $data){

    if(empty($login)){

        $response = "register";
        $_SESSION['auth'] = "";
        $_SESSION['key'] = $key;

    } else {

        $response = "auth";
        $_SESSION['auth'] = $row['login'];

    }

} else {

    $response = "error";

}

$db->close();

echo $response;

?>