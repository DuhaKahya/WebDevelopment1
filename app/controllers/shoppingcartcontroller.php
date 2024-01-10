<?php

require_once __DIR__.'/../services/shoppingcartService.php';

class ShoppingCartController {

    private $shoppingCartService;

    public function __construct() {
        $this->shoppingCartService = new ShoppingCartService();   
    }

    public function index() {
        $shoppingCarts = $this->shoppingCartService->getAll();
        require_once __DIR__.'/../views/shoppingcart.php';
    }
    

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userid"]) && isset($_POST["articleid"]) && isset($_POST["quantity"]) && isset($_POST["price"])) {

            $userid = $_POST["userid"];
            $articleid = $_POST["articleid"];
            $quantity = $_POST["quantity"];
            $price = $_POST["price"];
            $totalprice = $quantity * $price;

            $shoppingCarts = new ShoppingCart();
        
            $shoppingCarts->setUserid($userid);
            $shoppingCarts->setArticleid($articleid);
            $shoppingCarts->setQuantity($quantity);
            $shoppingCarts->setPrice($price);
            $shoppingCarts->setTotalprice($totalprice);

            // Insert into the database
            $this->shoppingCartService->insert($shoppingCarts);
        }
    }

    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
            $id = $_POST["delete"];
            $this->shoppingCartService->delete($id);
        }
    }

}

?>