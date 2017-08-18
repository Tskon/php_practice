<?php

echo changeSpaces('Нужно больше этих мягких французских булок', '_');

function changeSpaces($str, $separator) {
  $arr = explode(' ', $str);
  return implode($separator, $arr);
}