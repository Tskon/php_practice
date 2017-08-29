<?php
    include 'config.php';
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');
$id = (int)preg_replace("/[^0-9]/", '', $_GET['id']);
$sql = "SELECT `name`, `text` FROM `reviews` WHERE id = $id";
$result = mysqli_fetch_assoc(mysqli_query($link, $sql));
$name = $result['name'];
$text = $result['text'];

mysqli_close($link);
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/gallery.css">
    <meta charset="UTF-8">
    <title>Отзыв</title>
</head>
<body>
<label> Изменить имя:
    <input type="text" id="name" value="<?=$name ?>">
</label>
<label> Изменить сообщение:
    <textarea id="text"><?=$text ?></textarea>
</label>
<div class="review_id">ID отзыва: <?=$id?></div>
<input type="button" value="сохранить" id="save">
<script src="../js/jquery-3.2.1.min.js"></script>
<script>
    $("#save").click(function () {
        var newName = $("#name").val();
        var newText = $("#text").html();
        var id = $('.review_id').html();
        str = 'new_name=' + newName + '&new_text=' + newText + '&id=' + id;
        $.ajax({
            type: 'post',
            url: 'tools/edit_review.php',
            data: str,
            success: function (msg) {
                alert('сообщение изменено!' + msg);
            }
        })
    });
</script>
</body>
</html>
