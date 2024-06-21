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
        <section class="container">
            <h2 class="pt-4 pb-3">Избранное</h2>
            
            <!-- first row start -->
            <div class="row pre_catalog_row_index">
                    <?php
                        $user = $_COOKIE['id'];
                        $link = mysqli_connect("localhost", "root", "", "blackfly");
                        $sql = "SELECT * FROM `favorites` INNER JOIN `goods` ON favorites.id_goods = goods.id WHERE favorites.id_user = '$user'";
                        $search_fav = $result = mysqli_query($link, $sql); 
                        
                        if (mysqli_num_rows($result) == 0):

                    ?>
                    <h2 class="text-center mt-5">Тут пока что пусто!</h2>
                    <h5 class="text-center">Чтобы добавить товар в избранное, нажмите на сердечко на его карточке</h2>
                    <?php else: ?>
                    <?php while ($row = mysqli_fetch_array($result)):?>
                    <div class="col-lg-3 col-sm-6 col-xs-12 mt-3">
                        <!-- gooods_card -->
                        <div class="card p-3 h-100">
                            <div class="card_header d-flex justify-content-between">
                                <div></div>
                                <a href="/php/actions/delete_favor.php?id=<?=$row['id']?>"><img src="/img/solar_heart-broken-red.svg" alt="heart"></a>
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
                    <?php endif; ?>


                </div>
                <!-- first row end -->

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