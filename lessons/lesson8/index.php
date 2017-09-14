<?php
// front controller

// 1 Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2 Значения по-умолчанию
$modelName = 'products';
$actionName = 'catalog';
$options = null;
$isAuth = false;

// 3 Подключение файлов системы и установка соединения с БД
require_once '/config/config.php';
$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
include_once '/models/auth.php';

// 4 парсинг адресной строки
$uri = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags(trim($_SERVER['REQUEST_URI'], '/'))));
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
include_once '/models/' . $modelName . '.php';


// 6 Нужный экшн и вью
/*
actionName - имя переменной во вьюшке вида {{actionName}},
задается в адресной строке siteName/index.php/modelName/actionName
*/
$contentView = file_get_contents('/views/' . $actionName . '.php', true);
$actionArr = include_once '/config/action_list.php';
$search = "{{{$actionName}}}";
if ($options != null) {
	$replace = $actionArr[$actionName]($options); // запуск экшена из модели возвращает html текстом
} else {
	$replace = $actionArr[$actionName]();
}

$contentView = str_replace($search, $replace, $contentView); // замена {{actionName}} на html из модели

// 7 Подключение main view и модулей
require_once '/controllers/compilateMainView.php';

mysqli_close($link);