<!doctype html>
<html lang="en">
<head>
    <?php

    $a = 5;
    $b = '05';
    var_dump($a == $b); // Почему true? Приведение к числу, нестрогое равенство
    var_dump((int)'012345'); // Почему 12345?  Приведение к числу, ноль не нужен, он отброшен
    var_dump((float)123.0 === (int)123.0); // Почему false? Строгое равенство, разные типы.
    var_dump((int)0 === (int)'hello, world'); // Почему true? Приведение к числу, во второй строке нет цифр, т.е. 0


    /* second part
    1. Используя имеющийся HTML шаблон, сделать так, чтобы главная страница генерировалась
    через PHP. Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий
    год генерировались в блоке контента из созданных переменных.
    2. *Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b =
        2, надо, чтобы получилось: b = 1, a = 2. Дополнительные переменные использовать нельзя.
    */
    $title = 'PHP lvl1 lesson1';
    $h1 = '<h1>Заголовок</h1>';
    $date = (date("l dS F Y"));

    $first = 1;
    $second = 2;
    $first = $first + $second -($second = $first);

    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
    <?php
    echo $h1;
    echo "<p>$date</p>";

    echo "первая $first вторая $second";

    ?>
</body>
</html>