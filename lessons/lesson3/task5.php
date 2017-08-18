<?php

/*
 Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
*/

echo changeSpaces('Нужно больше этих мягких французских булок');

function changeSpaces($str, $separator = '_') {
  $arr = explode(' ', $str);
  return implode($separator, $arr);
}