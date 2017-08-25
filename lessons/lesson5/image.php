<?php

include 'config.php';

$id = $_GET['id'];

$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');
$sql = "SELECT `name` FROM `photo_gallery` WHERE id = $id";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
mysqli_close($link);

$path = $dir . $result['name'];
echo "<img src='$path'>";