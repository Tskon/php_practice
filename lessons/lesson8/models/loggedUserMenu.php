<?php
function adminMenu()
{
    return "
<h3>Администратору:</h3>
<ul>
    <a href='#'><li>Каталог(ред)</li></a>
    <a href='#'><li>Заказы</li></a>
</ul>
    ";
}

function userMenu()
{
    return "
<ul>
    <a href='#'><li>Заказы пользователя</li></a>
</ul>
    ";
}
