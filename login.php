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
include('inputMistakeCheck.interface.php');
include('inputMistakeCheckInit.interface.php');
include('inputMistakeCheckLogic.class.php');
include('login.contr.php');

$passwordTooShort = new PasswordTooShort();
$passwordTypo = new PasswordTypo();
$emailIncorrect = new EmailIncorrect();

$checkInit = new InputMistakeCheckInit();

$checkPasswordTooShort = new InputMistakeCheckLogic($checkInit, $passwordTooShort, $pass);
$checkPasswordTypo = new InputMistakeCheckLogic($checkInit, $passwordTypo, $pass);
$checkEmailIncorrect = new InputMistakeCheckLogic($checkInit, $emailIncorrect, $email);

if(!$checkPasswordTooShort->mistakeCheckLogic() || 
!$checkPasswordTypo->mistakeCheckLogic() || 
!$checkEmailIncorrect->mistakeCheckLogic()){
    header('Location: index.php?input_check=fail');
    $_SESSION['e-login'] = "Email or password is incorrect";
    exit();
};

$login = new LoginContr($email, $pass);
$login->loginUser();

header('Location: account.php?operation=success');