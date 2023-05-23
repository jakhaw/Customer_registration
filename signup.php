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
include('inputMistakeCheck.interface.php');
include('inputMistakeCheckInit.interface.php');
include('inputMistakeCheckLogic.class.php');
include('signup.contr.php');

$passwordTooShort = new PasswordTooShort();
$passwordTypo = new PasswordTypo();
$emailIncorrect = new EmailIncorrect();
$usernameTypo = new UsernameTypo();

$checkInit = new InputMistakeCheckInit();

$checkPasswordTooShort = new InputMistakeCheckLogic($checkInit, $passwordTooShort, $pass);
$checkPasswordTypo = new InputMistakeCheckLogic($checkInit, $passwordTypo, $pass);
$checkEmailIncorrect = new InputMistakeCheckLogic($checkInit, $emailIncorrect, $email);
$checkUsernameTypo = new InputMistakeCheckLogic($checkInit, $usernameTypo, $username);

if(!$checkPasswordTooShort->mistakeCheckLogic() || 
!$checkPasswordTypo->mistakeCheckLogic() || 
!$checkEmailIncorrect->mistakeCheckLogic() ||
!$checkUsernameTypo->mistakeCheckLogic()){
    header('Location: signuppage.php?input_check=fail');
    exit();
};

$signup = new SinupContr($username, $pass, $email);
$signup->signupUser();

header('Location: index.php?operation=success');