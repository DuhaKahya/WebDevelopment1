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
        $authenticated = $this->authenticateUser();
        require_once __DIR__.'/../views/login.php';
    }
    public function register() {
        $registred = $this->insert();
        require_once __DIR__.'/../views/register.php';
    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }

    public function authenticateUser(){
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['username']) && isset($_POST['password'])) {
            // Get the username and password from the form
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            // Attempt to authenticate the user
            $authenticatedUser = $this->userService->authenticateUser($username, $password);
            
            if ($authenticatedUser != null) {
                // Set the authenticated user in the session
                $_SESSION['authenticatedUser'] = $authenticatedUser;
                return true;
            }
      
        }
    }
    

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["phonenumber"])) {
            // Validate and sanitize input (implement this part)
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $name = $_POST["name"];
            $address = $_POST["address"];
            $phonenumber = $_POST["phonenumber"];
    
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Check if the username already exists
            $existingUser = $this->userService->getUserByUsername($username);
            if ($existingUser != null) {
                return false;
            }

            // Create a User object
            $user = new User();
    
            $user->setUsername($username);
            $user->setPassword($hashedPassword);
            $user->setEmail($email);
            $user->setName($name);
            $user->setAdres($address);
            $user->setPhoneNumber($phonenumber);
    
            // Insert the user into the database
            $this->userService->insert($user);
            return true;
           
        }
    }


    
    

}
    