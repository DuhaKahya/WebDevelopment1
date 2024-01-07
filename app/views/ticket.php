<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ticketstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
<?php
require_once __DIR__.'/../controllers/shoppingcartcontroller.php';

// Create an instance of ShoppingCartController
$shoppingCartController = new ShoppingCartController();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (isset($_SESSION['authenticatedUser'])) {
        // Call the method to handle form submission
        $shoppingCartController->insert();
        ?><div id="succesalert" class="alert alert-success" role="alert">
        <p>Item added to the shopping cart!</p>
    </div><?php
    } else {
        // Redirect to the login page
        exit('<script>location.replace("login");</script>');
    }
}
?>


<?php foreach ($articles as $article): ?>
    <?php if ($article->getCategory() === 'Ticket'): ?>
        <?php
        $gameInfo = $article->getTitle();
        $teams = array_map('trim', explode('-', $gameInfo));
        $team1 = $teams[0];
        $team2 = $teams[1];

        $logo1 = "images/{$team1}logo.jpg";
        $logo2 = "images/{$team2}logo.jpg";
        ?>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <!-- Left side: Team 1 with logo -->
                                <img src="<?= $logo1 ?>" class="img-fluid mb-3">
                                <h5 class="team-name"><?= $team1 ?></h5>
                            </div>
                            <div class="col-md-4 text-center">
                                <!-- Middle: Date, time, and venue -->
                                <h5><?= $article->getDescription(); ?></h5>
                                <br>
                                <br>
                                <p>VS</p>
                                <br>
                            </div>
                            <div class="col-md-4 text-center">
                                <!-- Right side: Team 2 with logo -->
                                <img src="<?= $logo2 ?>" class="img-fluid mb-3">
                                <h5 class="team-name"><?= $team2 ?></h5>
                            </div>
                        </div>
                        <hr>
                        <!-- Ticket Price, Quantity, and hidden fields -->
                        <div class="row">
                            <div class="col-md-9">
                                <p class="text-muted">Availability: <?= $article->getStock(); ?></p>
                            </div>
                            <div class="col-md-3">
                            <?php 
                            if (isset($_SESSION['authenticatedUser'])) {
                                $userid = $_SESSION['authenticatedUser']->getId();
                            } else {
                                $userid = 0;
                            } 
                            ?>
                                <form method="POST" action="">
                                    <input type="hidden" id="userid" name="userid" value="<?= $userid; ?>"> 
                                    <input type="hidden" id="articleid" name="articleid" value="<?= $article->getId(); ?>">
                                    <input type="hidden" id="price" name="price" value="<?= $article->getPrice(); ?>">
                                    <div class="input-group">
                                        <label for="quantity" class="input-group-text">Quantity:</label>
                                        <input type="text" id="quantity" name="quantity" class="form-control text-center quantityInput" placeholder="0" aria-label="Number of Products" aria-describedby="addProduct" oninput="enableAddToCart(this)">
                                    </div>
                            </div>
                            <div class="col-md-9">
                                <p class="text-muted">Price: €<?= $article->getPrice(); ?></p>
                                <button type="submit" class="btn btn-primary btn-block addToCart" disabled onclick="return validateQuantity()">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>

<script>
    setTimeout(function(){
        document.getElementById('succesalert').style.display = 'none';
    }, 5000);

    function enableAddToCart(input) {
        var addButton = input.closest('.card-body').querySelector('.addToCart');
        addButton.disabled = input.value == null || input.value <= 0;
    }
</script>

</body>
</html>
