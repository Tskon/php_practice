<?php

$region = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Санкт-Петербург' => ['Всеволжск', 'Павловск', 'Кронштадт']
];

printArr($region);

function printArr($arr){
    foreach ($arr as $key => $val) {
        echo "$key:<br>";
        echo implode(', ', $val) . '<br>';
    }
}