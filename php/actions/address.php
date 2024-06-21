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

    $mysql->query("INSERT INTO `address` (`user`, `city`, `street`, `house`, `flat`) VALUES ('$id', '$city', '$street', '$house', '$flat');"); 

    $mysql->close();

    header('Location: /pages/account.php');
    
?>