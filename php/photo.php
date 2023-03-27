<?php 

session_start();

$login = $_POST["login"];
$file = $_FILES["file"];

$db = new SQLite3('sqldata.db');

$result = $db->query("SELECT * FROM users WHERE login='$login'");
if ($result->fetchArray(SQLITE3_ASSOC)) {

    echo "Пользователь уже есть!";

} else {
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $uploadDir = "../assets/users/photo/";
    $uploadFile = $uploadDir . $login . "." . $extension;
    
    move_uploaded_file($file["tmp_name"], $uploadFile);
    
    echo "Name: " . $login . "<br>";
    echo "File: " . $file["name"] . " (" . $file["type"] . ", " . $file["size"] . " bytes)";

    $key = $_SESSION["key"];

    $query = "UPDATE users SET login = '$login' WHERE key = '$key'";

// Выполнение запроса
    $result = $db->exec($query);

    if ($result) {
        echo "Email успешно обновлен";
    } else {
        echo "Ошибка при обновлении Email";
    }
}

// Закрытие соединения с базой данных
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