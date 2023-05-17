<?php
session_start();
if(!isset($_SESSION['signin'])){
    header('Location: index.php');
    exit();
}

$email = $_SESSION['login_email'];
$pass = $_SESSION['login_password'];

include('database.php');
include('login.class.php');
include('login.contr.php');

$login = new LoginContr($email, $pass);

$login->loginUser();

header('Location: account.php?operation=success');