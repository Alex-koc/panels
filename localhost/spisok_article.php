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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Блог</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>
<section class="container">
    <div class="login">

        <h1>Статьи</h1>
        <?php
        $stmt = $pdo->query('SELECT *, `article`.id AS idR FROM `article` ORDER BY idR DESC');
        echo "<table><tr><th>№</th><th>Название</th><th>Описание</th><th>Фото</th><th>Редактировать</th><th>Удалить</th></tr>";
        while ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo '<td>'.$row['idR'].'</td>';
            echo '<td><a href="comments.php?id='.$row['id'].'">'.$row['name'].'</a></td>';
            echo '<td>'.$row['text'].'</td>';
            echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="150" height="150"></td>';
            echo '<td><a href="update_spisok_article.php?id='.$row['id'].'">Редактировать</a></td>';
            echo '<td><a href="delete_spisok_article.php?id='.$row['id'].'">Удалить</a></td>';
            echo "</tr>";

        }
        ?>
        </table>
        <br>
        <form action="articles.php">
            <button>Добавить статью</button>
        </form>
        <br>
        <form action="admin_panel.php">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>