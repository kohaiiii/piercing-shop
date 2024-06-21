<?php
    $root = $_SERVER['DOCUMENT_ROOT'];

    include "$root/php/actions/bd.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/mdb.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="/js/jquery.js"></script>
    <title>BlackFly</title>
</head>
<body>
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/header.php";
    ?>
    <main class="catalog_block">
        <section><div class="py-3"></div></section>
        <section class="container">
            <form class="redact_paste d-flex flex-column justify-content-center align-items-center white_content rounded-3 py-3" action="/php/actions/add_goods.php" method="POST">
                    <p class="text-center">Наименование</p>
                    <input class="mb-5" type="text" name="name">
                    <p class="text-center">Описание</p>
                    <input class="mb-5" type="text" name="description">
                    <p class="text-center">Цена</p>
                    <input class="mb-5" type="number" name="price">
                    <p class="text-center">Изображение</p>
                    <input class="mb-5" type="text" name="img">
                    <p class="text-center">Категория</p>
                    <input class="mb-5" type="number" name="category">
                    <button type="submit" class="btn btn-redact btn-outline-dark rounded-5 my-3" data-mdb-ripple-init data-mdb-ripple-color="dark">Добавить</button>
                </div>
            </form>
        </section>
    </main>
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/footer.php";
    ?>
    <script src="/js/main2.js"></script>
    <script src="/js/mdb.umd.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>