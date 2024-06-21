<?php

    setcookie('id', $user['id'], time() - 3600, '/');
    setcookie('surname', $user['surname'], time() - 3600, '/');
    setcookie('email', $user['email'], time() - 3600, '/');
    setcookie('role', $user['role'], time() - 3600, '/');

    header('Location: /');

?>