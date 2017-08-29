<?php
include "../config.php";

$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');

$name = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['name']))) ;
$text = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['text'])));
$sql = "INSERT INTO `reviews`(`name`, `text`) VALUES ('$name', '$text');";
$result = mysqli_query($link, $sql);
$sql = "SELECT top 1 `date` FROM `reviews` ORDER BY id DESC;";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
mysqli_close($link);

echo $name.', отзыв добавлен!';