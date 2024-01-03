<?php
require_once __DIR__.'/../models/orders.php';
require_once __DIR__.'/../models/shoppingcart.php';

class OrderRepository{

    private $connection;

    public function __construct(){
        $this->connection = new PDO("mysql:host=mysql;dbname=developmentdb", "root", "secret123");
    }

    public function getAll() {
        $statement = $this->connection->prepare("SELECT * FROM orders");
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Orders");
        return $statement->fetchAll();
    }

    public function insert($orders) {
        
        $statement = $this->connection->prepare("INSERT INTO orders (shoppingcartid) VALUES (:shoppingcartid)");

        $statement->bindParam(":shoppingcartid", $orders->shoppingcartid);

        $statement->execute();
    }

   
}