<?php
// функция форматирования цены товара
function formatPrice(int $number): string {
  $number = ceil($number);
  $formatNumber = ($number < 1000) ? $number : number_format($number, 0, '.', ' ');

  return $formatNumber . ' ₽';
}
