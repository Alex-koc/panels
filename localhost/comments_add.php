<?php
session_start();
require_once 'mysql.php';
if(isset($_SESSION['auth']))
{
    $s= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $s->fetch();

} else {
	header('Location: http://localhost');
  
}

$art=$_POST['art'];
$user=$_POST['user'];
$text=$_POST['comment'];

$stmt= $pdo->query('INSERT INTO `comments` (`art`,`user`,`text`)
        VALUES ("'.$art.'","'.$user.'","'.$text.'")');
header("Location:" . $_SERVER['HTTP_REFERER']);