<?php
if ($_POST) {
	require_once '../config/config.php';
	$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
	
	include_once '../models/basket.php';
	
	mysqli_close($link);
}