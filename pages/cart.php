<?php
    session_start(); 
    $mysql = new mysqli('localhost','root','','blackfly');

    require('../php/actions/function.php');

    if(isset($_GET['goods_add_id']) && !empty($_GET['goods_add_id'])) {
        $current_added_product = get_product_by_id($_GET['goods_add_id']);
        if (!empty($current_added_product)) {
            if  (!isset($_SESSION['cart-list'])) {
                $_SESSION['cart-list'][] = $current_added_product;
                $price_number = intval(preg_replace('/[^0-9]+/', '', $current_added_product['price']), 10);
                $_SESSION['sum-price'] += $price_number;
                
            }

            $product_check = false;
            if  (isset($_SESSION['cart-list'])) {
                foreach($_SESSION['cart-list'] as $value) {
                    if ($value['id'] == $current_added_product['id']) {
                        $product_check = true;
                        
                    } 
                }
            }
            
            if(!$product_check) {
                $_SESSION['cart-list'][] = $current_added_product;
                
                $price_number = intval(preg_replace('/[^0-9]+/', '', $current_added_product['price']), 10);
                $_SESSION['sum-price'] += $price_number;
            }

        } else {
            header("Location: /");
        }
    } 

    if (isset($_GET['delete_id']) && isset($_SESSION['cart-list'])) {
        foreach ($_SESSION['cart-list'] as $key => $value) {
            if ($value['id'] == $_GET['delete_id']) {
                unset($_SESSION['cart-list'][$key]);
                $price_number = intval(preg_replace('/[^0-9]+/', '', $value['price']), 10);
                $_SESSION['sum-price'] -= $price_number;
            }
        }
    }
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
        <section class="container">
            <?php if (isset($_SESSION['cart-list']) && count($_SESSION['cart-list']) != 0 ): ?>
            <h2 class="pt-4 pb-3">Корзина</h2>
            <form action="/php/actions/create_order.php" method="POST">
            <div class="row">

                <div class="col-12 col-lg-8">
                    <?php foreach( $_SESSION['cart-list'] as $product): ?>
                    <div class="cart_goods shadow-sm d-flex align-items-center rounded-3 mb-3">
                        <img class="prod_cart" src="<?=$product['img']?>" alt="cart_goods">
                        <div class="cart_goods_atributes">
                            <div class="cart_gooods_text">
                                <h4 class="prod_cart_name"><input hidden type="text" name="id" value="<?=$product['id']?>"><?=$product['name']?></h4>
                                <p style="color: #575757">белый</p>
                            </div>
                            <h4 class="product_price"><?=$product['price']?> ₽</h4>
                            <!-- counter -->
                            <div class="flex-row">
                                <input type="number" class="product_counter me-3" id="count" name="<?=$product['id']?>" min="1" max="<?=$product['count']?>" value="1">
                                <a href="cart.php?delete_id=<?=$product['id']?>">
                                    <i class="fa-solid fa-lg fa-trash m-3" style="color: black;"></i>
                                </a>
                            </div>
                                
                            
                        </div>
                        
                    </div>
                    <?php endforeach; ?>

                </div>

                <div class="col-12 col-lg-4">
                    <div class="cart_form shadow-sm  p-3 rounded-3">
                        <h3 class="mb-3">Детали заказа</h3>
                        <?php
                            $mysql = new mysqli('localhost', 'root', '', 'blackfly');
                                
                            $id = $_COOKIE['id'];
                            $result = $mysql->query("SELECT * FROM `users` WHERE `id` = '$id'");
                            $result2 = $mysql->query("SELECT * FROM `address` WHERE `user` = '$id'");
                            $address = $result2->fetch_assoc();
                            $user_info = $result->fetch_assoc();

                            if($address == ''):
                        ?>
                            <input class="my-3" type="text" name="name_user" placeholder="ВАШЕ ИМЯ" value="<?=$user_info['name']?>">
                            <input class="my-3" type="text" name="email" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" value="<?=$user_info['email']?>">
                            <input class="my-3" type="text" readonly name="address" placeholder="АДРЕС ДОСТАВКИ" value="Заполните адрес в личном кабинете">
                            <p class="pt-2 text-start fs-3" style="font-size: 18px;">Итого: <b><input class="total" readonly id="total_sum" name="total_sum" type="text" value="<?=$_SESSION['sum-price']?> ₽"></b></p>
                            <button type="submit" disabled class="btn btn_cart btn-outline-dark rounded-5 col-12 mt-3" data-mdb-ripple-init data-mdb-ripple-color="dark">Офомить заказ</button>
                            <?php else: ?>
                            <input class="my-3" type="text" name="name_user" placeholder="ВАШЕ ИМЯ" value="<?=$user_info['name']?>">
                            <input class="my-3" type="text" name="email" placeholder="ЭЛЕКТРОННАЯ ПОЧТА" value="<?=$user_info['email']?>">
                            <input class="my-3" type="text" name="address" placeholder="АДРЕС ДОСТАВКИ" value="<?=$address['city']?>,<?=$address['street']?>,<?=$address['house']?>,<?=$address['flat']?>">
                            <p class="pt-2 text-start fs-3" style="font-size: 18px;">Итого: <b><input class="total" readonly id="total_sum" name="total_sum" type="text" value="<?=$_SESSION['sum-price']?> ₽"></b></p>
                            <button type="submit" class="btn btn_cart btn-outline-dark rounded-5 col-12 mt-3" data-mdb-ripple-init data-mdb-ripple-color="dark">Офомить заказ</button>
                            <?php endif; ?>
                        
                    </div>
                </div>

            </div>
            </form>
            <?php else: ?>
            <h2 class="text-center mt-5">Корзина пуста</h2>
            <?php endif; ?>
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