<?php

require_once __DIR__.'/../models/article.php';

class ArticleRepository{

    private $connection;
    
    public function __construct(){
        $this->connection = new PDO("mysql:host=mysql;dbname=developmentdb", "root", "secret123");
    }
    
    public function getAll(){
        $statement = $this->connection->prepare("SELECT * FROM articles");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Article");
        return $statement->fetchAll();
    }

    public function insert($article){
        $statement = $this->connection->prepare("INSERT INTO articles (id, title, description, price, stock, category) VALUES (:id, :title, :description, :price, :stock, :category)");
        $statement->bindParam(":id", $article->id);
        $statement->bindParam(":title", $article->title);
        $statement->bindParam(":description", $article->description);
        $statement->bindParam(":price", $article->price);
        $statement->bindParam(":stock", $article->stock);
        $statement->bindParam(":category", $article->category);
        $statement->execute();
    }
    public function getArticleById($id) {
        $statement = $this->connection->prepare("SELECT * FROM articles WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Article");
        return $statement->fetch();
    }

    public function update($article){
        //update only stock
        $statement = $this->connection->prepare("UPDATE articles SET stock = :stock WHERE id = :id");
        $statement->bindParam(":id", $article->id);
        $statement->bindParam(":stock", $article->stock);
        $statement->execute();
    }

    public function updateStock($article){
        $statement = $this->connection->prepare("UPDATE articles SET stock = :stock WHERE id = :id");
        $statement->bindParam(":id", $article->id);
        $statement->bindParam(":stock", $article->stock);
        $statement->execute();
    }

    

    

    





    
    

    
}