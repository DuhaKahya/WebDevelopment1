<?php

require_once __DIR__.'/../services/shoppingcartService.php';
require_once __DIR__.'/../services/orderService.php';

class ShoppingCartController {

    private $shoppingCartService;
    private $orderService;

    public function __construct() {
        $this->shoppingCartService = new ShoppingCartService();   
        $this->orderService = new OrderService();
    }

    public function index() {
        $shoppingCarts = $this->shoppingCartService->getAll();
        $inserted = $this->insert();
        $deleted = $this->delete();
        require_once __DIR__.'/../views/shoppingcart.php';
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmPayment"])) {
            // Check if the array is set and not empty
            if (isset($_POST["shoppingcartids"]) && is_array($_POST["shoppingcartids"])) {
                // Loop through each element of the array
                foreach ($_POST["shoppingcartids"] as $shoppingCartId) {
                    // Ensure each element is a string before using it
                    $shoppingCartId = htmlspecialchars($shoppingCartId);
    
                    // Een nieuwe bestelling maken en toevoegen
                    $order = new Orders();
                    $order->setShoppingcartid($shoppingCartId);
                    $this->orderService->insert($order);
    
                    // Het winkelwagentje markeren als 'paid'
                    $this->shoppingCartService->updateStock($shoppingCartId);
                    $this->shoppingCartService->updateStatus($shoppingCartId, 'paid');
                }
                return true;
            }
        }
    }
    

    
    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
            $id = htmlspecialchars($_POST["delete"]);
            $this->shoppingCartService->delete($id);
            return true;
        }
    }

}

?>