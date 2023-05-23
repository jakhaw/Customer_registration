<?php

class SignupContr extends Signup{
    
    private $name, $pass, $email;
    private ICheckUser $user;

    public function __construct($name, $pass, $email, ICheckUser $user)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->email = $email;
        $this->user = $user;
    }

    public function signupUser(){
        $errorCheck = new SignupErrorDetection();
        $errorCheck->errorDetection($this->email, $this->pass, $this->name);
        $this->user->checkUser($this->email);
        $this->setUser($this->name, $this->email, $this->pass);
    }
}