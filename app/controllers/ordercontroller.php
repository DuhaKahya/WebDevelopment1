<?php

require_once __DIR__.'/../services/orderService.php';

class OrderController{

    private $orderService;
    private $shoppingCartService;
    private $articleService;

    public function __construct() {
        $this->orderService = new OrderService();
        $this->shoppingCartService = new ShoppingCartService();
        $this->articleService = new ArticleService();
    }

    public function index() {
        $orders = $this->orderService->getAll();
        require_once __DIR__.'/../views/order.php';
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmPayment"])) {
            $shoppingCartIds = $_POST["shoppingcartids"];

            foreach ($shoppingCartIds as $shoppingCartId) {
                // Een nieuwe bestelling maken en toevoegen
                $order = new Orders();
                $order->setShoppingcartid($shoppingCartId);
                $this->orderService->insert($order);

                // Het winkelwagentje markeren als 'paid'
                $this->shoppingCartService->updateStock($shoppingCartId);
                $this->shoppingCartService->updateStatus($shoppingCartId, 'paid');
            }
        }
        
    }

}
        
    