<?php
if (@$_POST['type'] == 'newOrder') {
	createNewOrder();
}
function createNewOrder() {
	global $link;
	if (@isset($_COOKIE['basket'])) {
		// получить список товаров, создать архив с айди товаров и ценами.
		// пройти по архиву, добавить данные в таблицу orderlist
		// создать связь между таблицами orderlist и orders
	}
	$sql = 'SELECT max(`id`) AS `maxid` FROM `orders` ';
	$result = mysqli_fetch_assoc((mysqli_query($link, $sql)));
	$orderID = $result['maxid'] + 1;
	if (@isset($_COOKIE['authUser'])) {
		$user = unserialize($_COOKIE['authUser']);
		$userID = $user['userID'];
	} else {
		$userID = 0;
	}
	$totalCoast = $_POST['totalCoast'];
	//	$sql = "INSERT INTO `orders` (`user_id`, `total_coast`) VALUES ('$userID', $totalCoast)";
	//	После успешного добавления заказа в БД очистить корзину,
	//	переместиться на страницу оформленного заказа.
	// Если товар добавлен зарегистрированным пользователем - он может редактировать
	if (mysqli_query($link, $sql)) {
		//		echo true;
	} else {
		//		echo false;
	};
	print_r($orderID);
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
