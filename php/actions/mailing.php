<?php

    session_start();

    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);

    $pass = md5($pass."blackfly");

    include('bd.php');

    $mysql->query("INSERT INTO `mailing` (`name`, `email`) VALUES ('$name', '$email');"); 

    $_SESSION['callback'] = 'Вы подписались на рассылку!';
    $_SESSION['callback_time'] = time();

    $mysql->close();

    header('Location: /');
    
?>