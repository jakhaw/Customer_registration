<?php

if(!isset($_POST['signin'])){
    header('Location: index.php');
    exit();
}

$email = $_POST['login_email'];
$pass = $_POST['login_password'];

include('login.contr.php');

$login = new LoginContr($email, $pass);