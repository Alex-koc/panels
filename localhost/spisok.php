<?php
require_once 'mysql.php';
require_once 'navbar.php';
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
<div class="container">
    <h2>Таблица товаров</h2>
    <hr>
    <div class="row">
        <div class="col-sm">
            <table class = "table table-borderless">
                <thead class="text-center">
                <tr>
                    <th>Название</th>
                    <th>Фото</th>
                    <th>Описание</th>
                    <th>Количество</th>
                </tr>
                <?php
                $stmt = $pdo->query('SELECT *, `product`.id AS idR FROM `product` ORDER BY idR ASC');
                echo "<table><tr><th>№</th><th>Товары</th><th>Описание</th><th>Цена</th><th>Фото</th></tr>";
                while ($row = $stmt->fetch())
                {
                    echo "<tr>";
                    echo '<td>'.$row['idR'].'</td>';
                    echo '<td><a href="cart_add.php?id='.$row['id'].'">'.$row['name'].'</td>';
                    echo '<td>'.$row['text'].'</td>';
                    echo '<td>'.$row['price'].'</td>';
                    echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="160" height="150"></td>';
                    echo "</tr>";

                }?>
            </table>
        </div>
        <div class="col-sm">
            <h3>Фильтр</h3>
            <?php
            
            ?>
            <hr>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>
<?php
require_once 'footer.php';
?>
</body>
</html>