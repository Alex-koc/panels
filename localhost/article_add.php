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


$name=$_POST['name'];
$text=$_POST['text'];
$photo=$_FILES['photo']['name'];
$user=$_POST['user'];

$stmt= $pdo->query('INSERT INTO `article` (`user`, `name`, `text`, `photo`)
        VALUES ("'.$user.'","'.$name.'", "'.$text.'", "'.$photo.'")');
header('Location: http://localhost/spisok_article.php');