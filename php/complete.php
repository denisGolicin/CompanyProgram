<?php 

session_start();

$login = $_POST["login"];
$phone = $_POST["phone"];
$file = $_FILES["file"];

$db = new SQLite3('sqldata.db');

$result = $db->query("SELECT * FROM users WHERE login='$login'");
if ($result->fetchArray(SQLITE3_ASSOC)) {

    echo "user";

} else {
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $uploadDir = "../assets/users/photo/";
    $uploadFile = $uploadDir . $login . "." . $extension;
    
    move_uploaded_file($file["tmp_name"], $uploadFile);
    
    echo "Name: " . $login . "<br>";
    echo "File: " . $file["name"] . " (" . $file["type"] . ", " . $file["size"] . " bytes)";

    $key = $_SESSION["key"];

    $query = "UPDATE users SET login = '$login' WHERE key = '$key'";
    $result = $db->exec($query);

    $query = "UPDATE users SET phone = '$phone' WHERE key = '$key'";
    $result = $db->exec($query);

    $_SESSION['auth'] = $login;

    if ($result) echo "complete";
    else echo "login";
}

$db->close();


// if(isset($_POST['file'])){
//     $target_dir = "../assets/users/photo/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);
//     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//     echo "Файл загружен успешно!";
// }
// else {
//     echo "Не загружен!";
// }
// if(isset($_POST['file'])){
//     $target_dir = "../assets/users/photo/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);
//     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//     echo "Файл загружен успешно!";
// }
// else {
//     echo "Не загружен!";
// }
// if(isset($_POST['file'])){
//     $target_dir = "../assets/users/photo/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);
//     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//     echo "Файл загружен успешно!";
// }
// else {
//     echo "Не загружен!";
// }
// if(isset($_POST['file'])){
//     $target_dir = "../assets/users/photo/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);
//     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//     echo "Файл загружен успешно!";
// }
// else {
//     echo "Не загружен!";
// }
// if(isset($_POST['file'])){
//     $target_dir = "../assets/users/photo/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);
//     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//     echo "Файл загружен успешно!";
// }
// else {
//     echo "Не загружен!";
// }
// if(isset($_POST['file'])){
//     $target_dir = "../assets/users/photo/";
//     $target_file = $target_dir . basename($_FILES["file"]["name"]);
//     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
//     echo "Файл загружен успешно!";
// }
// else {
//     echo "Не загружен!";
// }

?>