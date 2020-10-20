<?php
session_start();
require_once 'mysql.php';
require_once 'caart.php';


$name = $_POST['name'];
$phone = $_POST['phone'];
$adres = $_POST['adres'];


$order = $pdo->query('INSERT INTO `orders` (`name`, `phone`, `adres`)
            VALUES ("' . $name . '","' . $adres . '", "' . $phone . '")');
$order_id = $pdo->lastInsertId();
$cart = new Cart();
foreach ($cart->cart as $id => $count) {
    $cart = $pdo->query('INSERT INTO `carts` (`id_orders`,`id_prod`, `count`)
            VALUES ("' .$order_id. '","' . $id . '","' .$count. '")');
}
header("Location:" . $_SERVER['HTTP_REFERER']);

