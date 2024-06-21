<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mdb.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.js"></script>
    <title>BlackFly</title>
</head>
<body>
    <?php
        $root = $_SERVER['DOCUMENT_ROOT'];

        include "$root/php/modules/header.php";
    ?>
    <main class="catalog_block">
        <section class="container">
            <h2 class="pt-4 pb-3">Каталог</h2>

            <!-- Pills navs -->
            <ul class="catalog-nav nav nav-pills" id="ex2" role="tablist">
                <li class="nav-item" role="presentation">
                    <a data-mdb-pill-init class="nav-link active tabs_btn shadow-sm" id="ex2-tab-1"  href="#ex2-pills-1" role="tab" aria-controls="ex2-pills-1" aria-selected="true">Штанги</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a data-mdb-pill-init class="nav-link tabs_btn shadow-sm" id="ex2-tab-2" href="#ex2-pills-2" role="tab" aria-controls="ex2-pills-2" aria-selected="false">Накрутки</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a data-mdb-pill-init class="nav-link tabs_btn shadow-sm" id="ex2-tab-3" href="#ex2-pills-3" role="tab" aria-controls="ex2-pills-3" aria-selected="false">Кликеры</a>
                </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content" id="ex2-content">
            <div
                class="tab-pane fade show active"
                id="ex2-pills-1"
                role="tabpanel"
                aria-labelledby="ex2-tab-1"
            >
                <div class="cards_collection">

                    <div class="row">

                        <?php
                            $link = mysqli_connect("localhost", "root", "", "blackfly");
                            $sql = "SELECT * FROM `goods` WHERE `category` = 1";
                            $result = mysqli_query($link, $sql); 
                        ?>
                        <?php while ($row = mysqli_fetch_array($result)):?>
                        <div class="col-lg-3 col-sm-6 col-xs-12 mt-3">
                            <!-- gooods_card -->
                        <div class="card p-3 h-100">
                            <div class="card_header d-flex justify-content-between">
                                <div></div>
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
                    
                </div>
            </div>
            <div class="tab-pane fade" id="ex2-pills-2" role="tabpanel" aria-labelledby="ex2-tab-2">
                
            <div class="cards_collection">

                <div class="row">

                    <?php
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `goods` WHERE `category` = 4";
                        $result = mysqli_query($link, $sql); 
                    ?>
                    <?php while ($row = mysqli_fetch_array($result)):?>
                    <div class="col-lg-3 col-sm-6 col-xs-12 mt-3">
                        <!-- gooods_card -->
                        <div class="card p-3 h-100">
                            <div class="card_header d-flex justify-content-between">
                                <div></div>
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

                </div>

            </div>
            <div class="tab-pane fade" id="ex2-pills-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                
            <div class="cards_collection">

                    <div class="row">

                        <?php
                            $link = mysqli_connect("localhost", "root", "", "blackfly");
                            $sql = "SELECT * FROM `goods` WHERE `category` = 5";
                            $result = mysqli_query($link, $sql); 
                        ?>
                        <?php while ($row = mysqli_fetch_array($result)):?>
                        <div class="col-lg-3 col-sm-6 col-xs-12 mt-3">
                            <!-- gooods_card -->
                            <div class="card p-3 h-100">
                                <div class="card_header d-flex justify-content-between">
                                    <div></div>
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
                    
                </div>

            </div>
            </div>
            <!-- Pills content -->
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