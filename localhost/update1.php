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

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM `product` WHERE id='".$id."'")->fetch();


if(isset($_POST['commit']))
{
    $name=$_POST['name'];
    $text=$_POST['text'];
    $price=$_POST['price'];



    $sql ="UPDATE `product` SET name='".$name."', text='".$text."', price='".$price."'  WHERE id='".$id."'";
    $stm = $pdo->query($sql);

    header('Location: spisok_product.php');
}


require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Товары</title>
</head>
<body>
<section class="container">
    <div class="login">
        <?php Echo'<h1>Обновить товар('.$stmt["name"].')</h1> '; ?>
       <form method="post" enctype="multipart/form-data"> <?php
            Echo'<p><input type="text" name="name" value="'.$stmt["name"].'" placeholder="Название"></p>';
            Echo'<p><input type="text" name="text" value="'.$stmt["text"].'" placeholder="Описание"></p>';
            Echo'<p><input type="text" name="price" value="'.$stmt["price"].'" placeholder="Цена"></p>';
            Echo'<p><input type="hidden" name="id" value="'.$id.'" placeholder="Цена"></p>';
            Echo'<p class="submit"><input type="submit" name="commit" value="Редактировать"></p>';
            ?>
        </form>
        <form action="spisok_product.php">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
