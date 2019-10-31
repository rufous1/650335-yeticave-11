<?php
// функция форматирования цены товара
function formatPrice(int $number): string {
  $number = ceil($number);
  $formatNumber = ($number < 1000) ? $number : number_format($number, 0, '.', ' ');

  return $formatNumber . ' ₽';
}

// функция подсчета оставшегося времени
function lotTimeRemaining($timeEnd) {
  date_default_timezone_set('Europe/Moscow');
  setlocale(LC_ALL, 'ru_RU');

  $endTimestamp = strtotime($timeEnd);
  $secsToEnd = $endTimestamp - time();

  $hours = str_pad(floor($secsToEnd / 3600), 2, '0', STR_PAD_LEFT);
  $minutes = str_pad(floor(($secsToEnd % 3600) / 60), 2, '0', STR_PAD_LEFT);
  $timeCount = $hours . ' : ' . $minutes;

  return $timeCount;
}
?>
