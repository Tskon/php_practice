<?php
function renderPage($layout, $data) {
  return require $layout;
}

function getFormatedCoast($amount) {
  return number_format(ceil($amount), 2, '.', ' ') . '<b class="rub">р</b>';
}

function requireToVar($file){
  ob_start();
  require($file);
  return ob_get_clean();
}