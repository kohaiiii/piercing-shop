<?php

    $id = $_GET['id'];

    include('bd.php');

    $mysql->query("DELETE FROM goods WHERE `goods`.`id` = '$id'"); 

    $mysql->close();

    header('Location: /pages/account.php');
    
?>