<?php
$operation = $_POST['operation'];
$num1 = (int)preg_replace("/[^0-9]/", '', $_POST['num1']);
$num2 = (int)preg_replace("/[^0-9]/", '', $_POST['num2']);

switch ($operation) {
	case 'plus':
		$operation = '+';
		$result = $num1 + $num2;
		break;
	case 'minus':
		$operation = '-';
		$result = $num1 - $num2;
		break;
	case 'mult':
		$operation = '*';
		$result = $num1 * $num2;
		break;
	case 'div':
		$operation = '/';
		if ($num2 == 0) {
			$result = 'Нельзя делить на ноль';
			break;
		}
		$result = $num1 / $num2;
		break;
}
$answer = $num1.$operation.$num2.'='.$result;
echo $answer;