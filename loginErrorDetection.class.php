<?php

class LoginErrorDetection extends UserInputErrorDetection{
    public function errorDetection($email, $pass){
        if(!$this->passwordTooShort($pass) ||
        !$this->emailIncorrect($email) ||
        !$this->passwordTypo($pass)){
            header("Location: index.php?error=detected");
            $_SESSION['e-login'] = "Invalid Email or Password";
            exit();
        }
    }
}