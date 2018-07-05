<?php
require_once $path . 'models/main.php';
require_once $path . 'models/utils.php';
require_once $path . 'models/data.php';

$url = parse_url($_SERVER['REQUEST_URI']);
if(isset($url['query'])){
  parse_str($url['query'], $query);
}


// post для обработки запроса, потом все равно гет
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  switch ($url['path']) {
    case '/add':
      include_once $path . 'models/addLot.php';
      break;
    case '/login':
      include_once $path . 'models/login.php';
      break;
  }
}

if (isset($_GET['route'])) {
  switch ($url['path']) {
    case '/login':
      $login = renderPage($path . 'view/content/login.php', []);
      $html = renderPage($path . 'view/mainTemplate.php', ["content" => $login, 'categories' => getCategories()]);
      print ($html);
      break;
    case '/lot':
      include_once $path . 'controller/lot.php';
      break;
    case '/add':
      $addLotContent = renderPage($path . 'view/content/addLot.php', ['categories' => getCategories()]);
      $html = renderPage($path . 'view/mainTemplate.php', ["content" => $addLotContent, 'categories' => getCategories()]);
      print ($html);
      break;
    case '/history':
      include_once $path . 'models/history.php';
      break;
    case '/404':
      print('<h1>Sorry, but page not found. 404</h1>'); // todo сделать отдельную страницу.
      break;
  }
} else {
  $indexContent = renderPage($path . 'view/content/index-page.php', ["products" => getProducts(), 'categories' => getCategories()]);
  $html = renderPage($path . 'view/mainTemplate.php', ["content" => $indexContent, 'categories' => getCategories()]);

  print ($html);
}