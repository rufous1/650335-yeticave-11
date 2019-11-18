<?php
require_once('helpers.php');
require_once('functions.php');
require_once('data.php');

$link = mysqli_connect('localhost', 'root', '', 'yeticave');
mysqli_set_charset($link, 'utf8');

if (!$link) {
  print('Ошибка: Невозможно подключиться к MySQL ' . mysqli_connect_error());
} else {
  // отправляет SQL-запрос для получения списка новых лотов
  $sql = <<<SQL
SELECT lots.title, first_price AS price, date_end, lot_images.image AS image, categories.title AS category FROM lots
LEFT JOIN categories ON lots.category_id = categories.id
LEFT JOIN lot_images ON lots.id = lot_images.lot_id
WHERE date_end > NOW()
ORDER BY lots.date_add DESC
SQL;
  $result = mysqli_query($link, $sql);

  if ($result) {
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    $error = mysqli_error($link);
    print('Ошибка ' . $error);
  }

  // отправляет SQL-запрос для получения списка категорий
  $sql = 'SELECT title, character_code FROM categories';
  $result = mysqli_query($link, $sql);

  if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    $error = mysqli_error($link);
    print('Ошибка ' . $error);
  }
}

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
