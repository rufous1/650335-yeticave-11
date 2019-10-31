<?php
$is_auth = rand(0, 1);
$user_name = 'Дмитрий';

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$lots = [
  [
    'title' => '2014 Rossignol District Snowboard',
    'category' => $categories[0],
    'price' => 10999,
    'image' => 'img/lot-1.jpg',
    'lotTaimer' => '2019-11-04'
  ],
  [
    'title' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => $categories[0],
    'price' => 159999,
    'image' => 'img/lot-2.jpg',
    'date' => '2019-11-02'
  ],
  [
    'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'category' => $categories[1],
    'price' => 8000,
    'image' => 'img/lot-3.jpg',
    'date' => '2019-11-10'
  ],
  [
    'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => $categories[2],
    'price' => 10999,
    'image' => 'img/lot-4.jpg',
    'date' => '2019-11-22'
  ],
  [
    'title' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => $categories[3],
    'price' => 7500,
    'image' => 'img/lot-5.jpg',
    'date' => '2019-12-03'
  ],
  [
    'title' => 'Маска Oakley Canopy',
    'category' => $categories[5],
    'price' => 5400,
    'image' => 'img/lot-6.jpg',
    'date' => '2019-11-01'
  ]
];
?>
