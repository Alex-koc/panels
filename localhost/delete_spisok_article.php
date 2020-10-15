<?php
require_once 'mysql.php';
session_start();
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

$id = $_GET['id'];
$stmt = $pdo->query("DELETE FROM `article` WHERE id = ".$id);


header('Location: spisok_article.php');