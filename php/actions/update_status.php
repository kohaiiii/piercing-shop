<?php

    $id = filter_var(trim($_POST['id']),
    FILTER_SANITIZE_STRING);
    $status = filter_var(trim($_POST['status']),
    FILTER_SANITIZE_STRING);
    

    include('bd.php');

    $mysql->query("UPDATE `orders` SET `status` = '$status' WHERE `orders`.`id` = '$id';"); 

    $mysql->close();

    header('Location: /pages/account.php');
    
?>