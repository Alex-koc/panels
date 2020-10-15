<?php
session_start();
require_once 'mysql.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Шестёрочка</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="spisok.php">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="spisok1.php">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="article.php">Статьи</a>
            </li>

        </ul>
    </div>
    <?php
    if(isset($_SESSION['auth']))
    {
        $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
        $proverka = $stmt->fetch();
        $admin = $proverka['admin'];
        if($admin != 2){
            echo '
    <ul></ul>
       <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="cart.php"><input class="btn btn-warning ml-1" type="button" value="Корзина"></a>
        </li></ul>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="user.php"><input class="btn btn-primary ml-1" type="button" value="Личный кабинет"></a>
        </li>
    </ul>';
        }else{
            echo '
    <ul></ul>
       <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="cart.php"><input class="btn btn-warning ml-1" type="button" value="Корзина"></a>
        </li></ul>
    <ul class="navbar-nav mr-auto">
    <div class="btn-group">
      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Панель Администратора
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="spisok_product.php">Список продуктов</a>
        <a class="dropdown-item" href="spisok_category.php">Список категорий</a>
        <a class="dropdown-item" href="spisok_article.php">Список статей</a>
        <a class="dropdown-item" href="spisok_users.php">Список пользователей</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="exit.php">Выход</a>
      </div>
</div>
    </ul>';
        }

    } else {
        echo '<ul></ul>
   <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="cart.php"><input class="btn btn-warning ml-1" type="button" value="Корзина"></a>
        </li></ul>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="login.php"><input class="btn btn-warning ml-1" type="button" value="Личный кабинет"></a>
        </li>
    </ul>';

    }
    ?>
</nav>