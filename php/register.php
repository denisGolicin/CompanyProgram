<?php

session_start();

if(isset($_SESSION['auth'])){

    if(!empty($_SESSION['auth'])){

        header('Location: main.php');
        return 1;
    }

    //
    $db = new SQLite3('sqldata.db');
    $key = $_SESSION['key'];
    $result = $db->query("SELECT * FROM users WHERE key = '$key'");
    $row = $result->fetchArray();
    $name = $row['name'];
    $surname = $row['surname'];



} else {

    header('Location: auth.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="../page/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../page/css/index.css">
    <link rel="stylesheet" type="text/css" href="../page/css/register.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
	<link rel="shortcut icon" href="https://itdilab.ru/themes/digitallab/assets/icons/favicon.ico">
</head>
	<body>

        <div class = "form-wrapper">
            <img src="../assets/pages/logo.png" alt="">

            <div class = "window-input">
                <p><b><?php echo $name ." " .$surname?>, заполните данные!</b></p>
                
                <label for="">Введите индивидуальный логин:</label>
                <input class = "input-text" type="text">
                <label for="">Загрузите фотографию:</label>

                <img id="blah" />
                <label class="input-file">
                    <input type="file" name="file" id = "file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">		
                    <span>Выберите файл</span>
 	            </label>
                

            </div>

            <button class = "button">Finish</button>
        </div>

		<script type="text/javascript" src="../page/js/register.js"></script>
		
	</body>
</html>