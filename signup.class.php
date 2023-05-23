<?php

class Singup extends Db{

    protected function checkUser($email){

        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = :email;');

        if(!$stmt->execute(['email'=>$email])){
            $stmt = null;
            header('Location: index.php?error=stmtfailed');
            exit();
        }

        if($stmt -> rowCount() > 0){
            $stmt = null;
            header('Location: index.php?error=emailalreadyused');
            $_SESSION['e-login'] = 'This email is already used';
            exit();
        }

        $stmt = null;
    }

    protected function setUser($name, $email, $password){

        $stmt = $this->connect()->prepare('INSERT INTO users (name, password, email) VALUES (:name, :password, :email);');

        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(['name'=>$name, 'password'=>$hashpassword, 'email'=>$email])){
            $stmt = null;
            header('Location: index.php?error=stmtfailed');
            exit();
        }

        $stmt = null;
    }
}