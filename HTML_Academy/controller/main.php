<?php
require_once '../models/main.php';
require_once '../models/data.php';

$mainTemplate=requireToVar('../view/mainTemplate.php');
$content=requireToVar('../view/content/index-page.php');

$indexContent = renderPage($content, ["products" => getProducts(), 'categories' => getCategories()]);
$html = renderPage($mainTemplate, ["content" => $indexContent]);

print ($html);

