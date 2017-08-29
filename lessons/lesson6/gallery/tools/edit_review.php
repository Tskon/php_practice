<?php
include '../config.php';
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');
$id = (int)preg_replace("/[^0-9]/", '', $_POST['id']);
$newName = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['new_name']))) ;

$newText = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['new_text'])));

$sql = "UPDATE `reviews` SET `name`='$newName',`text`='$newText' WHERE id = $id";
mysqli_query($link, $sql);

mysqli_close($link);
