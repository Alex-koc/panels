<?php
session_start();
require_once 'mysql.php';
require_once 'navbar.php';
$sql = "SELECT * FROM `product`";
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
            width: 700px;
        }
    </style>
</head>
<body>
<section class="container">
    <div class="login  width: 535px;

}">
        <h1>Таблица товаров</h1>
        <?php
        echo "<table><tr><th>№</th><th>Товары</th><th>Описание</th><th>Цена</th><th>Фото</th><th>Редактировать</th><th>Удалить</th></tr>";
        while ($row = $result->fetch())
        {

            echo "<tr>";
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['text'].'</td>';
            echo '<td>'.$row['price'].'</td>';
            echo '<td><img src="images/'.$row['photo'].'" alt="Картинка" width="100" height="100"></td>';
            echo '<td><a href="update1.php?id='.$row['id'].'">Редактировать</a></td>';
            echo '<td><a href="delete1.php?id='.$row['id'].'">Удалить</a></td>';
            echo "</tr>";

        }

        ?>
        </table>
        <br>
        <form action="product.php">
            <button>Добавить товар</button>
        </form>
        <form action="admin_panel.php">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>