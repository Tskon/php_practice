<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>PHP Practice</title>
</head>
<body>
<?php
$connection = mysqli_connect('localhost','sctreidru_test1','q1w2Q1W2','sctreidru_test1');

if( $connection == false ){
    echo 'Connection failed!<br>';
    echo mysqli_connect_error();
    exit();
}
$result = mysqli_query($connection, "SELECT * FROM `articles_categories`");
echo 'Find categories: ' . mysqli_num_rows($result);
?>
<ul>
    <?php
        while ($iter = mysqli_fetch_assoc($result) ) {
            echo '<li>' . $iter['title'] . '</li>';
        }
    ?>
</ul>
<?php mysqli_close($connection); ?>

</body>
</html>

