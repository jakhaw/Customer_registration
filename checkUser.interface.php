<?php

interface ICheckUser{
    public function checkUser($argument);
}

class CheckUserForLogin extends Db implements ICheckUser{
    public function checkUser($email){
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = :email;');

        if(!$stmt->execute(['email'=>$email])){
            $stmt = null;
            header('Location: index.php?error=stmtfailed');
            exit();
        }

        if($stmt -> rowCount() === 0){
            $stmt = null;
            header('Location: index.php?error=usernotfound');
            $_SESSION['e-login'] = 'User does not exist';
            exit();
        }

        $stmt = null; 
    }
}

class CheckUserForSignup extends Db implements ICheckUser{
    public function checkUser($email){
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = :email;');

        if(!$stmt->execute(['email'=>$email])){
            $stmt = null;
            header('Location: signuppage.php?error=stmtfailed');
            exit();
        }

        if($stmt -> rowCount() > 0){
            $stmt = null;
            header('Location: signuppage.php?error=emailused');
            $_SESSION['e-email'] = 'This email is already used';
            exit();
        }

        $stmt = null; 
    }
}