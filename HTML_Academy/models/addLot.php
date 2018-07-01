<?php
$fields = ['category', 'lot-name', 'message', 'image', 'lot-rate', 'lot-step', 'lot-date'];

foreach ($fields as $field) {
  if (isset($_POST[$field])) {

  } else {
    $result = fileSave($field, ['directory' => $path . 'img/upload/', 'type' => 'image', 'maxSize' => 3]);

    if ($result['type'] === 'success') {
      print '<img src="'. $uploadImgPath . basename($result['file']) . '"/>';
    } else {
      print '<br/>' . implode(', ', $result['errors']);
    }
  }
}