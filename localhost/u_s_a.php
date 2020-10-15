<?php
session_start();
require_once 'mysql.php';
require_once 'navbar.php';
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
}else {
    header('Location: http://localhost');
  
}


if(isset($_POST['commit']))
{
    $name=$_POST['name'];
    $text=$_POST['text'];
    $price=$_POST['photo'];


    $sql ="UPDATE `article` SET name='".$name."', text='".$text."', photo='".$photo."'  WHERE id='".$id."'";
    $stm = $pdo->query($sql);

    header('Location: http://localhost/spisok_article.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Редактирование Статьи<?php echo''.$proverka['name'].''?></title>
</head>
<body>
<section class="container">
    <div class="login">
        <?php Echo'<h1>Обновить Товар('.$s["name"].')</h1> '; ?>
       <form method="post" enctype="multipart/form-data">        <?php
            Echo'<p><input type="text" name="name" value="'.$s["name"].'" placeholder="Название"></p>';
            Echo'<p><input type="text" name="text" value="'.$s["text"].'" placeholder="Описание"></p>';
            Echo'<p><input type="file" name="phote" value="'.$s["phote"].'" placeholder=""></p>';
            Echo'<p><input type="hidden" name="id" value="'.$id.'" placeholder="Цена"></p>';
            Echo'<p class="submit"><input type="submit" name="commit" value="Редактировать"></p>';
            ?>
        </form>
        <form action="spisok_article.php">
            <br>
            <button>Вернуться в Личный кабинет</button>
        </form>
    </div>
</section>
</body>
