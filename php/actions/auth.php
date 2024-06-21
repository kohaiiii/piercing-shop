<?php
    $email = filter_var(trim($_POST['email']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

    $pass = md5($pass."blackfly");

    include('bd.php');

    $result = $mysql->query("SELECT * FROM `users` WHERE `email`= '$email' AND `pass` = '$pass'");

    $user = $result->fetch_assoc();

    setcookie('id', $user['id'], time() + 3600, '/');
    setcookie('email', $user['email'], time() + 3600, '/');
    setcookie('surname', $user['surname'], time() + 3600, '/');
    setcookie('role', $user['role'], time() + 3600, '/');

    $mysql->close();

    header('Location: /');
?>