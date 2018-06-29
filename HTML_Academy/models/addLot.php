<?php
$fields = ['category', 'lot-name', 'message', 'image', 'lot-rate', 'lot-step', 'lot-date'];

foreach ($fields as $field) {
  if(isset($_POST[$field])){
    var_dump($_POST[$field]);
  } elseif (isset($_FILES[$field])) {
    $fileType = $_FILES[$field]['type'];
    $fileName = $_FILES[$field]['name'];
    $fileName = $_FILES[$field]['size'];
    $fileName = $_FILES[$field]['tmp_name'];
//    $path;
  }
  print '<br/>';
}