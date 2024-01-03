<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/webshopstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

    <?php
        require_once __DIR__.'/../controllers/shoppingcartcontroller.php';

        // Create an instance of ShoppingCartController
        $shoppingCartController = new ShoppingCartController();

        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Call the method to handle form submission
            $shoppingCartController->insert();
            
            ?><div class="alert alert-success" role="alert">
            <p>Item added to the shoppingcart!</p>
        </div><?php
        }
    ?>

    <div class="row mt-4">
        <?php
        $imageCount = 1;
        foreach ($articles as $article):
            if ($article->getCategory() !== 'Merchandise') {
                continue; // Skip non-Merchandise items
            }
        ?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
            <div class="card h-100">
                <img src="images/articles/<?= $imageCount; ?>.jpg" class="card-img-top" alt="Product Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $article->getTitle(); ?></h5>
                    <p class="card-text"><?= $article->getDescription(); ?></p>
                    <div class="mt-auto">
                        <p id="price" class="card-text">Price: €<?= $article->getPrice(); ?></p>
                        <form method="POST" action="">
                            <input type="hidden" id="userid" name="userid" value="1"> 
                            <input type="hidden" id="articleid" name="articleid" value="<?= $article->getId(); ?>">
                            <input type="hidden" id="price" name="price" value="<?= $article->getPrice(); ?>">
                            <div class="input-group mb-3">
                                <label for="quantity" class="input-group-text">Quantity:</label>
                                <input type="text" id="quantity" oninput="updateButtonState(this)" name="quantity" class="form-control text-center quantityInput" placeholder="0" aria-label="Number of Products" aria-describedby="addProduct">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block addToCart" disabled>Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $imageCount++;
        endforeach; ?>
    </div>
</div>


<script>
    setTimeout(function(){
        document.getElementById('succesalert').style.display = 'none';
    }, 5000);
    
    function updateButtonState(input) {
        var addToCartButton = input.parentElement.parentElement.getElementsByClassName("addToCart")[0];
        if (input.value > 0) {
            addToCartButton.disabled = false;
        } else {
            addToCartButton.disabled = true;
        }
    }
</script>


</body>
</html>
