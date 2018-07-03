<?php
global $query;

if (isset($query['id'])) {
  $products = getProducts();
  if (isset($products[$query['id'] - 1])) {
    if(isset($_COOKIE['history'])){
      $history = json_decode($_COOKIE['history'], true);
    }
    $history[($query['id'] - 1)] = true;
    setcookie('history', json_encode($history), strtotime('+1 day'), '/');
    $lotContent = renderPage($path . 'view/content/lot.php', [
      "products" => getProducts(),
      'categories' => getCategories(),
      "id" => $query['id'] - 1
    ]);
    $html = renderPage($path . 'view/mainTemplate.php', ["content" => $lotContent, 'categories' => getCategories()]);
    print($html);
  } else {
    header('Location: /404');
    exit;
  }
}
