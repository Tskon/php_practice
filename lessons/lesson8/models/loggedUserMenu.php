<?php
function adminMenu()
{
    return "
<h3>Администратору:</h3>
<ul>
    <a href='/index.php/products/catalog/edit'><li>Каталог(ред)</li></a>
    <a href='/index.php/order/all_orders'><li>Все заказы</li></a>
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
