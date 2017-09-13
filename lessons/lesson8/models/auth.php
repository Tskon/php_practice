<?php
if (@isset($_POST['login']) && isset($_POST['pass'])) {
	
	$login = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['login'])));
	$login = mb_strtolower($login);
	$password = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['pass'])));
	
	$sql = "SELECT * FROM `users` WHERE `login` = '$login'";
	$result = mysqli_query($link, $sql);
	if ($result) {
		$user = mysqli_fetch_assoc($result);
		
		if ($user['password'] == md5($password)) {
			//			echo 'Добро пожаловать, ' . $user['name'] . '!
			//			Вы зашли под логином ' . $user['login'];
			
			$cook_val = array('userName' => $user['name'], 'userLogin' => $user['login'], 'userPass' => $user['password']);
			setcookie('authUser', serialize($cook_val));
		}
	}
}
if(@isset($_COOKIE['authUser'])){

//	$login = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_COOKIE['userLogin'])));
//	$password = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_COOKIE['userPass'])));
//	if($login > 0) {
		$authUser = unserialize($_COOKIE['authUser']);
		print_r( $authUser);
//		echo 'hi, ' . $authUser['userName'];
//	}
}
