<?php

    $surname = filter_var(trim($_POST['surname']),
    FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['phone']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);

    include('bd.php');

    $id = $_COOKIE['id'];

    $mysql->query("UPDATE `users` SET `name` = '$name', `surname` = '$surname', `phone` = '$phone', `email` = '$email' WHERE `users`.`id` = '$id';"); 

    $mysql->close();

    header('Location: /pages/account.php');
    
?>