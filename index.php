<?php
require_once('helpers.php');
require_once('functions.php')
require_once('categories.php');
require_once('lots.php');

$pageContent = include_template('main.php', ['categories' => $categories, 'lots' => $lots]);
$layoutContent = include_template('layout.php', [
  'content' => $pageContent,
  'categories' => $categories,
  'title' => 'YetiCave - Главная страница'
]);

print($layoutContent);
?>
