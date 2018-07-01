<?php
$fields = [
  'category' => '',
  'lot-name' => '',
  'message' => '',
  'image' => '',
  'lot-rate' => '',
  'lot-step' => '',
  'lot-date' => ''];
$errors = [];

if(!is_numeric($_POST['lot-rate'])) $errors['lot-rate'] = 'Введите число';
if(!is_numeric($_POST['lot-step'])) $errors['lot-step'] = 'Введите число';

foreach ($fields as $field => $val) {
  if (isset($_POST[$field]) && $_POST[$field] !== '') {
    $fields[$field] = $_POST[$field];
  } elseif (isset($_FILES[$field])) {
    $result = fileSave($field, [
      'directory' => $path . 'img/upload/',
      'ext' => ['png', 'jpeg', 'jpg', 'gif'],
      'maxSize' => 3]);
    if ($result['type'] === 'success') {
      $fields[$field] = $uploadImgPath . basename($result['file']);
    } else {
      $errors[$field] = $result['errors'];
    }
  }else{
    $errors[$field] = 'Поле не заполнено';
  }
}

if($_POST['category'] === 'Выберите категорию') $errors['category'] = 'Не выбрана категория';