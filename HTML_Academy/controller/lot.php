<?php
if (isset($query['id'])){
  $products = getProducts();
  if(isset($products[$query['id'] - 1])){
    $lotContent = renderPage($path . 'view/content/lot.php', [
      "products" => getProducts(),
      'categories' => getCategories(),
      "id" => $query['id']
    ]);
    $html = renderPage($path . 'view/mainTemplate.php', ["content" => $lotContent, 'categories' => getCategories()]);
    print($html);
  } else{
    header('Location: /404');
    exit;
  }
}
