<?php
require_once $path.'models/main.php';
require_once $path.'models/data.php';

$mainTemplate=requireToVar($path.'view/mainTemplate.php');
$content=requireToVar($path.'view/content/index-page.php');

$indexContent = renderPage($content, ["products" => getProducts(), 'categories' => getCategories()]);
$html = renderPage($mainTemplate, ["content" => $indexContent]);

print ($html);