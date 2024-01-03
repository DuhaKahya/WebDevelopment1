<?php

class HomeController {

    public function index() {
        require_once __DIR__.'/../views/index.php';
    }

    public function about() {
        require_once __DIR__.'/../views/about.php';
    }
}
    