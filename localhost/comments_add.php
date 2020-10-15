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


$text=$_POST['text'];
$user=$_POST['user'];

$stmt= $pdo->query('INSERT INTO `comments` (`user`,`text`)
        VALUES ("'.$user.'","'.$text.'")');
header('Location: http://localhost/comments.php');