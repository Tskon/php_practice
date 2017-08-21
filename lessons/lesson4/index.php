<?php
if(isset($_FILES['picture'])) {

  if(preg_match('/[.](jpg)|(gif)|(png)$/', //Ставим допустимые форматы изображений для загрузки
    $_FILES['picture']['name'])) {

    $filename = $_FILES['picture']['name'];
    $source = $_FILES['picture']['tmp_name'];
    $target = 'img/' . $filename;
    move_uploaded_file($source, $target);
  }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP lvl1. Lesson 4</title>
</head>
<body>

<div class="slider">
  <?php

  $dir = 'img/';
  $files = scandir($dir);
  for ($i = 0; $i < count($files); $i++) {
    if ($files[$i] != '.' && $files[$i] != '..') {
      $path = $dir . $files[$i];
      echo "<a target='_blank' href='$path'><img src='$path'></a>";
    }
  }

  ?>
</div>
<div class="uploader">
    <form enctype="multipart/form-data" action="" method="post">
        <input type="file" name="picture">
        <input type="submit" value="Загрузить">
    </form>
</div>


</body>
</html>