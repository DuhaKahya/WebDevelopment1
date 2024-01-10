<?php

require_once __DIR__.'/../services/contactpageservice.php';

class ContactPageController {

    private $contactPageService;

    public function __construct() {
        $this->contactPageService = new ContactPageService();
    }

    public function index() {
        $contactPage = $this->contactPageService->getAll();
        require_once __DIR__.'/../views/contactpage.php';
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"])) {
            
            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
    
            $contactPage = new ContactPage();

            $contactPage->setName($name);
            $contactPage->setEmail($email);
            $contactPage->setSubject($subject);
            $contactPage->setMessage($message);
    
            // Insert into the database
            $this->contactPageService->insert($contactPage);
        }

    }
    
   



}
    