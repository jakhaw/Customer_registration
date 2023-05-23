<?php

class SignupErrorDetection extends UserInputErrorDetection{
    public function errorDetection($email, $pass, $username){
        if(!$this->passwordTooShort($pass) ||
        !$this->emailIncorrect($email) ||
        !$this->passwordTypo($pass) ||
        !$this->usernameTypo($username)){
            header("Location: signuppage.php?error=detected");
            exit();
        }
    }
}