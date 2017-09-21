<?php

if (@$_POST['type'] == 'delItem') {
    $id = (int)preg_replace("/[^0-9]/", '', $_POST['id']);
    $sql = "DELETE FROM `products` WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}

if (@$_POST['type'] == 'createItem') {
    $name = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['name'])));
    $coast = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['coast'])));
    $coast = (int)preg_replace("/[^0-9]/", '', $coast);
    $descr = mysqli_real_escape_string($link, (string)htmlspecialchars(strip_tags($_POST['descr'])));

    $sql = "INSERT INTO `products`(`name`, `coast`, `description`)
 VALUES ('$name',$coast,'$descr')";
    echo $coast;
    mysqli_query($link, $sql);
}