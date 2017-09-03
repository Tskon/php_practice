<?php
include 'tools/config.php';
session_start();
if ($_POST['type'] == 'addToBasket'){
	$id = (int)preg_replace("/[^0-9]/", '', $_POST['id']);
	$basketCount++;
	echo $basketCount.'ddd'.$id;
}

