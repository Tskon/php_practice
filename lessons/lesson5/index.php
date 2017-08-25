<?php
include 'config.php';
include 'preview-maker.php';
if(isset($_FILES['picture'])) {
  if(preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['picture']['name'])) {
    if($_FILES['picture']['size'] > $maxImgSize){
      echo 'Слишком большая картинка!';
    }else {
      $filename = $_FILES['picture']['name'];
      $source = $_FILES['picture']['tmp_name'];
      $target = 'img/' . $filename;
      move_uploaded_file($source, $target);
    }
  }
}
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
  $link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
  $sqlResult = mysqli_query($link, 'select * from `photo_gallery` order by `name` desc');

  $imagesArr = array();
  while($row = mysqli_fetch_assoc($sqlResult)){
      $imagesArr[] = $row;
  }
  print_r($imagesArr);

  mysqli_close($link);

  $files = scandir($dir);
  for ($i = 0; $i < count($files); $i++) {
    if ($files[$i] != '.' && $files[$i] != '..') {
      $path = $dir . $files[$i];
      $miniPath = $dir.'mini/'.$files[$i];
      if (!file_exists($miniPath)){
        @create_thumbnail($path, $miniPath, 100, 100);
      }
      echo "<a target='_blank' href='$path'><img src='$miniPath'></a>";
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