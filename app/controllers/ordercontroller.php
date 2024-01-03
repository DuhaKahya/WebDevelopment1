<?php

require_once __DIR__.'/../services/orderService.php';

class OrderController{

    private $orderService;
    private $shoppingCartService;

    public function __construct() {
        $this->orderService = new OrderService();
        $this->shoppingCartService = new ShoppingCartService();
    }

    public function index() {
        $orders = $this->orderService->getAll();
        require_once __DIR__.'/../views/order.php';
    }

   
    public function insert() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmPayment"])) {
        
        $shoppingCartId = $_POST["shoppingcartid"];
            
        $orders = new Orders();

        $orders->setShoppingcartid($shoppingCartId);

        // Insert into the database
        $this->orderService->insert($orders);
        $this->shoppingCartService->clearCart();
    }
}


    
    
}