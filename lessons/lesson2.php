<?php
/*
first task
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
*/

$a = rand(-100, 100);
$b = rand(-100, 100);
echo 'a: '.$a.'<br>';
echo 'b: '.$b.'<br>';

if ($a >= 0 && $b >= 0) {
    echo 'a - b: '.($a - $b);
}elseif ($a < 0 && $b < 0) {
    echo 'a * b: '.($a * $b);
}else {
    echo 'a + b: '.($a + $b);
}

/*
second part
Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
*/
echo '<br>-----second part-----<br>';

$a = rand(0, 15);
echo "a = $a<br>";

switch ($a){
    case 0: echo '0<br>';
    case 1: echo '1<br>';
    case 2: echo '2<br>';
    case 3: echo '3<br>';
    case 4: echo '4<br>';
    case 5: echo '5<br>';
    case 6: echo '6<br>';
    case 7: echo '7<br>';
    case 8: echo '8<br>';
    case 9: echo '9<br>';
    case 10: echo '10<br>';
    case 11: echo '11<br>';
    case 12: echo '12<br>';
    case 13: echo '13<br>';
    case 14: echo '14<br>';
    case 15: echo '15';
}

/*
third part
Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать
оператор return.
*/
echo '<br>-----third part-----<br>';

echo mult($b, $a);

function sum($a, $b){
    return $a + $b;
}
function dif($a, $b){
    return $a - $b;
}
function mult($a, $b){
    return $a * $b;
}
function div($a, $b){
    if ($b == 0) return 'Нельзя делить на ноль';
    return $a / $b;
}

/*
fourth part
Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного
значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное
значение (использовать switch).
*/
echo '<br>-----fourth part-----<br>';

mathOperation($b, $a, 'mult');

function mathOperation($arg1, $arg2, $operation){
    switch ($operation){
        case 'sum': {
            echo sum($arg1, $arg2);
            break;
        }
        case 'dif': {
            echo dif($arg1, $arg2);
            break;
        }
        case 'mult': {
            echo mult($arg1, $arg2);
            break;
        }
        case 'div': {
            echo div($arg1, $arg2);
        }
    }
}

/*
fifth part
Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи
встроенных функций PHP.
*/
echo '<br>-----fifth part-----<br>';

echo date("Y");

/*
sixth part
*С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow),
 где $val – заданное число, $pow – степень.
*/
echo '<br>-----sixth part-----<br>';

echo power(5, -3) . '<br>';
echo power(5, 3) . '<br>';
echo power(5, 0);

function power($val, $pow){
    if ($pow > 0) return $val * power($val, $pow - 1);
    if ($pow < 0){
        $temp = power($val, $pow - $pow * 2);
        return 1 / $temp;
    }
    return 1;
}

/*
seventh part
*Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями
 22 часа 15 минут
*/
echo '<br>-----seventh part-----<br>';

function getTimeEnding($number, $endingArray){
    if ($number >= 11 && $number <= 19) {
        $ending = $endingArray[2];
    } else {
        $i = $number % 10;
        switch ($i) {
            case (1):
                $ending = $endingArray[0];
                break;
            case (2):
            case (3):
            case (4):
                $ending = $endingArray[1];
                break;
            default:
                $ending = $endingArray[2];
        }
    }
    return $ending;
}

$hours = date('H');
$minutes = date('m');

echo $hours . ' ' . getTimeEnding($hours, array('час', 'часа', 'часов')) . ' ' .
    $minutes . ' ' . getTimeEnding($minutes, array('минута', 'минуты', 'минут'));