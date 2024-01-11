<?php

require_once __DIR__.'/../services/articleservice.php';
require_once __DIR__.'/../services/shoppingcartService.php';

class ArticleController {

    private $articleService;
    private $shoppingCartService;

    public function __construct() { 
        $this->articleService = new ArticleService();
        $this->shoppingCartService = new ShoppingCartService();
    }

    public function index() {
        $articles = $this->articleService->getAll();
        $inserted = $this->insert();
        require_once __DIR__.'/../views/webshop.php';
    }
    public function tickets() {
        $articles = $this->articleService->getAll();
        $inserted = $this->insert();
        require_once __DIR__.'/../views/ticket.php';
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
            return true;
        }
    }

   



  

    

   
   



}
    