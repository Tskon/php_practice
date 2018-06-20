<?php
if (isset($query['id'])){
  $lotContent = renderPage($path . 'view/content/lot.php', [
    "products" => getProducts(),
    'categories' => getCategories(),
    "id" => $query['id']
  ]);
  $html = renderPage($path . 'view/mainTemplate.php', ["content" => $lotContent, 'categories' => getCategories()]);
  print($html);
}
