<?php
$fields = ['category', 'lot-name', 'message', 'image', 'lot-rate', 'lot-step', 'lot-date'];

foreach ($fields as $field) {
  if (isset($_POST[$field])) {
    var_dump($_POST[$field]);
  } elseif (isset($_FILES[$field])) {
    $fileType = $_FILES[$field]['type'];
    $fileName = $_FILES[$field]['name'];
    $fileSize = $_FILES[$field]['size'];
    $fileTmpName = $_FILES[$field]['tmp_name'];
    var_dump(strpos($fileType, "image") !== false);
//    $path; // todo добавить сохранение файла.
  } else {
    // todo тогда добавить этот файл в список ошибок.
  }
  print '<br/>';
}