<?php
if (@$_POST['type'] == 'newOrder' && @isset($_COOKIE['basketList'])) {
	createNewOrder();
}
function createNewOrder() {
	global $link;

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
//    	$sql = "INSERT INTO `orders` (`user_id`, `total_coast`) VALUES ('$userID', $totalCoast)";

    // получить список товаров, создать архив с айди товаров.
    $productsIdArr = explode('-', $_POST['productsList']);
    $productsCoastsArr = explode('-', $_POST['coastsList']);
    // пройти по архиву, добавить данные в таблицу orderlist
    $i = 0;
    foreach ($productsIdArr as $item) {
//        $sql =
    }



	//	После успешного добавления заказа в БД очистить корзину,
	//	переместиться на страницу оформленного заказа.
	// Если товар добавлен зарегистрированным пользователем - он может редактировать
	if (mysqli_query($link, $sql)) {
		//		echo true;
	} else {
		//		echo false;
	};
}
