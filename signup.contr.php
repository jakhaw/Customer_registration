<?php

class SinupContr extends Singup{
    
    private $name, $pass, $email;

    public function __construct($name, $pass, $email)
    {
        $this->name = $name;
        $this->pass = $pass;
        $this->email = $email;
    }

    public function signupUser(){
        $this->checkUser($this->email);
        $this->setUser($this->name, $this->email, $this->pass);
    }
}