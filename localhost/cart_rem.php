<?php
require_once 'caart.php';
$cart = new Cart();
$cart->remProduct($_GET['id']);
header("Location:".$_SERVER['HTTP_REFERER']);