<?php
session_start();
require_once 'mysql.php';
//////////////////////////////////////////////////////////////
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
//////////////////////////////////////////////////////////////
$id = $_GET['id'];
$s = $pdo->query("SELECT admin FROM `users` WHERE id='".$id."'");
$idR= $s->fetch();

if($idR["admin"] ==2){
 
    $sql ="UPDATE `users` SET admin=1 WHERE id='".$id."'";
    $stm = $pdo->query($sql);
}else{

    $sql ="UPDATE `users` SET admin=2 WHERE id='".$id."'";
    $stm = $pdo->query($sql);
}


header('Location: http://localhost/spisok_users.php');