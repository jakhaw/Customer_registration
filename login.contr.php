<?php

session_start();

class LoginContr extends Login{

    private $email;
    private $pass;

    public function __construct($email, $password){
        $this->email = $email;
        $this->pass = $password;
    }

    public function loginUser(){
        if(!$this->spellingError() || !$this->passLengthError() || !$this->emailError()){
            header('Location: index.php');
            exit();
        }

        $this->getUser($this->email, $this->pass);
    }

    private function spellingError(){

        $result = true;

        if(!ctype_alnum($this->pass)){
            $result = false;
            $_SESSION['e-password'] = 'Password can only contain letters or digits';
        }

        return $result;
    }

    private function passLengthError(){

        $result = true;
        if(strlen($this->pass) < 6){
            $result = false;
            $_SESSION['e-password'] = 'Password has to be at least 6 characters long';
        }

        return $result;
    }

    private function emailError(){

        $result = true;
        $login_email_sanitize = filter_var($this->email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL) || $this->email !== $login_email_sanitize){
            $result = false;
            $_SESSION['e-email'] = 'Email address is incorrect';
        }

        return $result;
    }
}