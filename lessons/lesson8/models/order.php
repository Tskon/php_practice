<?php
function createNewOrder($idArr) {
	global $isAuth;
	if ($isAuth) {
		global $link;
		$basket = '';
		$totalCoast = 0;
		foreach ($idArr as $value) {
			$sql = 'SELECT * FROM `products` WHERE `id` = ' . $value;
			$row = mysqli_fetch_assoc(mysqli_query($link, $sql));
			$totalCoast += $row['coast'];
			$basket .= "
		<div class='order_item'>
		<h3>{$row['name']}</a></h3>
		<div class='catalog_description'>{$row['description']}</div>
		<h3>{$row['coast']}</h3> р.
		</div>
		";
		}
		$basket .= "<h3>Общая стоимость: {$totalCoast} р.</h3>";
		return $basket;
	} else {
		return 'Зарегистрируйтесь';
	}
}
