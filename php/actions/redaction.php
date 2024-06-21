<?php

    $id = filter_var(trim($_POST['id']),
    FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $description = filter_var(trim($_POST['description']),
    FILTER_SANITIZE_STRING);
    $price = filter_var(trim($_POST['price']),
    FILTER_SANITIZE_STRING);
    $img = filter_var(trim($_POST['img']),
    FILTER_SANITIZE_STRING);
    $category = filter_var(trim($_POST['category']),
    FILTER_SANITIZE_STRING);

    include('bd.php');

    $mysql->query("UPDATE `goods` SET `name` = '$name', `description` = '$description', `price` = '$price', `img` = '$img', `category` = '$category' WHERE `goods`.`id` = '$id';"); 

    $mysql->close();

    header('Location: /pages/account.php');
    
?>