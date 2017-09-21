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

function currentOrder($id){

}

function lastOrder(){
    global $link;
    $sql = 'SELECT max(`id`) AS `maxid` FROM `orders` ';
    $result = mysqli_fetch_assoc((mysqli_query($link, $sql)));
    $orderID = $result['maxid'];

    $str = "
    <div>
    <h1>Ваш заказ успешно оформлен!</h1>
    
</div>
    ";

    $sql = "SELECT orders.id, orders.total_coast, orders.datetime, orderlist.order_id, products.name, products.coast FROM `orders` 
RIGHT JOIN orderlist ON (orders.id = orderlist.order_id)
LEFT JOIN products ON (orderlist.product_id = products.id)
 WHERE orderlist.order_id = $orderID 
";
    $result = mysqli_query($link, $sql);
    $orderHeader = null;
    while ($row = mysqli_fetch_assoc($result)) {
        if($orderHeader <> 1){
            $str .= "
        <p>Заказ № {$row['id']} от {$row['datetime']}</p>
        <p>Сумма: {$row['total_coast']} р.</p>
        <p>Список товаров:</p>
        <ul>";
        }
        $str .= "<li>{$row['name']}: {$row['coast']} р.</li>";
        $orderHeader = 1;
    };
    $str .= "</ul>";

    return $str;
}