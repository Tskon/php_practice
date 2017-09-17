<?php
if (@$_POST['type'] == 'newOrder') {
	createNewOrder();
}
function createNewOrder() {
	global $link;
	$user = null;
	if (@isset($_COOKIE['authUser'])) {
		print_r($_COOKIE['authUser']);
		$sql = 'INSERT INTO ``'
	}else{
	
	}
}
//		global $link;
//		$basket = '';
//		$totalCoast = 0;
//		foreach ($idArr as $value) {
//			$sql = 'INSERT INTO `orders` (``);
//			$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
//		}
//		$sql = 'SELECT * FROM `orders` WHERE `id` = ' . ;
//		$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
//		$basket .= "<h3>Общая стоимость: {$totalCoast} р.</h3>";
//		return $basket;
//		while($row = mysqli_fetch_assoc($result)){
//			$catalog .= "
//		<div class='catalog_item'>
//		<h3><a href='/index.php/products/item/{$row['id']}'>{$row['name']}</a></h3>
//		<div class='catalog_description'>{$row['description']}</div>
//		<button class='to_basket_button' id='button-{$row['id']}'>В корзину: {$row['coast']} р.</button>
//		</div>
//		";
//		}
//		return $catalog;
//	} else {
//		return 'Зарегистрируйтесь';
//	}
//}
