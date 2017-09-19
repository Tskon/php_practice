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
    	$sql = "INSERT INTO `orders` (`user_id`, `total_coast`) VALUES ('$userID', $totalCoast)";
    mysqli_query($link, $sql);
    // получить список товаров, создать архив с айди товаров, очищаем корзину.
    $productsIdArr = explode('-', $_POST['productsList']);
    $productsCoastsArr = explode('-', $_POST['coastsList']);
    setcookie("basketList", "", time() + 3600);
    // пройти по архиву, добавить данные в таблицу orderlist
    $i = 0;
    foreach ($productsIdArr as $item) {
        $sql = "INSERT INTO `orderlist` (order_id, product_id, coast) VALUES ($orderID, $item, $productsCoastsArr[$i])";
        mysqli_query($link, $sql);
        $i++;
    }
}

function lastOrder(){
    $str = "
    <div>
    <h1>Ваш заказ успешно оформлен!</h1>
    
</div>
    ";
    global $link;
    $sql = "SELECT * FROM `orders` LEFT JOIN orderlist ON (orders.id = orderlist.order_id) ORDER BY orders.id DESC LIMIT 1
";
    $result = mysqli_query($link, $sql);
    $order = mysqli_fetch_assoc($result);
    $str .= "
        <p>Заказ № {$order['order_id']}</p>
        <p>Список товаров:</p>
        <ul>";
    $sql = "SELECT orderlist.coast, name FROM `orderlist` 
LEFT JOIN products ON (products.id = orderlist.product_id)
WHERE order_id = {$order['order_id']}";
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $str .= "<li>{$row['name']}: {$row['coast']} р.</li>";
    };
    $str .= "</ul><p>Сумма: {$order['total_coast']} р.</p>";

    return $str;
}