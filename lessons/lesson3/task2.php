<?php

/*
С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – это ноль.
1 – нечетное число.
2 – четное число.
*/

$i = 0;
do {
  if ($i == 0) echo "$i - это ноль<br>";
  elseif ($i % 2 == 0) echo "$i - это четное число<br>";
  else echo "$i - это нечетное число<br>";
  $i++;
} while ($i <= 10);