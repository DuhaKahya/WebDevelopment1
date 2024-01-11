<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: *');

header("Access-Control-Allow-Headers: *");

require __DIR__ . '/../router.php';
require __DIR__ . '/../services/userservice.php';

session_start();

$uri = trim($_SERVER['REQUEST_URI'], '/');


$router = new Router();
try {
    $router->route($uri);
} catch (Exception $e) {
    http_response_code(500);
    echo $e;
    die();
}