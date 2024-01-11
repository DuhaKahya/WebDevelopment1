<?php

require_once __DIR__.'/../services/orderService.php';

class OrderController{

    private $orderService;
 

    public function __construct() {
        $this->orderService = new OrderService();
       
    }

    public function index() {
        $orders = $this->orderService->getAll();
        require_once __DIR__.'/../views/order.php';
    }

    

}
        
    