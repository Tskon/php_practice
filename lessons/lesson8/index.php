<?php

// front controller

// 1 Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);
$modelName = null;
$actionName = null;
$options = null;

// 2 Подключение файлов системы
require_once 'config/config.php';

// 3 Установка соединения с БД
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);

// 4 парсинг адресной строки
$uri = trim($_SERVER['REQUEST_URI'], '/');
$uriArr = explode('/', $uri);

if (count($uriArr) > 0 && $uriArr[0] == 'index.php') {
	array_shift($uriArr); // убираем index.php
}
if (count($uriArr) > 0) {
	$modelName = array_shift($uriArr);
}
if (count($uriArr) > 0) {
	$actionName = array_shift($uriArr);
}
if (count($uriArr) > 0) {
	$options = $uriArr;
}

// 5 Вызов нужной модели
if ($modelName != null) {
	include_once '/models/' . $modelName . '.php';
}

// 6 Нужный экшн и вью
/*
actionName - имя переменной во вьюшке вида {{actionName}},
задается в адресной строке siteName/index.php/modelName/actionName
*/
if ($actionName != null) {
	$view = file_get_contents('/views/'.$actionName.'.php', true);
	$actionArr = include_once '/config/action_list.php';
	$search = "{{{$actionName}}}";
	if ($options != null){
		$replace = $actionArr[$actionName]($options); // запуск экшена из модели возвращает html текстом
	}else{
		$replace = $actionArr[$actionName]();
	}
	
	$view = str_replace($search, $replace, $view); // замена {{actionName}} на html из модели
	echo $view;
}

mysqli_close($link);