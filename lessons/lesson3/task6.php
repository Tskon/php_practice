<?php

/*
 В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.
 Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать
 меню с вложенными подменю? Попробовать его реализовать.
*/

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