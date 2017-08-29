<?php
include "config.php";

$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');

$name = $_POST['name'];
$text = $_POST['text'];
$sql = "INSERT INTO `reviews`(`name`, `text`) VALUES ('$name', '$text')";
mysqli_query($link, $sql);
$sql = "SELECT top 1 `date` FROM `reviews` ORDER BY id DESC";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
mysqli_close($link);

//print_r($result);
echo $result['date'];