<?php

function getProductsList($link){
	$sql = 'SELECT * FROM `products`';
	$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_assoc($result)){
		print_r($row);
	}
}

echo 'models/products.php';