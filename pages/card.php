<?php
    session_start(); 
    $root = $_SERVER['DOCUMENT_ROOT'];

    include "$root/php/actions/bd.php";
    
    $result = $mysql->query("SELECT * FROM `goods`");
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
        <section class="container d-flex row -strong align-items-center white_content rounded-3 mx-auto mt-4 shadow-sm">
            <?php
                $goods_id = $_GET['id'];
                $cards = $mysql->query("SELECT * FROM `goods` WHERE `id` = '$goods_id'");
                $card = mysqli_fetch_assoc($cards);
            ?>
            <div class="img_card p-5 col-12 col-lg-6">
                <img src="<?=$card['img']?>" alt="goods_card">
            </div>
            <div class="info_card p-2 py-3 col-12 col-lg-6">
                <h2><?=$card['name']?></h2>
                <p><?=$card['description']?></p>
                <hr class="card_hr">
                <h3><?=$card['price']?> ₽</h3>

                <div class="info_card_goods">

                    <div class="my-3">
                        <p id="da">Цвет</p>
                        <div class="btn_info_card">
                            <button type="button" id="btn_card" class="btn btn-light active_card" data-mdb-ripple-init>Белый</button>
                            <button type="button" id="btn_card1" class="btn btn-light" data-mdb-ripple-init data-mdb-ripple-color="dark">Черный</button>
                        </div>
                    </div>

                    <div class="my-3">
                        <p>Толщина</p>
                        <div class="btn_info_card">
                            <button type="button" id="btn_card2" class="btn btn-light" data-mdb-ripple-init>0.8 мм</button>
                            <button type="button" id="btn_card3" class="btn btn-light active_card" data-mdb-ripple-init>1.2 мм</button>
                            <button type="button" id="btn_card4" class="btn btn-light" data-mdb-ripple-init>1.6 мм</button>
                        </div>
                    </div>
                    
                    <hr class="card_hr">

                    <!-- cart logic noauth user -->
                    <?php if($_COOKIE['id'] == ''): ?>
                    <h4>Для покупки необходимо авторизоваться</h4>
                    <?php else: ?>
                    <div class="payment_card d-flex align-items-center">
                        <div class="counter_card d-flex me-3">
                            <button id="decrement">-</button>
                            <div id="count">0</div>
                            <button id="increment">+</button>
                            <input type="hidden" id="maxCount" value="<?=$card['count']?>">
                        </div>
                        <!-- cart logic links good -->
                        <form action="#" method="POST">
                        <?php 
                        if (isset($_SESSION['cart-list'])):
                            $checked = false;

                            foreach($_SESSION['cart-list'] as $value):
                                if ($value['id'] == $card['id']){
                                    $checked = true;
                                }
                            endforeach;
                                
                            if ($checked): ?>
                                <a href="/pages/cart.php"><button type="button" class="me-3 btn btn-dark btn_from_card" data-mdb-ripple-init>Добавлено</button></a>                          
                            <?php else: ?>
                                <a href="/pages/cart.php?goods_add_id=<?=$card['id']?>"><button type="button" class="me-3 btn btn-dark btn_from_card" data-mdb-ripple-init>в корзину</button></a>
                            <?php endif;

                            else: ?>
                                <a href="/pages/cart.php?goods_add_id=<?=$card['id']?>"><button type="button" class="me-3 btn btn-dark btn_from_card" data-mdb-ripple-init>в корзину</button></a>
                        <?php endif; ?>


                        </form>
                        <div class="icon_goods_cart p-2">
                            <a href="/php/actions/create_favor.php?id=<?=$card['id']?>"><img src="/img/black1.svg" alt="heart"></a>
                        </div>
                    <?php endif; ?>
                        
                    </div>
                </div>

            </div>
        </section>
        <section class="container intert_goods mt-5">
            <h2>Вас может заинтересовать</h2>
                <div class="popular_goods container my-2">

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
                                    <a href="#"><img src="/img/black1.svg" alt="heart"></a>
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
            </div>
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