<?php
include 'config.php';
session_start();
if ($_POST['type'] == 'productsList'){
	$controller = 'productsList';
}



include 'model.php';