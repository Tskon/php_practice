<?php
if ($_POST) {
	require_once '../config/config.php';
	$link = mysqli_connect($host, $dbUser, $dbPass, $dbName);
	
	if (@$_POST['m'] == 'basket') {
		include_once '../models/basket.php';
	}
	if (@$_POST['m'] == 'auth'){
		include_once '../models/auth.php';
	}
	
	mysqli_close($link);
}