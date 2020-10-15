<?php
session_start();
require_once 'mysql.php';
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
    <title>Панель администратора</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">Шестёрочка</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="spisok.php">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="spisok1.php">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="article.php">Статьи</a>
            </li>

        </ul>
    </div>

    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a href="user.php"><input class="btn btn-info ml-1" type="button" value="Личный кабинет"></a>
        </li>
    </ul>

</nav>
        <section class="container">
            <div class="login">
                <h1>Панель Администратора</h1>
                        <?php
                        echo '<h3>Привет администратор: '.$proverka['name'].'<h3>';
                        ?>

				<form action="spisok_product.php">
		            <br>
		            <button>Список продуктов</button>
		        </form>
		        <form action="spisok_category.php">
		            <br>
		            <button>Список категорий</button>
		        </form>
		        <form action="spisok_users.php">
		            <br>
		            <button>Список пользователей</button>
		        </form>
                <form action="spisok_article.php">
                    <br>
                    <button>Список статей</button>
                </form>
<br>
                <form method="post" action="exit.php">

                    <p class="submit"><input type="submit"  name="commit" value="Выход"></p>
                </form>

            </div>
        </section>

</body>
</html>