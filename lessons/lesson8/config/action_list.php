<?php
// example: mysite/index.php/products/catalog
// example2: mysite/index.php/order/newOrder
return array(
	'catalog' => 'getProductsList',
	'item' => 'getCurrentItem',
	'all_orders' => 'allOrders',
	'user_orders' => 'userOrders',
	'newOrder' => 'lastOrder'
);