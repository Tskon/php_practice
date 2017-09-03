<?php
include 'config.php';
session_start();

$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);

//products list
if ($controller == 'productsList') {
	$sql = "SELECT * FROM `products` ORDER BY `name`";
	$result = mysqli_query($link, $sql);
	$productId = array();
	$productName = array();
	$productDescription = array();
	$productCoast = array();
	
	while ($row = mysqli_fetch_assoc($result)){
		$productId[] = $row['id'];
		$productName[] = $row['name'];
		$productDescription[] = $row['description'];
		$productCoast[] = $row['coast'];
	}
}


