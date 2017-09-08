<?php

// front controller

// 1 Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2 Подключение файлов системы
require_once 'config/config.php';

// 3 Установка соединения с БД
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);

// 4 Вызов нужной модели
$uri = trim($_SERVER['REQUEST_URI'], '/');
$uriArr = explode('/',$uri);

if(count($uriArr) > 0){
	array_shift($uriArr); // убираем index.php
}
if(count($uriArr) > 0){
	$modelName = array_shift($uriArr);
}
if(count($uriArr) > 0){
	$actionName = array_shift($uriArr);
}
if(count($uriArr) > 0){
	$params = $uriArr;
}

// 4 Вызов нужной модули


mysqli_close($link);