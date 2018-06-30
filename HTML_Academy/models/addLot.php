<?php
$fields = ['category', 'lot-name', 'message', 'image', 'lot-rate', 'lot-step', 'lot-date'];

foreach ($fields as $field) {
  if (isset($_POST[$field])) {
  } elseif (isset($_FILES[$field])) {
    $fileType = $_FILES[$field]['type'];
    $fileName = $_FILES[$field]['name'];
    $fileSize = $_FILES[$field]['size'];
    $fileTmpName = $_FILES[$field]['tmp_name'];
    if(strpos($fileType, "image") !== false){
      $uploadDir = $path.'img/upload/';
      $uploadFile = $uploadDir . basename($fileName);
      print $fileTmpName;
      print '<br>';
      print $uploadFile;
      move_uploaded_file($fileTmpName, $uploadFile);
    }
  } else {
    // todo тогда добавить этот файл в список ошибок.
  }
  print '<br/>';
}