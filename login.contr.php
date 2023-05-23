<?php

class LoginContr extends Login{

    private $email, $pass;

    public function __construct($email, $password){
        $this->email = $email;
        $this->pass = $password;
    }

    public function loginUser(){
        $this->checkUser($this->email);
        $this->getUser($this->email, $this->pass);
    }
}