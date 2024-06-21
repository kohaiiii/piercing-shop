<?php
session_start();

include('bd.php');

$user_id = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;
$price = isset($_POST['total_sum']) ? $_POST['total_sum'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$date = date("Y.m.d");

if (!$user_id || !$price || !$address || !isset($_SESSION['cart-list'])) {
    die('Необходимые данные отсутствуют.');
}

$counter = 0;

foreach ($_SESSION['cart-list'] as $product) {
    $goods_id = $product['id'];
    $goods_count = isset($_POST[$goods_id]) ? $_POST[$goods_id] : 0;

    if ($goods_count <= 0) {
        continue;
    }

    // Подготовленный запрос для получения данных о товаре
    $stmt = $mysql->prepare("SELECT * FROM `goods` WHERE `id` = ?");
    $stmt->bind_param("i", $goods_id);
    $stmt->execute();
    $result2 = $stmt->get_result();
    $finishresult = $result2->fetch_assoc();

    if (!$finishresult) {
        continue;
    }

    $goods_price = $finishresult['price'];
    $goods_price_int = intval(preg_replace('/[^0-9]+/', '', $goods_price), 10);
    $goods_sumprice = $goods_price_int * $goods_count;
    $goods_sumprice_symbol = $goods_sumprice . ' ₽';

    // Подготовленный запрос для вставки заказа
    $stmt = $mysql->prepare("INSERT INTO `orders` (`address`, `status`, `user_id`, `date`, `price`, `goods_id`, `count`) VALUES (?, 1, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisiii", $address, $user_id, $date, $goods_sumprice_symbol, $goods_id, $goods_count);
    $stmt->execute();

    // Подготовленный запрос для обновления количества товара
    $stmt = $mysql->prepare("UPDATE `goods` SET `count` = `count` - ? WHERE `id` = ?");
    $stmt->bind_param("ii", $goods_count, $goods_id);
    $stmt->execute();
}

session_destroy();
$mysql->close();

header('Location: /pages/account.php');
exit();
?>
