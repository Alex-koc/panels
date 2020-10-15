<?php
session_start();
require_once 'mysql.php';
require_once 'navbar.php';
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

$zapis = $_GET['zapis'];
if ($zapis != '') {
    if ($zapis == "false") {
        echo '<script>alert("Вы ввели пустое значение");</script>';
    } else {
        echo '<script>alert("Запись создана");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Категории</title>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Добавить категорию</h1>
        <form method="post" action="categories.php">
            <p><input type="text" name="name" value="" placeholder="Название категории"></p>
            <p class="submit"><input type="submit" name="commit" value="Добавить"></p>
        </form>
        <form action="spisok_category.php">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>