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

//echo "models/products.php<br>";