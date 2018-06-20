<?php

function getCategories() {
  return $categories = ['Доски и лыжи', 'Крепления', 'Ботинки', ' Одежда', 'Инструменты', 'Разное'];
}

function getProducts() {
  return $products = [
    [
      'title' => '2014 Rossignol District Snowboard',
      'categoryId' => 0,
      'coast' => 10999,
      'imgUrl' => '/HTML_Academy/img/lot-1.jpg',
      'description' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
        снег
        мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
        снаряд
        отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
        кэмбер
        позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
        просто
        посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
        равнодушным.'
    ],
    ['title' => 'DC Ply Mens 2016/2017 Snowboard',
      'categoryId' => 0,
      'coast' => 15999,
      'imgUrl' => '/HTML_Academy/img/lot-2.jpg',
      'description' => 'Еще один хороший сноуборд. Описание 2'
    ],
    ['title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
      'categoryId' => 1,
      'coast' => 8000,
      'imgUrl' => '/HTML_Academy/img/lot-3.jpg',
      'description' => 'Лучшие крепления в своей серии. Описание 3'
    ],
    ['title' => 'Ботинки для сноуборда DC Mutiny Charocal',
      'categoryId' => 2,
      'coast' => 10999,
      'imgUrl' => '/HTML_Academy/img/lot-4.jpg',
      'description' => 'Удобные ботинки для сноуборда. Описание 4'
    ],
    ['title' => 'Куртка для сноуборда DC Mutiny Charocal',
      'categoryId' => 3,
      'coast' => 7500,
      'imgUrl' => '/HTML_Academy/img/lot-5.jpg',
      'description' => 'Теплая куртка. Описание 5'
    ],
    ['title' => 'Маска Oakley Canopy',
      'categoryId' => 5,
      'coast' => 5400,
      'imgUrl' => '/HTML_Academy/img/lot-6.jpg',
      'description' => 'Защитная маска, Описание 6'
    ]
  ];
}

function getUserData() {
    return[
      'is_auth' => (bool)rand(0, 1),
      'user_name' => 'Константин',
      'user_avatar' => 'HTML_Academy/img/user.jpg'
    ];
}

// ставки пользователей, которыми надо заполнить таблицу
function getBets(){
  return [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
  ];
}


// пользователи для аутентификации
function getUsers(){
  return [
    [
      'email' => 'ignat.v@gmail.com',
      'name' => 'Игнат',
      'password' => '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka'
    ],
    [
      'email' => 'kitty_93@li.ru',
      'name' => 'Леночка',
      'password' => '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa'
    ],
    [
      'email' => 'warrior07@mail.ru',
      'name' => 'Руслан',
      'password' => '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW'
    ]
  ];
}