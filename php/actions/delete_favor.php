<?php

    $id = $_GET['id'];
    $user = $_COOKIE['id'];

    include('bd.php');

    $mysql->query("DELETE FROM favorites WHERE `id_goods` = '$id' AND `id_user` = '$user'"); 

    $mysql->close();

    header('Location: /pages/favor.php');
    
?>