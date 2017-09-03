<?php
include 'tools/config.php';
session_start();

$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
$sql = "SELECT * FROM `products` ORDER BY `name`";
$result = mysqli_query($link, $sql);
$basketCount = 0;
$totalCoast = 0;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <title>e-shop</title>
</head>
<body>
<div class="header">
    <div class="basket">
        <div>Товаров в корзине: <?= $basketCount ?></div>
        <p>На сумму <?= $totalCoast ?> р.</p>
    </div>
</div>

<div class="content">
	<?php
	while ($row = mysqli_fetch_assoc($result)) {
		$productId = $row['id'];
		$productName = $row['name'];
		$productDescription = $row['description'];
		$productCoast = $row['coast'];
		echo
		"<div class='item'>
            <h3>$productName</h3>
            <p>$productDescription</p>
            <button class='to_basket_button'>В корзину: $productCoast р.</button>
        </div>";
	}
	
	?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>