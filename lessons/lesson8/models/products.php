<?php
//include '../config/config.php';
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
function getProductsList(){
	global $link;
	$sql = 'SELECT * FROM `products`';
	$result = mysqli_query($link, $sql);
	$catalog = '';
	while($row = mysqli_fetch_assoc($result)){
		$catalog .= "
		<h3>{$row['name']}</h3>
		<div class='catalog_description'>{$row['description']}</div>
		<div class='catalog_coast'>{$row['coast']}</div>
		";
	}
	return $catalog;
}

function getCurrentItem($options = array(0)){
	global $link;
	$id = $options[0];
	$sql = 'SELECT * FROM `products` WHERE `id` = ' . $id;
	$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
	if (!$result){return '<h3>Нет такого товара</h3>';}
	return $item = "
		<h3>{$result['name']}</h3>
		<div class='catalog_description'>{$result['description']}</div>
		<div class='catalog_coast'>{$result['coast']}</div>
		";
}
