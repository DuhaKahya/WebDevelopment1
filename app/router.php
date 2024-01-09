<?php

class Router {
    public function route($uri) {  
        // using a simple switch statement to route URL's to controller methods
        switch($uri) {

            case '': 
                require __DIR__ . '/controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->index();
                break;
            case 'about': 
                require __DIR__ . '/controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->about();
                break;
            case 'webshop': 
                require __DIR__ . '/controllers/articlecontroller.php';
                $controller = new ArticleController();
                $controller->index();
                break;
            case 'tickets': 
                require __DIR__ . '/controllers/articlecontroller.php';
                $controller = new ArticleController();
                $controller->tickets();
                break; 
            case 'contact': 
                require __DIR__ . '/controllers/contactpagecontroller.php';
                $controller = new ContactPageController();
                $controller->index();
                break;
            case 'shoppingcart': 
                require __DIR__ . '/controllers/shoppingcartcontroller.php';
                $controller = new ShoppingCartController();
                $controller->index();
                break;
            case 'login': 
                require __DIR__ . '/controllers/usercontroller.php';
                $controller = new UserController();
                $controller->login();
                break;
            case 'register': 
                require __DIR__ . '/controllers/usercontroller.php';
                $controller = new UserController();
                $controller->register();
                break;
            case 'logout':
                require __DIR__ . '/controllers/usercontroller.php';
                $controller = new UserController();
                $controller->logout();
                break;
                
            default:
                http_response_code(404);
                break;
        }
    }
}
?>
