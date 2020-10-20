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
    <title>Список пользователй</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Таблица пользователей</h1>
                <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Роль</th>
                <th>Настройка</th>
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
                                echo '<td><img src="images/icons/admin.png" alt="Картинка" title="Администратор" width="40" height="40"></td>';
                            }else{
                                echo '<td><img src="images/icons/pols.png" alt="Картинка" title="Пользователь" width="40" height="40"></td>';
                            }
                            echo '<td><a href="update_users.php?id='.$row['id'].'"><img src="images/icons/admin_icon.png" alt="Картинка" width="40" height="40"></a>';
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
<?php
require_once 'footer.php';
?>
</body>
</html>