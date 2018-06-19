<?php
function renderPage($layout, $data) {
  return requireToVar($layout, $data);
}

function getFormatedCoast($amount) {
  return number_format(ceil($amount), 2, '.', ' ') . '<b class="rub">р</b>';
}

function requireToVar($file, $data = []){
  ob_start();
  require($file);
  return ob_get_clean();
}

function timeToMidnight(){
  return date('H:m', (strtotime('tomorrow') - time()));
}