<?php
include 'config.php';
include 'preview-maker.php';

//gallery
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName) or die ('Не подключиться к базе данных');
$sqlResult = mysqli_query($link, 'SELECT * FROM `photo_gallery` ORDER BY `view_count` DESC');
$imagesArr = array();
while ($row = mysqli_fetch_assoc($sqlResult)) {
	$imagesArr[] = $row;
}

// reviews
$sql = 'SELECT `name`, `text`, `date` FROM `reviews`';
$sqlResult = mysqli_query($link, $sql);
$reviewsArr = array();
while ($row = mysqli_fetch_assoc($sqlResult)) {
	$reviewsArr[] = $row;
}

//add picture
if (isset($_FILES['picture'])) {
	if (preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['picture']['name'])) {
		$filesize = $_FILES['picture']['size'];
		if ($filesize > $maxImgSize) {
			echo 'Слишком большая картинка!';
		} else {
			$filename = $_FILES['picture']['name'];
			$source = $_FILES['picture']['tmp_name'];
			$target = 'img/' . $filename;
			move_uploaded_file($source, $target);
			$sql = "INSERT INTO `photo_gallery`(`name`, `size`) VALUES ('$filename', $filesize)";
			mysqli_query($link, $sql);
			
			$path = $dir . $filename;
			$miniPath = $dir . 'mini/' . $filename;
			create_thumbnail($path, $miniPath, 100, 100);
		}
	}
}
mysqli_close($link);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP lvl1. Lesson 5</title>
</head>
<body>

<div class="slider">
	
	<?php
	
	foreach ($imagesArr as $imgRow) {
		$path = $dir . $imgRow['name'];
		$miniPath = $dir . 'mini/' . $imgRow['name'];
		echo "<a target='_blank' href='image.php?id=" . $imgRow['id'] . "'><img src='$miniPath'></a>";
	}
	
	?>

</div>
<div class="uploader">
    <form enctype="multipart/form-data" action="" method="post">
        <input type="file" name="picture">
        <input type="submit" value="Загрузить">
    </form>
</div>

<div class="reviews">
    <table>
			<?php
			foreach ($reviewsArr as $reviewRow) {
				
				echo "<tr><td>".$reviewRow['name']."</td><td>".$reviewRow['date']."</td></tr>";
				echo "<tr><td colspan='2'>".$reviewRow['text']."</td></tr>";
			}
			?>
    </table>
    <div id="answer"></div>
    <div>
        <label for="name">Имя</label>
        <input type="text" name="name" id="name"><br>
        <label for="text">Сообщение</label>
        <textarea name="text" id="text" cols="30" rows="4"></textarea>
        <input type="submit" value="Запостить" id="review_button">
    </div>
</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="gallery.js"></script>
</body>
</html>