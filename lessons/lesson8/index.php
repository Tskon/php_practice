<?php

// front controller

// 1 Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Значения по-умолчанию
$modelName = 'products';
$actionName = 'catalog';
$options = null;

// 2 Подключение файлов системы
require_once './config/config.php';

// 3 Установка соединения с БД
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);

// 4 парсинг адресной строки
$uri = trim($_SERVER['REQUEST_URI'], '/');
$uriArr = explode('/', $uri);

if (count($uriArr) > 0 && $uriArr[0] == 'index.php') {
	array_shift($uriArr); // убираем index.php из массива
} else {
	$host = $_SERVER['HTTP_HOST'];
	header("Location: http://$host" . $_SERVER['PHP_SELF']);
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
include_once './models/' . $modelName . '.php';


// 6 Нужный экшн и вью
/*
actionName - имя переменной во вьюшке вида {{actionName}},
задается в адресной строке siteName/index.php/modelName/actionName
*/
$contentView = file_get_contents('./views/' . $actionName . '.php', true);
$actionArr = include_once '/config/action_list.php';
$search = "{{{$actionName}}}";
if ($options != null) {
	$replace = $actionArr[$actionName]($options); // запуск экшена из модели возвращает html текстом
} else {
	$replace = $actionArr[$actionName]();
}

$contentView = str_replace($search, $replace, $contentView); // замена {{actionName}} на html из модели

// 7 Подключение main view
$mainView = file_get_contents('/views/main.php', true);
$mainView = str_replace("{{title}}", $actionName, $mainView);
$mainView = str_replace("{{header}}", file_get_contents('./views/header.php'), $mainView);
$mainView = str_replace("{{content}}", $contentView, $mainView);

echo $mainView;
mysqli_close($link);