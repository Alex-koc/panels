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
$text=$_POST['text'];
$price=$_POST['price'];
$photo=$_FILES['photo']['name'];

if(isset($_FILES) && $_FILES['photo']['error'] == 0){
    $destiation_dir = './images/'.$_FILES['photo']['name'];
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $destiation_dir )) {
        $stmt= $pdo->query('INSERT INTO `product` (`name`, `text`, `price`, `photo`)
            VALUES ("'.$name.'", "'.$text.'", "'.$price.'", "'.$photo.'")');
        header('Location: http://localhost/product.php');
    }
}
