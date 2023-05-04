<?php

include('database.php');

class Login extends Db {
    
    protected function checkUser($email){
        
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE email = :email');

        if(!$stmt->execute(['email'=>$email])){
            $stmt = null;
            header('Location: index.php?error=stmtfailed');
            exit();
        }

        if($stmt -> rowCount() === 0){
            $stmt = null;
            $_SESSION['e-email'] = 'There is no existing account using that email address';
            header('Location: index.php');
            exit();
        }

        $stmt = null; 
    }
}