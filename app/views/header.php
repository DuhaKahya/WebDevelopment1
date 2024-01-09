<?php
require_once __DIR__.'/../services/userservice.php';

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/headerstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<nav id="navigation" class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <div class="logo">
            <img src="images/logo.jpg" alt="" width="75" height="100">
        </div>
        <a id="title" class="navbar-brand" href="/">GALATASARAY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">HOME</a>
                <a class="nav-link" href="about">ABOUT</a>
                <a class="nav-link" href="webshop">WEBSHOP</a>
                <a class="nav-link" href="tickets">TICKETS</a>
                <a class="nav-link" href="contact">CONTACT</a>
                <a href="shoppingcart">
                <svg xmlns="http://www.w3.org/2000/svg" id="shoppingcart" class="bi bi-cart-dash" viewBox="0 0 16 16">
                <path d="M6.5 7a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg>
                </a>
                <?php
                if(isset($_SESSION['authenticatedUser'])) {
                    $authenticatedUser = $_SESSION['authenticatedUser'];
                    echo '<a id="loginbutton" class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">' . $authenticatedUser->getName() . '</a>';
                }
                else
                    echo '<a id="loginbutton" "class="nav-link" href="login">Login</a>';
                ?>
            </div>
        </div>
    </div>
</nav>



<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if(isset($_SESSION['authenticatedUser'])) {
                    $authenticatedUser = $_SESSION['authenticatedUser'];
                    echo 'Are you sure you want to logout, ' . $authenticatedUser->getName() . '?';
                } 
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="logout" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</body>
</html>
