<?php

class Db{
    private $host = 'localhost';
    private $db_name = 'registration_oop';
    private $password = '';
    private $user = 'root';

    protected function connect(){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db_name;
        $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC];

        try{
            $conn = new PDO($dsn, $this->user, $this->password, $options);
            return $conn;
        }catch(PDOException $e){
            echo "Error!".$e->getMessage();
        }
    }
}