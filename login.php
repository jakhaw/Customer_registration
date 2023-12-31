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
include('errorDetection.class.php');
include('loginErrorDetection.class.php');
include('checkUser.interface.php');
include('login.contr.php');

$checkUserForLogin = new CheckUserForLogin();
$login = new LoginContr($email, $pass, $checkUserForLogin);
$login->loginUser();

header('Location: account.php?operation=success');