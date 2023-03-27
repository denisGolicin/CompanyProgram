<?php

session_start();

if (isset($_SESSION['auth'])) {

    if(empty($_SESSION['auth'])){

        header('Location: register.php');

    }

    
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

		<script type="text/javascript" src="../pages/js/main.js"></script>
		
	</body>
</html>