<?php
require_once $path . 'models/main.php';
require_once $path . 'models/data.php';


$url = parse_url($_SERVER['REQUEST_URI']);
if(isset($url['query'])){
  parse_str($url['query'], $query);
}

if (isset($_GET['route'])) {
  switch ($url['path']) {
    case '/lot':
      include_once $path . 'controller/lot.php';
      break;
  }
} else {
  $indexContent = renderPage($path . 'view/content/index-page.php', ["products" => getProducts(), 'categories' => getCategories()]);
  $html = renderPage($path . 'view/mainTemplate.php', ["content" => $indexContent, 'categories' => getCategories()]);

  print ($html);
}


