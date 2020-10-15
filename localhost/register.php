<?php
require_once 'navbar.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
</head>
<body>
        <section class="container">
            <div class="login">
                <h1>Регистрация</h1>
                <form method="post" action="reg.php">
                    <p><input type="text" name="login" value="" placeholder="Логин или Email"></p>
                    <p><input type="text" name="name" value="" placeholder="Имя"></p>
                    <p><input type="text" name="phone" value="" placeholder="Телефон"></p>
                    <p><input type="password" name="password" value="" placeholder="Пароль"></p>
                    <p class="submit"><input type="submit"  name="commit" value="Регистрация"></p>
                </form>
                <p>Вы зарегистрированы? <a href="login.php">То нажмите сюда! </a> </p>
                <form action="index.html">
                    <br>
                    <button>Назад</button>
                </form>
            </div>
        </section>

</body>
</html>