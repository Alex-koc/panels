<?php
require_once 'mysql.php';
require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Категории</title>
    <style>
        .login {
            width: 450px;
        }
    </style>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Таблица категорий</h1>
        <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Название</th>
            </tr>
            <?php
            $stmt = $pdo->query('SELECT *, `category`.id AS idR FROM `category` ORDER BY idR ASC');
            while ($row = $stmt->fetch())
            {
                echo "<tr>";
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo "</tr>";

            }

            ?>
        </table>
        <br>

    </div>
</section>
</body>
</html>