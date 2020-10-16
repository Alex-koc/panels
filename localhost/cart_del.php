<?php
require_once 'caart.php';
$cart = new Cart();
$cart->delProduct($_GET['id']);
header("Location:".$_SERVER['HTTP_REFERER']);