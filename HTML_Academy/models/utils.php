<?php
function requireToVar($file, $data = []) {
  ob_start();
  require($file);
  return ob_get_clean();
}

function getFormatedCoast($amount) {
  return number_format(ceil($amount), 0, '.', ' ') . '<b class="rub">р</b>';
}

function timeToMidnight() {
  $now = new DateTime();
  $toMidnight = strtotime('tomorrow') - $now->getTimestamp();
  return ($toMidnight / 3600 % 24) . ':' . ($toMidnight / 60 % 60);
}

function fileSave($fieldName, $options) {
  if (isset($_FILES[$fieldName])) {
    $errors = [];

    $fileType = $_FILES[$fieldName]['type'];
    $fileName = $_FILES[$fieldName]['name'];
    $fileSize = $_FILES[$fieldName]['size'];
    $fileTmpName = $_FILES[$fieldName]['tmp_name'];

    print $fileType;
    if ($fileType && isset($options['type']) &&strpos($fileType, $options['type']) === false) {
      $errors[] = 'Incorrect file type';
    }
    print $fileSize.' ';
    print ($options['maxSize'] * 1048576);
    if (isset($options['maxSize']) && $fileSize > ($options['maxSize'] * 1048576)) {
      $errors[] = 'The file exceeds ' . $options['maxSize'] . 'mb';
    }

    if (count($errors) === 0) {
      $uploadFile = $options['directory'] . basename($fileName);
      move_uploaded_file($fileTmpName, $uploadFile);
      return [
        'type' => 'success',
        'file' => $uploadFile
      ];
    } else {
      return [
        "type" => "error",
        "errors" => $errors
      ];
    }
  }
}