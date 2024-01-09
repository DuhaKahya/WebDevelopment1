<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Galatasaray</title>
    <link rel="icon" type="image/jpg" href="images/favicon6.jpg">
</head>
<body>

<div class="container min-vh-100">
    
<?php
require_once __DIR__.'/../controllers/shoppingcartcontroller.php';

$shoppingCartController = new ShoppingCartController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $shoppingCartController->delete();
    
    ?><div class="alert alert-success" role="alert">
        <p>Item deleted from shoppingcart!</p>
    </div><?php

    exit('<script>window.location.href = "shoppingcart";</script>');
}


?>

<?php
require_once __DIR__.'/../controllers/ordercontroller.php';
require_once __DIR__.'/../controllers/articlecontroller.php';

$orderController = new OrderController();
$articleController = new ArticleController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmPayment"])) {
    $orderController->insert();

    ?><div class="alert alert-success" role="alert">
        <p>Payment confirmed!</p>
    </div><?php
        echo '<script>setTimeout(function(){window.location.href = "shoppingcart";}, 5000);</script>';
}
?>

<h1 class="text-center fw-bold">Shopping Cart</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Article Title</th>
                <th>Article Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0; // Initialize $total variable
            foreach ($shoppingCarts as $shoppingCart):
                $article = $this->shoppingCartService->getArticleById($shoppingCart->getArticleid());
                
                // Check if the status is unpaid
                if ($shoppingCart->getStatus() === 'unpaid'):
            ?>
                    <tr>
                        <td><?= $article->getTitle(); ?></td>
                        <td><?= $article->getDescription(); ?></td>
                        <td><?= $shoppingCart->getQuantity(); ?></td>
                        <td>€<?= $shoppingCart->getTotalprice(); ?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="delete" value="<?= $shoppingCart->getId(); ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total += $shoppingCart->getTotalprice(); ?>
              </div>
            <?php
                endif;
            endforeach;
            ?>
        </tbody>
    </table>
    
    

    <div class="mt-3 d-flex justify-content-between align-items-center">
        <div>
            <h4>Total Price: €<?= $total; ?></h4>
        </div>
        <div class="ml-auto">
            <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#paymentModal">
                Pay
            </button>
        </div>
    </div>
    
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Payment Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to proceed with the payment?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="" method="post">
                            <button type="submit" name="confirmPayment" class="btn btn-success">OK</button>
                            <?php foreach ($shoppingCarts as $shoppingCart): ?>
                                <input type="hidden" name="shoppingcartids[]" value="<?= $shoppingCart->getId(); ?>">
                            <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
</div>


<?php
// Function to check if there are unpaid items in the shopping cart
function hasUnpaidItems($shoppingCarts) {
    foreach ($shoppingCarts as $shoppingCart) {
        if ($shoppingCart->getStatus() === 'unpaid') {
            return true;
        }
    }
    return false;
}

// if there are no items in shoppingcart pay button needs to be disabled
if (!hasUnpaidItems($shoppingCarts)) {
    echo '<script>document.querySelector(".btn-success").disabled = true;</script>';
}

?>


</body>
</html>


<?php include 'footer.php'; ?>
