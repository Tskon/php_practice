<?php

function getProductsList($link){
	$sql = 'SELECT * FROM `products`';
	$result = mysqli_query($link, $sql);
	$catalog = '';
	while($row = mysqli_fetch_assoc($result)){
		print_r($row);
	}
	include_once '/views/catalog.php';
	
	
}

echo "models/products.php<br>";