<?php

require_once $path . 'models/data.php';

$users = getUsers();

$email = ($_POST['email']) ? killDangerString($_POST['email'], 20) : null;
$password = ($_POST['password']) ? killDangerString($_POST['password'], 30) : null;

if ($email !== null && $password !== null){
  $currentUser = null;

  foreach ($users as $user) {
    if ($user['email'] === $email) {
      $currentUser = $user;
      break;
    }
  }

  if ($currentUser !== null && password_verify($password, $currentUser['password'])){
    print 'Correct!';
    session_start();
    // todo set cookie and sesstion
  } else {
    print 'Incorrect password';
  }

} else {
  print 'Введите корректные данные';
}

