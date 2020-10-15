<?php
require_once 'caart.php';
$cart = new Cart();
$cart->addProduct($_GET['id']);
header("Location:".$_SERVER['HTTP_REFERER']);