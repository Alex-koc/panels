<?php
session_start();
require_once 'mysql.php';


$login=$_POST['login'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['password'];

$password= md5($password);

$stmt= $pdo->query('INSERT INTO `users` (`admin`,`login`, `name`, `phone`,  `password`) VALUES ("1",
																			   "'.$login.'",
																			   "'.$name.'", 
                                                                               "'.$phone.'",
                                                                               "'.$password.'")');
header('Location: http://localhost/check.php');