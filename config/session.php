<?php
session_start();

if((isset($_COOKIE['email']))){
    $_COOKIE['email']=$_SESSION['email'];
}

if(!(isset($_SESSION['email']))){
    header('Location: ../Login/login.php');
}

?>