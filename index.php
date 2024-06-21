<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="/js/jquery.js"></script>
    <title>BlackFly</title>
</head>
<body class="body_main">
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/header_main.php";
    ?>
    <main>
        <section class="bg d-flex flex-column justify-content-between align-items-center">
            <div></div>
            <div class="container d-flex flex-column justify-content-center">
                <div class="banner text-light">
                    <img src="img/banner_text.svg" class="img-fluid" alt="">
                    <button type="button" class="btn bnt_index btn-outline-light rounded-5" data-mdb-ripple-init data-mdb-ripple-color="dark"><a href="pages/catalog.php" style="color: white;">В КАТАЛОГ</a></button>
                </div>
            </div>
            <div class="arrow_block">
                <img src="/img/solar_arrow-down-broken.svg" alt="arrow">
            </div>
        </section>
        <!-- Каталог -->
        <section class="pre_catalog container">
            <div class="newgoods">
                <div class="text_goods text-black mt-3 d-flex justify-content-between">
                    <h4 class="h3">Новинки</h4>
                    <a class="all_goods_href" href="../pages/catalog.php"><h5>Смотреть все</h5></a>
                </div>
                <!-- first row start -->
                <div class="row pre_catalog_row_index">
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `goods` WHERE `category` = 2";
                        $result = mysqli_query($link, $sql); 
                    ?>
                    <?php while ($row = mysqli_fetch_array($result)):?>
                    <div class="col-lg-3 col-sm-6 col-xs-12 mt-3">
                        <!-- gooods_card -->
                        <div class="card p-3 h-100">
                            <div class="card_header d-flex justify-content-between">
                                <img src="/img/new.svg" alt="new">
                                <a href="/php/actions/create_favor.php?id=<?=$row['id']?>"><img src="/img/black1.svg" alt="heart"></a>
                            </div>
                            <div class="card_body my-5" style="margin: 0 auto;">
                                <a href="/pages/card.php?id=<?=$row['id']?>"><img src="<?=$row['img']?>" alt="goods" class="img-fluid"></a>
                            </div>
                            <div class="card_footer">
                                <h5><?=$row['name']?></h5>
                                <h4><?=$row['price']?> ₽</h4>
                            </div>
                        </div>
                        <!-- /goods_card -->
                    </div>
                    <?php endwhile; ?>
                </div>
                <!-- first row end -->
            </div>
            <div class="popular_goods container">
                <div class="text_goods text-black mt-4 d-flex justify-content-between">
                   <h4 class="h3">Популярное</h4>
                    <a class="all_goods_href" href="../pages/catalog.php"><h5>Смотреть все</h5></a>
                </div>
                <!-- second row start -->
                <div class="row pre_catalog_row_index_second">
                    
                    <?php
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `goods` WHERE `category` = 3";
                        $result = mysqli_query($link, $sql); 
                    ?>
                    <?php while ($row = mysqli_fetch_array($result)):?>
                    <div class="col-lg-3 col-sm-6 col-xs-12 mt-3">
                        <!-- gooods_card -->
                        <div class="card p-3 h-100">
                            <div class="card_header d-flex justify-content-between">
                                <img src="/img/hot.svg" alt="new">
                                <a href="/php/actions/create_favor.php?id=<?=$row['id']?>"><img src="/img/black1.svg" alt="heart"></a>
                            </div>
                            <div class="card_body my-5" style="margin: 0 auto;">
                                <a href="/pages/card.php?id=<?=$row['id']?>"><img src="<?=$row['img']?>" alt="goods" class="img-fluid"></a>
                            </div>
                            <div class="card_footer">
                                <h5><?=$row['name']?></h5>
                                <h4><?=$row['price']?> ₽</h4>
                            </div>
                        </div>
                        <!-- /goods_card -->
                    </div>
                    <?php endwhile; ?>
                </div>
                <!-- second row end -->
            </div>
        </section>
        <section class="container resale_block d-flex justify-content-start flex-column p-3 shadow-sm rounded-3">
            <h2>Будьте в курсе предложений и распродаж</h2>
            <div>
            <?php if($_SESSION['callback_time'] == ''): ?>
                <form class="message_paste mt-3 row" action="/php/actions/mailing.php" method="POST">
                    <div class="col-12 col-sm-6 mb-3">
                        <input type="text" placeholder="ВАШЕ ИМЯ" name="name">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <input class="col-6" type="email" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" name="email">
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <p class="text-uppercase">подписываясь на рассылку вы соглашаетесь с <a class="text_link" href="#">нашей политикой конфиденциальности</a></p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <button type="submit" class="btn btn-outline-dark rounded-5 col-6" data-mdb-ripple-init data-mdb-ripple-color="dark">Подписаться</button>
                    </div>
                </form>
            <?php else: ?>
                <?php if (isset($_SESSION['callback']) && isset($_SESSION['callback_time'])) {
                            $session_lifetime = 60; 
                            $current_time = time();

                            if ($current_time - $_SESSION['callback_time'] > $session_lifetime) {
                                unset($_SESSION['callback']);
                                unset($_SESSION['callback_time']);
                            } else {
                                echo '<h3 class="add_mailing">'.$_SESSION['callback'].'</h3>';
                            }}  ?>
            <?php endif; ?>
            </div>
        </section>
        <section class="container info_block shadow-sm rounded-3">
            <!-- Accordion start -->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accord_header rounded-3"><h2>Полезная информация</h2></div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button
                        data-mdb-collapse-init
                        class="accordion-button collapsed"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#flush-collapseOne"
                        aria-expanded="false"
                        aria-controls="flush-collapseOne"
                    >
                        <h5>Как узнать размер кольца?</h5>
                    </button>
                    </h2>
                    <div
                    id="flush-collapseOne"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingOne"
                    data-mdb-parent="#accordionFlushExample"
                    >
                    <div class="accordion-body">
                    Нужно взять плотную нить, шнурок или тонкую ленту. Пятикратно обмотать ее вокруг основания пальца достаточно плотно, но не перетягивая. Так, чтобы обмотка беспрепятственно проходила через фаланг пальца. "Лишние" концы в месте пересечения обрезаются. Отрезок, которым был обмотан палец, замеряют линейкой, исчисляют в миллиметрах, цифру делят на 15.7. Полученный показатель соответствует размеру кольца.
                    </div>
                    </div>
                    
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                    <button
                        data-mdb-collapse-init
                        class="accordion-button collapsed"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#flush-collapseTwo"
                        aria-expanded="false"
                        aria-controls="flush-collapseTwo"
                    >
                        <h5>Есть ли у вас доставка по всему миру?</h5>
                    </button>
                    </h2>
                    <div
                    id="flush-collapseTwo"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingTwo"
                    data-mdb-parent="#accordionFlushExample"
                    >
                    <div class="accordion-body">
                    На данный момент мы осуществляем доставку только в Россию, Казахстан и Беларусь. Стоимость и сроки доставки зависят от вашего местоположения и будут рассчитаны при оформлении заказа.
                    </div>
                    </div>
                
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                    <button
                        data-mdb-collapse-init
                        class="accordion-button collapsed"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#flush-collapseThree"
                        aria-expanded="false"
                        aria-controls="flush-collapseThree"
                    >
                        <h5>Могу ли я вернуть или обменять украшение?</h5>
                    </button>
                    </h2>
                    <div
                    id="flush-collapseThree"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingThree"
                    data-mdb-parent="#accordionFlushExample"
                    >
                    <div class="accordion-body">
                    Да, вы можете вернуть или обменять украшение в течение 14 дней с момента получения заказа. Украшение должно быть в оригинальной упаковке и без следов носки. Для оформления возврата свяжитесь с нашей службой поддержки.
                    </div>
                    </div>
                
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button
                            data-mdb-collapse-init
                            class="accordion-button collapsed"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#flush-collapseFour"
                            aria-expanded="false"
                            aria-controls="flush-collapseFour"
                        >
                            <h5>Можно ли заказать индивидуальное украшение?</h5>
                        </button>
                    </h2>
                    <div
                    id="flush-collapseFour"
                    class="accordion-collapse collapse"
                    aria-labelledby="flush-headingFour"
                    data-mdb-parent="#accordionFlushExample"
                    >
                        <div class="accordion-body">
                        Да, мы предлагаем услуги по изготовлению украшений на заказ. Свяжитесь с нами через форму обратной связи или по электронной почте, чтобы обсудить детали и получить консультацию.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion end -->
        </section>
        <section class="container">
            <div class="good_order shadow-sm d-flex justify-content-between align-items-center p-3 mx-2 rounded-5">
                <h3 class="h3_good">Есть вопросы по оформлению заказа?</h3>
                <button type="button" class="btn btn_good_order btn-outline-dark rounded-5" data-mdb-ripple-init data-mdb-ripple-color="dark">Связаться с нами</button>
            </div>
        </section>
    </main>
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/footer.php";
    ?>
    <script src="/js/main2.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/mdb.umd.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>