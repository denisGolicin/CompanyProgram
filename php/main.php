<?php

session_start();

if (isset($_SESSION['auth'])) {

    if(empty($_SESSION['auth'])){

        header('Location: register.php');
		return true;
    }
	$login = $_SESSION['auth'];
	$db = new SQLite3('sqldata.db');
	$result = $db->query("SELECT * FROM users WHERE login = '$login'");
    $row = $result->fetchArray();
    $name = $row['name'];
    $surname = $row['surname'];
	$rang = $row['rang'];
	$phone = $row['phone'];
	$photo = "src='../assets/users/photo/" .$login .".jpg'"; 

	// $results = $db->query('SELECT * FROM users');

	// // цикл по результатам выборки
	// while ($row = $results->fetchArray()) {
	// 	// выводим данные о пользователе
	// 	echo $row['id'] . ' ' . $row['name'] . ' ' . $row['surname'] . '<br>';
	// }

	$db->close();

    
} else {

    header('Location: auth.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="../page/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../page/css/index.css">
	<link rel="stylesheet" type="text/css" href="../page/css/main.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная</title>
	<link rel="shortcut icon" href="https://itdilab.ru/themes/digitallab/assets/icons/favicon.ico">
</head>
	<body>

		<p>Авторизован: <?php echo $_SESSION['auth'] ?></p>
		<p>Зовут: <?php echo $name ." " .$surname ?></p>
		<img class = "photo" <?php echo $photo?> alt="">
		<p>Должность: <?php echo $rang ?></p>
		<p>Телефон: <?php echo $phone ?></p>

		<script type="text/javascript" src="../page/js/main.js"></script>
		
	</body>
</html>