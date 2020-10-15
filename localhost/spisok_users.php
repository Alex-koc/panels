<?php
session_start();
require_once 'mysql.php';
require_once 'navbar.php';
$sql = "SELECT * FROM `category`";
$result = $pdo->query($sql);

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
    <title>Товары</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Таблица товаров</h1>
                <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Админ</th>
                <th>Сделать(Админ/Польз)</th>
            </tr>
                        <?php
                        $article = $pdo->query('SELECT * FROM `users` ORDER BY id DESC');
                         while ($row = $article->fetch())
                        {
                            echo "<tr>";
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['login'].'</td>';
                            echo '<td>'.$row['name'].'</td>';
                            echo '<td>'.$row['phone'].'</td>';
                            if($row['admin'] == 2){
                                echo '<td><a>Администратор</a></td>';
                            }else{
                                echo '<td><a>Пользователь</a></td>';
                            }
                            echo '<td><a href="update_users.php?id='.$row['id'].'">Редактировать</a></td>';
                            echo "</tr>";

                        }
                        ?>
                        </table>
        <br>
        <form action="admin_panel.php">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>