<?php
session_start();
require_once 'mysql.php';

$id = $_GET['id'];

if(isset($_SESSION['auth']))
{
    $s = $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $s1 = $s->fetch();
    $user_id=$s1['id'];

}else{
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Коментарии</title>
<body>
<section class="container">

        <h2>Коментарии</h2>
        <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>Имя</th>
                <th>Комментарий</th>
            </tr>
        <?php
        $stmt = $pdo->query("SELECT *,`comments`.id as idR FROM `comments` LEFT JOIN users ON comments.user = users.id WHERE `art` =".$id);
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
            <h4>Добавить коментарий</h4>
            <form method="post" enctype="multipart/form-data" action="comments_add.php">
                <?php echo '<input type="hidden" name="art" value="'.$id.'" placeholder="">';
                 echo '<input type="hidden" name="user" value="'.$user_id.'" placeholder="">';?>
                <textarea name="comment" cols="100" rows="6"></textarea>

                <p class="submit"><input type="submit" name="commit" value="Добавить"></p>
            </form>
</section>
<?php
require_once 'footer.php';
?>
</body>

</html>