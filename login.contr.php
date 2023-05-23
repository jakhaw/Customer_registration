<?php

class LoginContr extends Login{

    private $email, $pass;
    private ICheckUser $user;

    public function __construct($email, $password, ICheckUser $user){
        $this->email = $email;
        $this->pass = $password;
        $this->user = $user;
    }

    public function loginUser(){
        $errorCheck = new LoginErrorDetection();
        $errorCheck->errorDetection($this->email, $this->pass);
        $this->user->checkUser($this->email);
        $this->getUser($this->email, $this->pass);
    }
}