<?php
session_start();
require_once 'mysql.php';
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $admin = $proverka['admin'];
    if($admin != 2){
     	header('Location: http://localhost/user.php');
     }

} else {
	header('Location: http://localhost');
  
}

$name=$_POST['name'];
if ($name == '') {
    header('Location: http://localhost/category.php?zapis=false');
} else {
    $stmt= $pdo->query( 'INSERT INTO `category` (`name`) VALUES ("'.$name.'")');
    header('Location: http://localhost/category.php?zapis=true');
}
