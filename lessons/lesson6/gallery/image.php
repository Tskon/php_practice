<?php

include 'config.php';

$id = $_GET['id'];

$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');
$sql = "UPDATE `photo_gallery` SET `view_count`=`view_count` + 1 WHERE `id` = $id";
mysqli_query($link, $sql);
$sql = "SELECT `name`, `view_count` FROM `photo_gallery` WHERE id = $id";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));

mysqli_query($link, $sql);
mysqli_close($link);

$path = $dir . $result['name'];
echo "<img src='$path'>";
echo "<p>Количество просмотров: ".$result['view_count']."</p>";