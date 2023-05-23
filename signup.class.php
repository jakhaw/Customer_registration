<?php

class Signup extends Db{

    protected function setUser($name, $email, $password){

        $stmt = $this->connect()->prepare('INSERT INTO users (name, password, email) VALUES (:name, :password, :email);');

        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(['name'=>$name, 'password'=>$hashpassword, 'email'=>$email])){
            $stmt = null;
            header('Location: signuppage.php?error=stmtfailed');
            exit();
        }

        $stmt = null;
    }
}