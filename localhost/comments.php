<?php
require_once 'mysql.php';
require_once 'navbar.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Коментарии</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>
<section class="container">
    <div class="login">

        <h1>Коментарии</h1>
        <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Комментарий</th>
            </tr>
        <?php
        $stmt = $pdo->query("SELECT *,comments.id AS idR FROM `comments` LEFT JOIN users ON comments.user = users.id WHERE `art` =".$id);
        while ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo '<td>'.$row['idR'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['text'].'</td>';
            echo "</tr>";

        }
        ?>
        </table>
        <br>

        <?php echo '<from method="post" action="comment.php?id="'.$id.'">';
              echo '<p class="submit"><input type="submit"  name="commit" value="Добавить коментарий"></p>';
              echo '</form>';
        ?>
        <form action="article.php">
            <br>
            <button>Вернуться в Статьи</button>
        </form>
    </div>
</section>
</body>
</html>