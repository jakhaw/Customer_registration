<?php
session_start();
if(!isset($_SESSION['submit'])){
    header('Location: signuppage.php');
    exit();
}

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$pass = $_SESSION['password'];

include('database.php');
include('signup.class.php');
include('errorDetection.class.php');
include('signupErrorDetection.class.php');
include('checkUser.interface.php');
include('signup.contr.php');

$checkUserForSignup = new CheckUserForSignup();
$signup = new SignupContr($username, $pass, $email, $checkUserForSignup);
$signup->signupUser();

header('Location: index.php?operation=success');