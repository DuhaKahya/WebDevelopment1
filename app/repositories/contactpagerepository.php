<?php

require_once __DIR__.'/../models/contactpage.php';

class ContactPageRepository{

    private $connection;
    
    public function __construct(){
        $this->connection = new PDO("mysql:host=mysql;dbname=developmentdb", "root", "secret123");
    }
    
    public function getAll(){
        $statement = $this->connection->prepare("SELECT * FROM contactPage");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "ContactPage");
        return $statement->fetchAll();
    }

    public function insert($contactpage){

        $statement = $this->connection->prepare("INSERT INTO contactPage (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        
        $statement->bindParam(":name", $contactpage->name);
        $statement->bindParam(":email", $contactpage->email);
        $statement->bindParam(":subject", $contactpage->subject);
        $statement->bindParam(":message", $contactpage->message);
        
        $statement->execute();
    }
    

    
}

?>