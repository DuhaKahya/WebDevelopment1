<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/webshopstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
    
<?php
require_once __DIR__.'/../controllers/shoppingcartcontroller.php';
require_once __DIR__.'/../controllers/ordercontroller.php';

$shoppingCartController = new ShoppingCartController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $shoppingCartController->delete();
    
    ?><div class="alert alert-success" role="alert">
        <p>Item deleted from shoppingcart!</p>
    </div><?php

    exit('<script>window.location.href = "shoppingcart";</script>');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["clearCart"])) {
    // Clear shopping cart and refresh page
    $shoppingCartController->clearCart();
    
    ?><div class="alert alert-success" role="alert">
        <p>Shoppingcart cleared!</p>
    </div><?php

    exit('<script>window.location.href = "shoppingcart";</script>');
}

?>

<?php
require_once __DIR__.'/../controllers/ordercontroller.php';

$orderController = new OrderController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmPayment"])) {
    $orderController->insert();
    
    ?><div class="alert alert-success" role="alert">
        <p>Payment confirmed!</p>
    </div><?php

    exit('<script>window.location.href = "shoppingcart";</script>');
}
?>



    <h2>Shopping Cart</h2>

    <?php if (empty($shoppingCarts)): ?>
        <div class="alert alert-danger" role="alert">
            <p>Shoppingcart is empty!</p>
        </div>
    <?php else: ?>
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
                ?>
                    <tr>
                        <td><?= $article->getTitle(); ?></td>
                        <td><?= $article->getDescription(); ?></td>
                        <td><?= $shoppingCart->getQuantity(); ?></td>
                        <td>€<?= $shoppingCart->getTotalprice(); ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="delete" value="<?= $shoppingCart->getId(); ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total += $shoppingCart->getTotalprice(); ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-3 d-flex justify-content-between align-items-center">
            <div>
                <h4>Total Price: €<?= $total; ?></h4>
                <form method="post" action="">
                    <button type="submit" name="clearCart" class="btn btn-danger mt-2">Clear Cart</button>
                </form>
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
                                <input type="hidden" name="shoppingcartid" id="shoppingcartid" value="<?= $shoppingCart->getId(); ?>">
                        <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    setTimeout(function(){
        document.getElementById('succesalert').style.display = 'none';
    }, 5000);
</script>

</body>
</html>
