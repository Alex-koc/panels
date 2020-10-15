<?php
require_once 'mysql.php';
require_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Корзина</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>

<section class="container">
    <div class="login">
        <h1>Корзина</h1>
        <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>Название</th>
                <th>Фото</th>
                <th>Описание</th>
                <th>Количество</th>
            </tr>
            <?php
            require_once 'caart.php';
            $cart = new Cart();
            foreach ($cart->cart as $id => $count){
                $stmt = $pdo->query('SELECT *  FROM `product` WHERE id='.$id);

                while ($row = $stmt->fetch())
                {
                    echo '<td><a>'.$row['name'].'</a></td>';
                    echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="150" height="150"></td>';
                    echo '<td>'.$row['text'].'</td>';
                    echo '<td><a href="cart_rem.php?id='.$row['id'].'"> - </a><a>'.$count.'</a><a href="cart_add.php?id='.$row['id'].'"> + </a></td>';
                    echo "</tr>";

                }
            }
            ?>
        </table>
        <?php ?>
        </table>
        <br>
    </div>
</section>
</body>
</html>
