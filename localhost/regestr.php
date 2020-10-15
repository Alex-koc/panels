<?php
session_start();
require_once 'mysql.php';


$login=$_POST['login'];
$phone=$_POST['phone'];
$password=$_POST['password'];

$password= md5($password);

$stmt= $pdo->query('INSERT INTO `users` (`login`, `phone`, `password`) VALUES ("'.$login.'", 
                                                                               "'.$phone.'",
                                                                               "'.$password.'")');
header('Location: http://localhost/index_log.php');