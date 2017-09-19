<?php
if (@isset($_POST['login']) && isset($_POST['pass']) && @!isset($_POST['pass2'])) {
	$login = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['login'])));
	$login = mb_strtolower($login);
	$password = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['pass'])));
	
	$sql = "SELECT * FROM `users` WHERE `login` = '$login'";
	$result = mysqli_query($link, $sql);
	if ($result) {
		$user = mysqli_fetch_assoc($result);
		if ($user['password'] == md5($password)) {
			$cook_val = array('userID' => $user['id'], 'userName' => $user['name'], 'userLogin' => $user['login'], 'userPass' => $user['password'], 'root' => $user['root']);
			setcookie('authUser', serialize($cook_val), time() + 3600, '/');
			$isAuth = true;
			$authUser = $cook_val;
		}
	}
}
if (@isset($_COOKIE['authUser']) && @$_POST['type'] <> 'logOut') {
	$authUser = unserialize($_COOKIE['authUser']);
	$login = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($authUser['userLogin'])));
	$password = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($authUser['userPass'])));
	$sql = "SELECT `password` FROM `users` WHERE `login` = '$login'";
	$result = mysqli_query($link, $sql);
	if ($result) {
		$dbuser = mysqli_fetch_assoc($result);
		if ($dbuser['password'] == $password) {
			$isAuth = true;
		}
	}
}
if (@$_POST['type'] == 'logOut' && @isset($_COOKIE['authUser'])) {
	setcookie('authUser', '', time() - 100, '/');
	$isAuth = false;
}
if (@isset($_POST['pass2']) && @isset($_POST['name'])) {
	$name = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['name'])));
	$login = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['login'])));
	$login = mb_strtolower($login);
	$password = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['pass'])));
	$password2 = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['pass2'])));
	
	$sql = "SELECT `login` FROM `users` WHERE `login` = '{$login}'";
	$result = @mysqli_fetch_assoc(mysqli_query($link, $sql));
	if (count($result) > 0) {
		echo '<h3 style="color: darkred">Логин '. $login .' занят!</h3>';
	} else {
		if (@isset($_POST['root'])) {
			$root = $_POST['root'];
		} else {
			$root = 0;
		}
		if ($password == $password2) {
			$password = md5($password);
			$sql = "INSERT INTO `users`(`name`, `login`, `password`, `root`) VALUES ('$name','$login','$password', $root)";
			mysqli_query($link, $sql);
			$str = '<h3 style="color: green">Вы успешно зарегистрированы, ' . $_POST['name'];
			
			$cook_val = array('userName' => $_POST['name'], 'userLogin' => $_POST['login'], 'userPass' => $_POST['pass'], 'root' => $root);
			setcookie('authUser', serialize($cook_val), time() + 3600, '/');
			$isAuth = true;
			$authUser = $cook_val;
		} else {
			echo '<h3 style="color: darkred">Пароли не совпадают!</h3>';
		}
	}
}