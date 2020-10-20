<?php
require_once 'navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Авторизация</title>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Авторизация</h1>
        <form method="post" action="log.php">
            <p><input type="text" name="login" value="" placeholder="Логин или Email"></p>
            <p><input type="password" name="password" value="" placeholder="Пароль"></p>
            </p>
            <p class="submit"><input type="submit"  name="commit" value="Вход"></p>
        </form>
        <p>Вы не зарегистрированы? <a href="register.php">То нажмите сюда! </a> </p>
    </div>
</section>
<?php
require_once 'footer.php';
?>
</body>
</html>