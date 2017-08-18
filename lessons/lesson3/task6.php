<?php

$mainMenu = [
  'Главная' => '#',
  'О компании' => '#',
  'Подразделения в городах:' => ['Воронеж' => '#', 'Краснодар' => '#', 'Nums: ' => ['1', '2', '3']],
  'Контакты' => '#'
];

createMenu($mainMenu, 'Главное меню');

function createMenu($menuArr, $name){
  echo "<ul>$name";

  foreach ($menuArr as $key => $val){
    if(is_array($val)) {
      createMenu($val, $key);
      continue;
    }
    if(is_numeric($key)){
      echo "<li>$val</li>";
      continue;
    }
    echo "<a href='$val'><li>$key</li></a>";
  }

  echo  '</ul>';
}