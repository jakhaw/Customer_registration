<?php
class Login extends Db {
    
    protected function getUser($email, $password){
        
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE email = :email');

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

        $passHashed = $stmt->fetchAll();

        if(!password_verify($password, $passHashed[0]['password'])){
            $stmt = null;
            header('Location: index.php?error=wrongpassword');
            $_SESSION['e-login'] = 'Incorrect email or password';
            exit();
        }elseif(password_verify($password, $passHashed[0]['password'])){
            $_SESSION['login'] = true;
            $stmt = null;
        }
        

        $stmt = null; 
    }

}