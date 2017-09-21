<?php
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
function getProductsList($options){
	global $link;
    global $authUser;
	$sql = 'SELECT * FROM `products`';
	$result = mysqli_query($link, $sql);
	$catalog = '';
	while($row = mysqli_fetch_assoc($result)){
		$catalog .= "
		<div class='catalog_item'>
		<h3><a href='/index.php/products/item/{$row['id']}'>{$row['name']}</a></h3>
		<div class='catalog_description'>{$row['description']}</div>";
        if (@$options[0] <> 'edit') {
            $catalog .="
		<button class='to_basket_button' id='button-{$row['id']}'>В корзину: {$row['coast']} р.</button>
		";
        }
        if ($authUser['root'] == 1 && $options[0] == 'edit') {
            $catalog .= '<input type="button" value="Del" id="catalog-button-del-' . $row['id'] . '"> </div>';
        } else {
            $catalog .= '</div>';
        }
	}
    if ($authUser['root'] == 1) {
        $catalog .= "
        <div id='create_product_form'>
        <h3>Добавить новый товар:</h3>
            <input type='text' name='name' placeholder='Название' required>
            <input type='text' name='coast' placeholder='Цена' required>
            <textarea cols='35' rows='6' name='descr' placeholder='описание' required></textarea>
            <input type='button' id='create_product_button' value='Создать'>
        </div>
        ";
    }
	return $catalog;
}

function getCurrentItem($options = array(0)){
	global $link;
	$id = $options[0];
	$sql = 'SELECT * FROM `products` WHERE `id` = ' . $id;
	$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
	if (!$result){return '<h3>Нет такого товара</h3>';}
	return $item = "
		<h3>{$result['name']}</h3>
		<div class='catalog_description'>{$result['description']}</div>
		<div class='catalog_coast'>{$result['coast']}</div>
		<button class='to_basket_button' id='button-{$result['id']}'>В корзину: {$result['coast']} р.</button>
		";
}
