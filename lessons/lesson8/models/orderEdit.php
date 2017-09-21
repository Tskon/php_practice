<?php

if (@$_POST['type'] == 'delOrder') {
    $id = (int)preg_replace("/[^0-9]/", '', $_POST['id']);
    $sql = "DELETE FROM `orders` WHERE `id` = '$id'";
    mysqli_query($link, $sql);
}