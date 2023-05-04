<?php

session_start();
include('login.class.php');

class LoginContr extends Login{

    private $email;
    private $password;
    private $result;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    private function checkEmail(){
        $login_email_sanitize = filter_var($this->email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL) || $this->email !== $login_email_sanitize){
            $this->result = false;
            $_SESSION['e-email'] = 'Email address is incorrect';
        }else{
            $this->result = true;
        }
        return $this->result;
    }

    private function checkPassword(){
        if(!ctype_alnum($this->password) || strlen($this->password) < 6){
            $this->result = false;
            $_SESSION['e-password'] = 'Password is incorrect';
        }else{
            $this->result = true;
        }
        return $this->result;
    }
}