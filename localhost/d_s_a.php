<?php
session_start();
require_once 'mysql.php';
$id = $_GET['id'];
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $admin = $proverka['admin'];
    $id_user = $proverka['id'];
    $stmt1 = $pdo->query("SELECT * FROM `article` WHERE id='".$id."'");
    $s = $stmt1->fetch();
    if ($id_user != $s['user']) {
        header('Location: http://localhost/user.php');
    }

} else {
	header('Location: http://localhost');
  
}


$stm = $pdo->query("DELETE FROM `article` WHERE id = ".$id);


header('Location: spisok_article.php');