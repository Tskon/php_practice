<?php
include "../config.php";
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');
$id = (int)preg_replace("/[^0-9]/", '', $_POST['id']);
$sql = "DELETE FROM `reviews` WHERE id = $id";
mysqli_query($link, $sql);
mysqli_close($link);