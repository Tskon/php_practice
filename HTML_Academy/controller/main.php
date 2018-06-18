<?php
require_once $path.'models/main.php';
require_once $path.'models/data.php';

$indexContent = renderPage($path.'view/content/index-page.php', ["products" => getProducts(), 'categories' => getCategories()]);
$html = renderPage($path.'view/mainTemplate.php', ["content" => $indexContent, 'categories' => getCategories()]);

print ($html);