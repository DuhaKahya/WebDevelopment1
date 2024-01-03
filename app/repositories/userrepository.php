<?php

require_once __DIR__.'/../models/user.php';


class UserRepository{

    private $connection;
    
    public function __construct(){
        $this->connection = new PDO("mysql:host=mysql;dbname=developmentdb", "root", "secret123");
    }
    
    public function getAll(){
        $statement = $this->connection->prepare("SELECT * FROM users");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        return $statement->fetchAll();
    }

    public function getUserByUsernameAndPassword($username, $password) {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(":username", $username);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        $user = $statement->fetch();
    
        // Check if the user exists and verify the password
        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        } else {
            return null; // Invalid username or password
        }
    }

    public function getUserByUsername($username) {
        $statement = $this->connection->prepare("SELECT * FROM users WHERE username = :username");
        $statement->bindParam(":username", $username);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "User");
        return $statement->fetch();
    }
    
    
}


?>