<?php

    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

    $pass = md5($pass."blackfly");

    include('bd.php');

    $mysql->query("INSERT INTO `users` (`name`, `email`, `pass`, `role`, `surname`, `phone`) VALUES ('$name', '$email', '$pass', 2, '', '')"); 

    $mysql->close();

    header('Location: /');
    
?>