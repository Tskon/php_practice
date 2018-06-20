<?php
function renderPage($layout, $data) {
  return requireToVar($layout, $data);
}

function getFormatedCoast($amount) {
  return number_format(ceil($amount), 0, '.', ' ') . '<b class="rub">р</b>';
}

function requireToVar($file, $data = []){
  ob_start();
  require($file);
  return ob_get_clean();
}

function timeToMidnight(){
  $now = new DateTime();
  $toMidnight = strtotime('tomorrow') - $now -> getTimestamp();
  return ($toMidnight/3600 % 24) . ':' . ($toMidnight/60 % 60);
}