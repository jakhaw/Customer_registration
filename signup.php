<?php

session_start();

if(!isset($_POST['submit'])){
    header('Location: signuppage.php');
    exit();
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

include('database.php');
include('signup.class.php');
include('signup.contr.php');

$signup = new SinupContr($username, $password, $email);

$signup->signupUser();

header('Location: index.php?operation=success');