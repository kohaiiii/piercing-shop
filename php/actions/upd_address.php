<?php

    $city = filter_var(trim($_POST['city']),
    FILTER_SANITIZE_STRING);
    $street = filter_var(trim($_POST['street']),
    FILTER_SANITIZE_STRING);
    $house = filter_var(trim($_POST['house']),
    FILTER_SANITIZE_STRING);
    $flat = filter_var(trim($_POST['flat']),
    FILTER_SANITIZE_STRING);

    include('bd.php');

    $id = $_COOKIE['id'];

    $mysql->query("UPDATE `address` SET `city` = '$city', `street` = '$street', `house` = '$house', `flat` = '$flat' WHERE `address`.`user` = '$id';"); 

    $mysql->close();

    header('Location: /pages/account.php');
    
?>