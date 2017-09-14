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
			$cook_val = array('userName' => $user['name'], 'userLogin' => $user['login'], 'userPass' => $user['password']);
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
	setcookie('authUser', '', time() - 100, '/	');
	$isAuth = false;
}