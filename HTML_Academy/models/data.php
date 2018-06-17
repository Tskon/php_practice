<?php
function getCategories() {
  return $categories = ['Доски и лыжи', 'Крепления', 'Ботинки', ' Одежда', 'Инструменты', 'Разное'];
}

function getProducts() {
  return $products = [
    ['title' => '2014 Rossignol District Snowboard', 'categoryId' => 0, 'coast' => 10999, 'imgUrl' => 'img/lot-1.jpg'],
    ['title' => 'DC Ply Mens 2016/2017 Snowboard', 'categoryId' => 0, 'coast' => 15999, 'imgUrl' => 'img/lot-2.jpg'],
    ['title' => 'Крепления Union Contact Pro 2015 года размер L/XL', 'categoryId' => 1, 'coast' => 8000, 'imgUrl' => 'img/lot-3.jpg'],
    ['title' => 'Ботинки для сноуборда DC Mutiny Charocal', 'categoryId' => 2, 'coast' => 1099900, 'imgUrl' => 'img/lot-4.jpg'],
    ['title' => 'Куртка для сноуборда DC Mutiny Charocal', 'categoryId' => 3, 'coast' => 7500, 'imgUrl' => 'img/lot-5.jpg'],
    ['title' => 'Маска Oakley Canopy', 'categoryId' => 5, 'coast' => 5400, 'imgUrl' => 'img/lot-6.jpg']
  ];
}

function getUserData() {
    return[
      'is_auth' => (bool)rand(0, 1),
      'user_name' => 'Константин',
      'user_avatar' => 'img/user.jpg'
    ];
}