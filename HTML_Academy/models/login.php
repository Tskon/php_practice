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
    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user']['email'] !== $email){
      $_SESSION['user'] = ['email' => $email, 'password' => $currentUser['password']];
    }
  } else {
    print 'Incorrect password';
  }

} else {
  print 'Введите корректные данные';
}

