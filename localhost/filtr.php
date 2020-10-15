<!doctype html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Товары</title>
    <style>

    </style>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Таблица товаров</h1>
        <?php
        require_once 'mysql.php';
        require_once 'navbar.php';
        $f = $_POST['filter'];
        $f1 = $_POST['filter1'];


        $stmt= $pdo->query("SELECT * FROM product WHERE `name` LIKE '%".$f."%' OR price LIKE '%".$f1."%'");
        echo "<table><tr><th>№</th><th>Товары</th><th>Описание</th><th>Цена</th><th>Фото</th></tr>";
        while  ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['text'].'</td>';
            echo '<td>'.$row['price'].'</td>';
            echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="150" height="150"></td>';
            echo "</tr>";

        }
        ?>
        </table>
        <br>
        <form action="spisok.php">
            <br>
            <button>Таблица</button>
        </form>
    </div>
</section>
</body>
</html>
