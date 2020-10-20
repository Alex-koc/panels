<?php
require_once 'mysql.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Оформление заказа</title>
</head>
<body>
<div class="container">
    <hr>
    <h2>Оформление Заказа</h2>
    <hr>
    <div class="row">
        <div class="col-sm">
            <form method="post" enctype="multipart/form-data" action="order.php">
                <p><input type="text" name="name" value="" placeholder="Имя"></p>
                <p><input type="text" name="phone" value="" placeholder="Телефон"></p>
                <p><input type="text" name="adres" value="" placeholder="Адрес"></p>
                <input class="btn btn-warning ml-1" type="submit" value="Подтвердить заказ">
            </form>

        </div>
        <div class="col-sm">
            <table class = "table table-borderless">
                <thead class="text-center">
                <tr>
                    <th>Название</th>
                    <th>Фото</th>
                    <th>Описание</th>
                    <th>Количество</th>
                    <th>Цена</th>
                </tr>
                <?php
                require_once 'caart.php';
                $cart = new Cart();
                $sum =0;
                $summ =0;
                foreach ($cart->cart as $id => $count){
                    $stmt = $pdo->query('SELECT *  FROM `product` WHERE id='.$id);
                    while ($row = $stmt->fetch())
                    {
                        echo "<tr>";
                        echo '<td><a>'.$row['name'].'</a></td>';
                        echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="160" height="150"></td>';
                        echo '<td>'.$row['text'].'</td>';
                        echo '<td><a> '.$count.' </a></td>';
                        $price= $count * $row['price'];
                        echo '<td><a>'.$price.'₽</a></td>';
                        echo "</tr>";
                        $sum += $count;
                        $summ += $price;

                    }
                }
                echo '<a>Итого: '.$sum.' товара на '.$summ.' ₽</a>';
                ?>
            </table>
        </div>
    </div>

</body>
</html>
