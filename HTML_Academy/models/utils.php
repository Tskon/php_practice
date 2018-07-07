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

    $fileName = $_FILES[$fieldName]['name'];
    $fileSize = $_FILES[$fieldName]['size'];
    $fileTmpName = $_FILES[$fieldName]['tmp_name'];

    if ($_FILES[$fieldName]['error']) {
      if ($_FILES[$fieldName]['error'] === 4) {
        $errors[] = 'File didn`t upload';
      } else {
        $errors[] = 'upload error code: ' . $_FILES[$fieldName]['error'];
      }
    } else {
      if (isset($options['ext'])) {
        $fileChunks = explode('.', $fileName);
        $fileExt = array_pop($fileChunks);
        if (!in_array($fileExt, $options['ext'])) {
          $errors[] = 'Incorrect file type. Available types: ' . implode(', ', $options['ext']);
        }
      }
      if (isset($options['maxSize']) && $fileSize > ($options['maxSize'] * 1048576)) {
        $errors[] = 'The file exceeds ' . $options['maxSize'] . 'mb';
      }
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

function killDangerString($str, $maxLength){
  if (isset($maxLength)) $str = substr($str, 0, $maxLength);
  $str = strip_tags($str);
  $str = htmlspecialchars($str);
  return $str;
}