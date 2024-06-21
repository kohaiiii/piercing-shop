<?php

    $id = $_GET['id'];
    $user = $_COOKIE['id'];

    include('bd.php');

    $mysql->query("INSERT INTO `favorites` (`id_goods`, `id_user`) VALUES ('$id', '$user');"); 

    $mysql->close();

    header('Location: /pages/favor.php');
    
?>