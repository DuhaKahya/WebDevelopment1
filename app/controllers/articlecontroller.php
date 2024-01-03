<?php

require_once __DIR__.'/../services/articleservice.php';

class ArticleController {

    private $articleService;

    public function __construct() { 
        $this->articleService = new ArticleService();
    }

    public function index() {
        $articles = $this->articleService->getAll();
        require_once __DIR__.'/../views/webshop.php';
    }
    public function tickets() {
        $articles = $this->articleService->getAll();
        require_once __DIR__.'/../views/ticket.php';
    }

    

   
   



}
    