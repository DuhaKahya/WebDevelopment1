<?php

require_once __DIR__.'/../services/userservice.php';
class UserController {

    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

   public function index() {
        $users = $this->userService->getAll();
        require_once __DIR__.'/../views/user.php';
    }

    public function login() {
        $users = $this->userService->getAll();
        require_once __DIR__.'/../views/login.php';
    }
    public function register() {
        require_once __DIR__.'/../views/register.php';
    }


}
    