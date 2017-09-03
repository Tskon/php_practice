<?php
include 'tools/config.php';
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die();
echo '<h1>Личный кабинет</h1>';
if(isset($_POST['login']) && isset($_POST['pass'])) {
	
	$login = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['login'])));
	$login = mb_strtolower($login);
	$password = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['pass'])));
	
	$sql = "SELECT `name`, `password`, `login` FROM `users` WHERE `login` = '$login'";
	$result = mysqli_query($link, $sql);
	if($result){
		$user = mysqli_fetch_assoc($result);
		
		if ($user['password'] == md5($password)){
			echo 'Добро пожаловать, '. $user['name'] . '!
			Вы зашли под логином ' . $user['login'];
			
		}else{
			echo 'Некорректный ввод данных';
		}
	}else{
		echo 'Некорректный ввод данных';
	}
}else{
	echo 'Некорректный ввод данных';
}