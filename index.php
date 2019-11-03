<?php
require_once('helpers.php');
require_once('functions.php');
require_once('data.php');

$pageContent = include_template('main.php', [
  'categories' => $categories,
  'lots' => $lots
]);
$layoutContent = include_template('layout.php', [
  'content' => $pageContent,
  'categories' => $categories,
  'title' => 'YetiCave - Главная страница',
  'is_auth' => $is_auth,
  'user_name' => $user_name
]);

print($layoutContent);
?>
