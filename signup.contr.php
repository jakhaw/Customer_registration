<?php
session_start();
class SinupContr extends Singup{
    private $name, $pass, $email;

    public function __construct($name, $pass, $email)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->email = $email;
    }

    public function signupUser(){
        if(!$this->spellingError() || !$this->passLengthError() || !$this->emailError() ||!$this->emailTaken()){
            header('Location: signuppage.php');
            exit();
        }

        $this->setUser($this->name, $this->email, $this->pass);
    }

    private function spellingError(){

        $result = true;
        if(!ctype_alnum($this->name)){
            $result = false;
            $_SESSION['e-username'] = 'Username can only contain letters or digits';
        }

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

    private function emailTaken(){

        $result = true;
        if(!$this->checkUser($this->email)){
            $result = false;
            $_SESSION['e-email'] = 'There is already an account with this email address';
        }

        return $result;
    }

}