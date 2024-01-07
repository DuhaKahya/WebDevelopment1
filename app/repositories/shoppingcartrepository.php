<?php

require_once __DIR__.'/../models/shoppingcart.php';
require_once __DIR__.'/../models/article.php';

class ShoppingCartRepository {

    private $connection;

    public function __construct(){
        $this->connection = new PDO("mysql:host=mysql;dbname=developmentdb", "root", "secret123");
    }

    public function getAll() {
        $statement = $this->connection->prepare("SELECT * FROM shoppingcart");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "ShoppingCart");
        return $statement->fetchAll();
    }

    public function insert($shoppingCart) {
        
        $statement = $this->connection->prepare("INSERT INTO shoppingcart (userid, articleid, quantity, price, totalprice) VALUES (:userid, :articleid, :quantity, :price, :totalprice)");

        $statement->bindParam(":userid", $shoppingCart->userid);
        $statement->bindParam(":articleid", $shoppingCart->articleid);
        $statement->bindParam(":quantity", $shoppingCart->quantity);
        $statement->bindParam(":price", $shoppingCart->price);
        $statement->bindParam(":totalprice", $shoppingCart->totalprice);


        $statement->execute();
    }

    public function delete($id) {
        $statement = $this->connection->prepare("DELETE FROM shoppingcart WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function clearCart() {
        $statement = $this->connection->prepare("DELETE FROM shoppingcart");
        $statement->execute();
    }

    public function getShoppingCartById($id) {
        $statement = $this->connection->prepare("SELECT * FROM shoppingcart WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "ShoppingCart");
        return $statement->fetch();
    }

  

    
}
?>
