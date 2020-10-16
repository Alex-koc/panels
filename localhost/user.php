<?php
session_start();
require_once 'mysql.php';
require_once 'navbar.php';
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT *, `users`.id AS ID FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $result = $stmt->fetch();
    $admin = $result['admin'];
        if($admin == 2){
            header('Location: http://localhost/admin_panel.php');
        }
} else {
    header('Location: http://localhost/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Личный кабинет</title>

</head>
<body>
        <section class="container">
            <div class="login">
                <h1>Личный кабинет</h1>
                        <?php
                        echo '<p>Логин: '.$result['login'].'<p>';
                        echo '<p>Имя: '.$result['name'].'<p>';
                        echo '<p>Телефон: '.$result['phone'].'<p>';
                        ?>
                <h2>Статьи Пользователя:</h2>
                <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Фото</th>
            </tr>
                        <?php
                        $article = $pdo->query("SELECT * FROM `article` WHERE `article`.user =".$result['ID']);
                         while ($row = $article->fetch())
                        {
                            echo "<tr>";
                            echo '<td><a href="comments.php?id='.$row['id'].'">'.$row['name'].'</a></td>';
                            echo '<td>'.$row['text'].'</td>';
                            echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="150" height="150"></td>';
                            echo '<td><a href="u_s_a.php?id='.$row['id'].'"><img src="images/icons/red_icon.png" title="Редактировать" alt="Картинка" width="40" height="40"></a>';
                            echo '<td><a href="d_s_a.php?id='.$row['id'].'"><img src="images/icons/close_icon.png" title="Удалить" alt="Картинка" width="40" height="40"></a></td>';
                            echo "</tr>";

                        }
                        ?>
                        </table>
                        <form action="articles.php">
                            <button>Создать статью</button>
                        </form>
                <br>
            </div>
        </section>
</body>
</html>