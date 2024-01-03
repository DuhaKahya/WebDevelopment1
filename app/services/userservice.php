<?php

require_once __DIR__.'/../repositories/userrepository.php';
class UserService {

    private $userService;

    public function __construct() {
        $this->userService = new UserRepository();
    }

    public function getAll() {
        return $this->userService->getAll();
    }

    public function insert($user) {
        $this->userService->insert($user);
    }
    public function getUserByUsername($username) {
        return $this->userService->getUserByUsername($username);
    }
    
    public function getUserByUsernameAndPassword($username, $password) {
        return $this->userService->getUserByUsernameAndPassword($username, $password);
    }

    public function authenticateUser($username, $password) {
        $authenticatedUser = $this->userService->getUserByUsernameAndPassword($username, $password);
        return $authenticatedUser;
    }


}