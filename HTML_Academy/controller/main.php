<?php
require_once $path.'models/main.php';
require_once $path.'models/data.php';

var_dump($_GET);

if(isset($_GET['route'])){
  switch ($_GET['route']){
    case '/lot':

      break;
}
}else{
  $indexContent = renderPage($path.'view/content/index-page.php', ["products" => getProducts(), 'categories' => getCategories()]);
  $html = renderPage($path.'view/mainTemplate.php', ["content" => $indexContent, 'categories' => getCategories()]);

  print ($html);
}


