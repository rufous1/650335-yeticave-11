<?php
require_once('init.php');
require_once('helpers.php');
require_once('functions.php');
require_once('data.php');

if (!$link) {
  print('Ошибка: Невозможно подключиться к MySQL ' . mysqli_connect_error());
} else {
  // отправляет SQL-запрос для получения списка категорий
  $sql = 'SELECT title, character_code FROM categories';
  $result = mysqli_query($link, $sql);

  if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    $error = mysqli_error($link);
    print('Ошибка ' . $error);
  }
  //параметр запроса
  $lotId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

  if (!$lotId) {
    http_response_code(404);
  }
  //отправляет SQL-запрос на чтение записи из таблицы с лотами, где id лота равен полученному из параметра запроса
  $sql = <<<SQL
SELECT lots.*, categories.title AS category, lot_images.image
FROM lots
LEFT JOIN categories ON lots.category_id = categories.id
LEFT JOIN lot_images ON lots.id = lot_images.lot_id
WHERE lots.id = $lotId;
SQL;
  $result = mysqli_query($link, $sql);

  if ($result) {
    $lots = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $pageContent = include_template('_lot.php', ['categories' => $categories, 'lots' => $lots]);
  } else {
    $error = mysqli_error($link);
    print('Ошибка ' . $error);
  }

  if (!mysqli_num_rows($result)) {
    $pageContent = include_template('_404.php', ['categories' => $categories]);
    http_response_code(404);
  }
}

$layoutContent = include_template('layout.php', [
  'content' => $pageContent,
  'categories' => $categories,
  'title' => '',
  'is_auth' => $is_auth,
  'user_name' => $user_name
]);

print($layoutContent);
 ?>
