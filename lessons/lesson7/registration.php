<!--разделить логику-->
<?php
include 'tools/config.php';
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die();

if (isset($_POST['login'])) {
	
	$name = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['name'])));
	$login = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['login'])));
	$login = mb_strtolower($login);
	$password = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['pass'])));
	$password2 = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['pass2'])));
	
	if ($password == $password2) {
		$password = md5($password);
  
		$sql = "INSERT INTO `users`(`name`, `login`, `password`) VALUES ('$name','$login','$password')";
		mysqli_query($link, $sql);
			echo '<h3 style="color: green">Вы успешно зарегистрированы!</h3>';
	} else {
		echo '<h3 style="color: red">Пароли не совпадают!</h3>';
	}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<h1>Регистрация</h1>
<form action="" method="post" style="width: 160px;">
    <label for="name">Имя</label>
    <input type="text" name="name" id="name" placeholder="name" required>
    <label for="login">Логин</label>
    <input type="text" name="login" id="login" placeholder="login" required>
    <label for="pass">Пароль</label>
    <input type="password" name="pass" id="pass" placeholder="password" required>
    <label for="pass2">Подтверждение пароля</label>
    <input type="password" name="pass2" id="pass2" placeholder="confirm password" required>
    <button>Зарегистрироваться</button>
</form>

</body>
</html>
