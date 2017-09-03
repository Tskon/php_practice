<?php
include 'tools/config.php';

$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
$sql = "SELECT * FROM `products` ORDER BY `name`";
$result = mysqli_query($link, $sql);

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
    <form target="_blank" method="post" action="auth.php">
        <input type="text" name="login" placeholder="login" required>
        <input type="password" name="pass" placeholder="password" required>
        <button>Войти</button>
        <a href="registration.php">Зарегистрироваться</a>
    </form>
    <div class="basket">
        <h3>Товары в корзине: </h3>
        <ul></ul>
        <div>На сумму <div id="totalCoast"></div> р.</div>
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
            <button class='to_basket_button' id='button-".$productId."'>В корзину: $productCoast р.</button>
        </div>";
	}
	
	?>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>