<?php

include '../config/config.php';

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
	$str .= '{ "id": "'.$id.'", "name": "' . $name . '", "coast": ' . $coast . '}]';
	
	setcookie("basketList", $str, time() + 3600);
	echo $str;
}

if ($_POST['type'] == 'fillBasket') {
	if (isset($_COOKIE['basketList'])) {
		echo $_COOKIE['basketList'];
	}
}

if ($_POST['type'] == 'delFromBasket') {
	$id = (int)preg_replace("/[^0-9]/", '', $_POST['id']);
	if (isset($_COOKIE['basketList'])) {
		$response = json_decode($_COOKIE['basketList'], true);
		foreach ($response as $key => $val) {
			if ($val['id'] == $id) {
				unset($response[$key]);
				break;
			}
		}
		$str = '[';
		foreach ($response as $val) {
			$str .= '{ "id": "' . $val['id'] . '", "name": "' . $val['name'] . '", "coast": ' . $val['coast'] . '},';
		}
		
		$str = substr($str, 0, -1) . ']';
		setcookie("basketList", $str, time() + 3600);
		echo $str;
	}
}