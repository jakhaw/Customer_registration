<?php

class UserInputErrorDetection {
    protected function passwordTooShort($pass){
        $result = true;
        if(strlen($pass) < 6){
            $result = false;
            $_SESSION['e-password'] = 'Password has to be at least 6 characters long';
        }

        return $result;
    }

    protected function emailIncorrect($email){
        $result = true;
        $login_email_sanitize = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email !== $login_email_sanitize){
            $result = false;
            $_SESSION['e-email'] = 'Email address is incorrect';
        }

        return $result;
    }

    protected function usernameTypo($username){
        $result = true;
        if(!ctype_alnum($username)){
            $result = false;
            $_SESSION['e-username'] = 'Username can only contain letters or digits';
        }

        return $result;
    }

    protected function passwordTypo($pass){
        $result = true;
        if(!ctype_alnum($pass)){
            $result = false;
            $_SESSION['e-password'] = 'Password can only contain letters or digits';
        }

        return $result;
    }
}

