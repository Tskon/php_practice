<?php
if (isset($_COOKIE['history'])) {
  $products = getProducts();
  $history = json_decode($_COOKIE['history'], true);

  foreach (array_keys($history) as $id => $product){
    print_r($products[$id]);
    print '<br>';
  }
  var_dump($history);
}