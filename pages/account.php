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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="/css/mdb.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Подключение jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Подключение jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <title>BlackFly</title>
</head>
<body>
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/header.php";
    ?>
    <main class="catalog_block">
        <?php if($_COOKIE['role'] == 1): ?>
            <section class="container">
                <h2 class="pt-4 pb-3">Админ панель</h2>
                <div class="goods my-3 white_content rounded-3 p-3">
                    <h3 class="mb-3">Товары</h3>
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `goods`";
                        $result = mysqli_query($link, $sql); 
                    ?>
                    <div class="goods_table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">id</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Изобр.</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Удалить</th>
                                <th scope="col">Изменить</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)):?>
                                <tr>
                                    <th scope="row"><?=$row['id']?></th>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['description']?></td>
                                    <td><?=$row['price']?></td>
                                    <td><?=$row['img']?></td>
                                    <td><?=$row['category']?></td>
                                    <td><a style="color: red;" href="/php/actions/delete.php?id=<?=$row['id']?>">Удалить</a></td>
                                    <td><a href="/pages/redact.php?id=<?=$row['id']?>">Изменить</a></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                        <a href="/pages/add.php"><button type="button" class="btn btn-outline-dark" data-mdb-ripple-init data-mdb-ripple-color="dark">Добавить</button></a>

                    </div>
                    

                </div>

                <div class="users my-3 white_content rounded-3 p-3">
                    <h3 class="mb-3">Пользователи</h3>
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($link, $sql); 
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">id</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Фамилия</th>
                            <th scope="col">Email</th>
                            <th scope="col">Телефон</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)):?>
                            <tr>
                                <th scope="row"><?=$row['id']?></th>
                                <td><?=$row['name']?></td>
                                <td><?=$row['surname']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['phone']?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="orders_admin my-3   white_content rounded-3 p-3">
                    <h3 class="mb-3">Заказы</h3>
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `orders`";
                        $result = mysqli_query($link, $sql); 
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">№</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Пользователь</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Товар</th>
                            <th scope="col">Количество</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)):?>
                            <tr>
                                <th scope="row"><?=$row['id']?></th>
                                <td><?=$row['address']?></td>
                                <td>
                                <?php if($row['status'] == 1): ?>
                                <a href="/php/actions/upd_status.php?id=<?=$row['id']?>"><p>В сборке</p></a>
                                <?php elseif($row['status'] == 2): ?>
                                <a href="/php/actions/upd_status.php?id=<?=$row['id']?>"><p>Отправлен</p></a>
                                <?php elseif($row['status'] == 3): ?>
                                <a href="/php/actions/upd_status.php?id=<?=$row['id']?>"><p>Отменён</p></a>
                                <?php elseif($row['status'] == 4): ?>
                                <a href="/php/actions/upd_status.php?id=<?=$row['id']?>"><p>Доставлен</p></a>
                                <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                        $user = $row['user_id'];
                                        $user_query = $mysql->query("SELECT * FROM `users` WHERE `id` = '$user'");
                                        $user_search = mysqli_fetch_assoc($user_query);
                                    ?>
                                <?=$user_search['email']?>
                                </td>
                                <td><?=$row['date']?></td>
                                <td><?=$row['price']?></td>
                                <td>
                                    <?php
                                        $good = $row['goods_id'];
                                        $goods_query = $mysql->query("SELECT * FROM `goods` WHERE `id` = '$good'");
                                        $goods_search = mysqli_fetch_assoc($goods_query);
                                    ?>
                                    <?=$goods_search['name']?>
                                </td>
                                <td><?=$row['count']?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mailing_admin my-3   white_content rounded-3 p-3">
                    <h3 class="mb-3">Пользователи подписавшиеся на рассылку</h3>
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `mailing`";
                        $result = mysqli_query($link, $sql); 
                    ?>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="fw-bold">Имя</th>
                                <th scope="col" class="fw-bold">Email адрес</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)):?>
                            <tr>
                                <th><?=$row['name']?></th>
                                <td><?=$row['email']?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                    <div class="mt-5 d-flex justify-content-center">
                        <a href="/php/actions/exit.php"><button type="button" class="btn btn-outline-dark" data-mdb-ripple-init data-mdb-ripple-color="dark">Выйти</button></a>
                    </div>   

            </section>
        <?php else: ?>
        <section class="container">
            <h2 class="pt-5 pb-3">Личный кабинет</h2>
            <div class="row my-3">
                <div class="col-12 col-lg-3">
                    <!-- Tab navs -->
                    <div
                    class="nav flex-column nav-pills text-center"
                    id="v-pills-tab"
                    role="tablist"
                    aria-orientation="vertical"
                    >
                    <a
                        data-mdb-pill-init
                        class="nav-link active tabs_btn_account"
                        id="v-pills-home-tab"
                        href="#v-pills-home"
                        role="tab"
                        aria-controls="v-pills-home"
                        aria-selected="true"
                        >Контактная информация</a
                    >
                    <a
                        data-mdb-pill-init
                        class="nav-link tabs_btn_account"
                        id="v-pills-profile-tab"
                        href="#v-pills-profile"
                        role="tab"
                        aria-controls="v-pills-profile"
                        aria-selected="false"
                        >Адрес доставки</a
                    >
                    <a
                        data-mdb-pill-init
                        class="nav-link tabs_btn_account"
                        id="v-pills-messages-tab"
                        href="#v-pills-messages"
                        role="tab"
                        aria-controls="v-pills-messages"
                        aria-selected="false"
                        >История заказов</a
                    >
                    </div>
                    <!-- Tab navs -->
                </div>

                <div class="col-12 col-lg-9">
                    <!-- Tab content -->
                    <div class="tab-content" id="v-pills-tabContent">
                    <div
                        class="tab-pane fade show active  -strong border-5 p-3 rounded-3 white_content shadow-sm"
                        id="v-pills-home"
                        role="tabpanel"
                        aria-labelledby="v-pills-home-tab"
                    >
                        <h3>Контактная информация</h3>
                        <div class="my-3">
                            <?php

                                $mysql = new mysqli('localhost', 'root', '', 'blackfly');
                                                                
                                $id = $_COOKIE['id'];
                                $result = $mysql->query("SELECT * FROM `users` WHERE `id` = '$id'");
                                $info_users = $result->fetch_assoc();
                            ?>
                            <form class="account_form my-3 row" action="/php/actions/personal_info.php" method="POST">
                                <div class="col-12 col-md-6 mb-5">
                                    <input type="text" placeholder="ФАМИЛИЯ" name="surname" value="<?=$info_users['surname']?>">
                                </div>
                                <div class="col-12 col-md-6 mb-5">
                                    <input type="text" placeholder="ИМЯ" name="name" value="<?=$info_users['name']?>">
                                </div>
                                <div class="col-12 col-md-6 mb-5">
                                    <input type="text" placeholder="+7 (___) ___-__-__" id="phone" name="phone" value="<?=$info_users['phone']?>">
                                </div>
                                <div class="col-12 col-md-6 mb-5">
                                    <input type="email" placeholder="EMAIL" name="email" value="<?=$info_users['email']?>">
                                </div>
                                <div class="d-flex mt-1 btn_acc row row-cols-1 row-cols-lg-3">
                                    <div class="col mb-1">
                                        <button type="submit" class="btn btn-outline-dark btn-rounded" data-mdb-ripple-init  data-mdb-ripple-color="dark">Сохранить</button>
                                    </div>
                                    <div class="col mb-1">
                                        <a href="/php/actions/exit.php"><button type="button" class="btn btn-outline-dark btn-rounded" data-mdb-ripple-init  data-mdb-ripple-color="dark">Выйти</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade  -strong border-5 p-3 rounded-3 white_content shadow-sm"
                        id="v-pills-profile"
                        role="tabpanel"
                        aria-labelledby="v-pills-profile-tab"
                    >
                    <div class="d-flex flex-column">
                        <h3>Адрес доставки</h3>
                        <div>
                            <?php

                                $mysql = new mysqli('localhost', 'root', '', 'blackfly');
                                                                
                                $id = $_COOKIE['id'];
                                $result = $mysql->query("SELECT * FROM `address` WHERE `user` = '$id'");
                                $user_address = $result->fetch_assoc();

                                if($user_address == ''):

                            ?>
                            <form class="account_form my-3 row" action="/php/actions/address.php" method="POST">
                                <div class="col-12 col-md-6 mb-3">
                                    <p>Город</p>
                                    <input type="text" placeholder="ГОРОД" name="city">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <p>Улица</p>
                                    <input type="text" placeholder="УЛИЦА" name="street">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <p>Дом</p>
                                    <input type="text" placeholder="ДОМ" name="house">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <p>Квартира</p>
                                    <input type="text" placeholder="КВАРТИРА" name="flat">
                                </div>
                                <div class="d-flex mt-4 btn_acc">
                                    <button type="submit" class="btn btn-outline-dark btn-rounded me-3" data-mdb-ripple-init  data-mdb-ripple-color="dark">Сохранить</button>
                                </div>
                            </form>
                            <?php else: ?>
                                <form class="account_form my-3 row" action="/php/actions/upd_address.php" method="POST">
                                    <div class="col-12 col-md-6 mb-3">
                                        <p>Город</p>
                                        <input type="text" placeholder="ГОРОД" name="city" value="<?=$user_address['city']?>">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <p>Улица</p>
                                        <input type="text" placeholder="УЛИЦА" name="street" value="<?=$user_address['street']?>">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <p>Дом</p>
                                        <input type="text" placeholder="ДОМ" name="house" value="<?=$user_address['house']?>">
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <p>Квартира</p>
                                        <input type="text" placeholder="КВАРТИРА" name="flat" value="<?=$user_address['flat']?>">
                                    </div>
                                    <div class="d-flex mt-4 btn_acc">
                                        <button type="submit" class="btn btn-outline-dark btn-rounded me-3" data-mdb-ripple-init  data-mdb-ripple-color="dark">Сохранить</button>
                                    </div>
                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                    </div>
                    <div class="tab-pane fade border-5 rounded-3 white_content shadow-sm"
                        id="v-pills-messages"
                        role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">
                        <?php 

                        $mysql = new mysqli('localhost', 'root', '', 'blackfly');          
                        $id = $_COOKIE['id'];
                        $result = $mysql->query("SELECT * FROM `orders` WHERE `user_id` = '$id'");
                        $orders = $result->fetch_assoc();

                        if($orders == ''):

                        ?>
                        <h2 class="text-center py-5">Заказов нет</h2>
                        <?php else: ?>
                        <?php while ($orders = mysqli_fetch_array($result)):?>
                        <div class="row orders -strong p-3 m-0">
                            <div class="col-6">
                                <p class="fw-bold">Заказ №<?=$orders['id']?> от <?=$orders['date']?></p>
                            </div>
                            <div class="col-6">
                                <?php if($orders['status'] == 1): ?>
                                <p class="fw-bold">Статус: В сборке</p>
                                <?php elseif($row['status'] == 2): ?>
                                <p class="fw-bold">Статус: Отправлен</p>
                                <?php elseif($row['status'] == 3): ?>
                                <p class="fw-bold">Статус: Отменён</p>
                                <?php elseif($row['status'] == 4): ?>
                                <p class="fw-bold">Статус: Доставлен</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-12">
                                <p>Ожидаемая дата доставки: 29.06.2024</p>
                            </div>
                            <div class="col-12">
                                <p>Адрес: <?=$orders['address']?></p>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    </div>
                    <!-- Tab content -->
                </div>
            </div>
        </section>
        <?php endif; ?>
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