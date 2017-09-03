<?php
include 'tools/config.php';
session_start();
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
if ($_POST['type'] == 'addToBasket') {
	$id = (int)preg_replace("/[^0-9]/", '', $_POST['id']);
	$sql = "SELECT * FROM `products` WHERE `id` = $id";
	$product = mysqli_fetch_assoc(mysqli_query($link, $sql));
	$name = $product['name'];
	$coast =  $product['coast'];
	$str = '[';
	if (isset($_COOKIE['basketList'])) {
		$str = substr($_COOKIE['basketList'], 0, -1).', ';
		
	}
	$str .= '{ "name": "' . $name . '", "coast": ' . $coast . '}]';
	
	setcookie("basketList", $str, time() + 3600);
	echo $str;
}

if ($_POST['type'] == 'fillBasket') {
	if (isset($_COOKIE['basketList'])) {
		echo $_COOKIE['basketList'];
	}
}