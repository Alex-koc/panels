<?php
session_start();
require_once 'mysql.php';
require_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Главная</title>
</head>
<body>
<div class="container">
    <br>
    <div class="card bg-dark text-white" style>
        <img src="images/1223833283_food_1261.jpg" class="card-img" alt="...">

    </div>
    <br>
    <h1 class="display-4">Товары по акции</h1>
    <br>
    <div class="card-group">
        <div class="card">
            <img src="images/143-1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Инжир</h5>
                <p class="card-text"></p>
            </div>
        </div>
        <div class="card">
            <img src="images/pomegranate.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Гранат</h5>
                <p class="card-text"></p>
            </div>
        </div>
        <div class="card">
            <img src="images/айва.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Хурма</h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            Цитата дня
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Еда — важная часть сбалансированной диеты.</p>
                <footer class="blockquote-footer">Американский писатель, оратор и актер <cite title="Source Title">Фран Лейбовиц</cite></footer>
            </blockquote>
        </div>
    </div>
    <br>
    <h1 class="display-4">Display 4</h1>
    <br>
    <div class="row">
    <div class="col-sm">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Primary card title</h5>
                <p class="card-text">Информация</p>
            </div>
        </div>
    </div>
    <div class="col-sm">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Primary card title</h5>
                <p class="card-text">Информация</p>
            </div>
        </div>
    </div>
        <div class="col-sm">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Secondary card title</h5>
                <p class="card-text">Информация</p>
            </div>
        </div>
        </div>
            <div class="col-sm">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Success card title</h5>
                <p class="card-text">Информация</p>
            </div>
        </div>

    </div>

</div>
</body>
</html>