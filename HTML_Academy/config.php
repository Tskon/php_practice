<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('upload_max_filesize', "10M") ;

date_default_timezone_set('Europe/Moscow');

$path = $_SERVER['DOCUMENT_ROOT'] . '/HTML_Academy/';
$uploadImgPath = 'HTML_Academy/img/upload/';

global $path, $uploadImgPath;